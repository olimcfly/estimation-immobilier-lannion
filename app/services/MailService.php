<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Config;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

final class MailService
{
    public function send(string $to, string $subject, string $htmlBody): bool
    {
        $mail = new PHPMailer(true);

        try {
            $smtpHost = Config::get('mail.smtp_host');
            $smtpUser = Config::get('mail.smtp_user');
            $smtpPass = Config::get('mail.smtp_pass');
            $smtpPort = (int) Config::get('mail.smtp_port');
            $smtpEncryption = Config::get('mail.smtp_encryption');
            $fromAddress = Config::get('mail.from');

            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUser;
            $mail->Password = $smtpPass;
            $mail->SMTPSecure = $smtpEncryption === 'tls' ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = $smtpPort;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom($fromAddress, 'Estimation Immobilier Lannion');
            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $htmlBody;
            $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $htmlBody));

            $mail->send();

            return true;
        } catch (\Throwable $e) {
            error_log('MailService error: ' . $e->getMessage());
            return false;
        }
    }

    public function sendAdminCode(string $to, string $code): bool
    {
        $subject = 'Votre code de connexion admin';
        $html = '
        <div style="font-family: Arial, sans-serif; max-width: 500px; margin: 0 auto; padding: 30px; background: #f9f9f9; border-radius: 12px;">
            <h2 style="color: #003f87; margin-bottom: 20px;">Connexion Admin</h2>
            <p style="color: #333; font-size: 16px;">Voici votre code de vérification :</p>
            <div style="background: #003f87; color: #fff; font-size: 32px; font-weight: bold; letter-spacing: 8px; text-align: center; padding: 20px; border-radius: 8px; margin: 20px 0;">
                ' . htmlspecialchars($code, ENT_QUOTES, 'UTF-8') . '
            </div>
            <p style="color: #666; font-size: 14px;">Ce code expire dans <strong>10 minutes</strong>.</p>
            <p style="color: #999; font-size: 12px; margin-top: 20px;">Si vous n\'avez pas demandé ce code, ignorez cet email.</p>
        </div>';

        return $this->send($to, $subject, $html);
    }
}
