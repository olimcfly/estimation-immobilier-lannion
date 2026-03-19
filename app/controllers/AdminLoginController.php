<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\AdminAuth;
use App\Core\Config;
use App\Core\View;
use App\Services\MailService;

final class AdminLoginController
{
    private const CODE_LENGTH = 6;
    private const CODE_TTL_SECONDS = 600; // 10 minutes
    private const MAX_ATTEMPTS = 5;

    public function showLogin(): void
    {
        if (AdminAuth::check()) {
            header('Location: /admin/dashboard');
            exit;
        }

        View::render('admin/login', ['errors' => []]);
    }

    public function sendCode(): void
    {
        $email = strtolower(trim((string) ($_POST['email'] ?? '')));

        if ($email === '') {
            View::render('admin/login', ['errors' => ['Veuillez entrer votre adresse email.']]);
            return;
        }

        $allowedEmails = Config::get('admin.emails');

        if (!is_array($allowedEmails) || !in_array($email, $allowedEmails, true)) {
            View::render('admin/login', ['errors' => ['Cette adresse email n\'est pas autorisée.']]);
            return;
        }

        $code = $this->generateCode();
        $_SESSION['admin_login'] = [
            'email' => $email,
            'code' => $code,
            'expires_at' => time() + self::CODE_TTL_SECONDS,
            'attempts' => 0,
        ];

        $mailService = new MailService();
        $sent = $mailService->sendAdminCode($email, $code);

        if (!$sent) {
            View::render('admin/login', ['errors' => ['Erreur lors de l\'envoi de l\'email. Vérifiez la configuration SMTP.']]);
            return;
        }

        View::render('admin/verify', [
            'email' => $this->maskEmail($email),
            'errors' => [],
        ]);
    }

    public function verifyCode(): void
    {
        $inputCode = trim((string) ($_POST['code'] ?? ''));
        $session = $_SESSION['admin_login'] ?? null;

        if (!is_array($session)) {
            View::render('admin/login', ['errors' => ['Session expirée. Veuillez recommencer.']]);
            return;
        }

        if (time() > (int) ($session['expires_at'] ?? 0)) {
            unset($_SESSION['admin_login']);
            View::render('admin/login', ['errors' => ['Le code a expiré. Veuillez recommencer.']]);
            return;
        }

        $attempts = (int) ($session['attempts'] ?? 0);
        if ($attempts >= self::MAX_ATTEMPTS) {
            unset($_SESSION['admin_login']);
            View::render('admin/login', ['errors' => ['Trop de tentatives. Veuillez recommencer.']]);
            return;
        }

        $_SESSION['admin_login']['attempts'] = $attempts + 1;

        if (!hash_equals((string) ($session['code'] ?? ''), $inputCode)) {
            $remaining = self::MAX_ATTEMPTS - $attempts - 1;
            View::render('admin/verify', [
                'email' => $this->maskEmail((string) ($session['email'] ?? '')),
                'errors' => ["Code incorrect. {$remaining} tentative(s) restante(s)."],
            ]);
            return;
        }

        // Success
        unset($_SESSION['admin_login']);
        $_SESSION['admin_authenticated'] = true;
        $_SESSION['admin_email'] = $session['email'];

        header('Location: /admin/dashboard');
        exit;
    }

    public function dashboard(): void
    {
        AdminAuth::requireAuth();
        View::render('admin/dashboard', [
            'email' => $_SESSION['admin_email'] ?? 'Admin',
        ]);
    }

    public function logout(): void
    {
        AdminAuth::logout();
        header('Location: /admin/login');
        exit;
    }

    private function generateCode(): string
    {
        return str_pad((string) random_int(0, 999999), self::CODE_LENGTH, '0', STR_PAD_LEFT);
    }

    private function maskEmail(string $email): string
    {
        $parts = explode('@', $email);
        if (count($parts) !== 2) {
            return '***';
        }
        $name = $parts[0];
        $domain = $parts[1];
        $visible = min(3, mb_strlen($name));
        return mb_substr($name, 0, $visible) . str_repeat('*', max(0, mb_strlen($name) - $visible)) . '@' . $domain;
    }
}
