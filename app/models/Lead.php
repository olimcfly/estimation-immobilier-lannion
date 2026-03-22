<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Config;
use App\Core\Database;
use PDO;

final class Lead
{
    public static function createTable(): void
    {
        Database::connection()->exec("
            CREATE TABLE IF NOT EXISTS leads (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                website_id INT UNSIGNED NOT NULL,
                lead_type ENUM('tendance', 'qualifie') NOT NULL DEFAULT 'qualifie',
                nom VARCHAR(120) NULL DEFAULT NULL,
                email VARCHAR(180) NULL DEFAULT NULL,
                telephone VARCHAR(40) NULL DEFAULT NULL,
                adresse VARCHAR(255) NULL DEFAULT NULL,
                ville VARCHAR(120) NOT NULL,
                type_bien VARCHAR(80) NULL,
                surface_m2 DECIMAL(8,2) NULL,
                pieces INT UNSIGNED NULL,
                estimation DECIMAL(12,2) NOT NULL,
                urgence VARCHAR(40) NULL DEFAULT NULL,
                motivation VARCHAR(80) NULL DEFAULT NULL,
                notes TEXT NULL,
                partenaire_id INT UNSIGNED NULL,
                commission_taux DECIMAL(5,2) NULL DEFAULT NULL,
                commission_montant DECIMAL(12,2) NULL DEFAULT NULL,
                assigne_a VARCHAR(180) NULL DEFAULT NULL,
                date_mandat DATE NULL DEFAULT NULL,
                date_compromis DATE NULL DEFAULT NULL,
                date_signature DATE NULL DEFAULT NULL,
                prix_vente DECIMAL(12,2) NULL DEFAULT NULL,
                score ENUM('chaud', 'tiede', 'froid') NOT NULL DEFAULT 'froid',
                statut ENUM(
                  'nouveau', 'contacte', 'rdv_pris', 'visite_realisee',
                  'mandat_simple', 'mandat_exclusif', 'compromis_vente',
                  'signe', 'co_signature_partenaire', 'assigne_autre'
                ) NOT NULL DEFAULT 'nouveau',
                created_at DATETIME NOT NULL,
                INDEX idx_website_id (website_id),
                INDEX idx_lead_type (lead_type),
                INDEX idx_email (email),
                INDEX idx_statut (statut),
                INDEX idx_created_at (created_at),
                INDEX idx_partenaire_id (partenaire_id),
                INDEX idx_date_signature (date_signature)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
    }

    public function listByScore(?string $score = null): array
    {
        $allowedScores = ['chaud', 'tiede', 'froid'];
        $isFiltered = $score !== null && in_array($score, $allowedScores, true);

        if ($isFiltered) {
            $stmt = Database::connection()->prepare(
                'SELECT id, nom, email, telephone, ville, estimation, urgence, motivation, score, statut, created_at
                 FROM leads
                 WHERE website_id = :website_id
                   AND score = :score
                 ORDER BY created_at DESC'
            );
            $stmt->execute([
                ':website_id' => $this->websiteId(),
                ':score' => $score,
            ]);

            return $stmt->fetchAll() ?: [];
        }

        $stmt = Database::connection()->prepare(
            'SELECT id, nom, email, telephone, ville, estimation, urgence, motivation, score, statut, created_at
             FROM leads
             WHERE website_id = :website_id
             ORDER BY created_at DESC'
        );
        $stmt->execute([':website_id' => $this->websiteId()]);

        return $stmt->fetchAll() ?: [];
    }

    public function create(array $data): int
    {
        $sql = 'INSERT INTO leads (website_id, lead_type, nom, email, telephone, adresse, ville, type_bien, surface_m2, pieces, estimation, urgence, motivation, notes, score, statut, created_at)
                VALUES (:website_id, :lead_type, :nom, :email, :telephone, :adresse, :ville, :type_bien, :surface_m2, :pieces, :estimation, :urgence, :motivation, :notes, :score, :statut, NOW())';

        $stmt = Database::connection()->prepare($sql);
        $stmt->execute([
            ':website_id' => $this->websiteId(),
            ':lead_type' => $data['lead_type'] ?? 'qualifie',
            ':nom' => $data['nom'] ?? null,
            ':email' => $data['email'] ?? null,
            ':telephone' => $data['telephone'] ?? null,
            ':adresse' => $data['adresse'] ?? null,
            ':ville' => $data['ville'],
            ':type_bien' => $data['type_bien'] ?? null,
            ':surface_m2' => $data['surface_m2'] ?? null,
            ':pieces' => $data['pieces'] ?? null,
            ':estimation' => $data['estimation'],
            ':urgence' => $data['urgence'] ?? null,
            ':motivation' => $data['motivation'] ?? null,
            ':notes' => !empty($data['notes']) ? $data['notes'] : null,
            ':score' => $data['score'],
            ':statut' => $data['statut'] ?? 'nouveau',
        ]);

        return (int) Database::connection()->lastInsertId();
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function findAllLeads(): array
    {
        $sql = 'SELECT id, lead_type, nom, email, telephone, ville, type_bien, surface_m2, pieces, estimation, urgence, motivation, score, statut, created_at
                FROM leads
                WHERE website_id = :website_id
                ORDER BY created_at DESC';

        $stmt = Database::connection()->prepare($sql);
        $stmt->execute([':website_id' => $this->websiteId()]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function updateStatut(int $id, string $statut): bool
    {
        $allowed = [
            'nouveau', 'contacte', 'rdv_pris', 'visite_realisee',
            'mandat_simple', 'mandat_exclusif', 'compromis_vente',
            'signe', 'co_signature_partenaire', 'assigne_autre',
        ];
        if (!in_array($statut, $allowed, true)) {
            return false;
        }

        $sql = 'UPDATE leads
                SET statut = :statut
                WHERE id = :id
                  AND website_id = :website_id';

        $stmt = Database::connection()->prepare($sql);
        $stmt->bindValue(':statut', $statut, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':website_id', $this->websiteId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function updateLeadDetails(int $id, array $data): bool
    {
        $fields = [];
        $params = [':id' => $id, ':website_id' => $this->websiteId()];

        $updatable = ['statut', 'partenaire_id', 'commission_taux', 'commission_montant',
                      'assigne_a', 'date_mandat', 'date_compromis', 'date_signature', 'prix_vente', 'score'];

        foreach ($updatable as $field) {
            if (array_key_exists($field, $data)) {
                $fields[] = "$field = :$field";
                $params[":$field"] = $data[$field];
            }
        }

        if (empty($fields)) {
            return false;
        }

        $sql = 'UPDATE leads SET ' . implode(', ', $fields) . ' WHERE id = :id AND website_id = :website_id';
        $stmt = Database::connection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount() > 0;
    }

    public function findById(int $id): ?array
    {
        $sql = 'SELECT * FROM leads WHERE id = :id AND website_id = :website_id';
        $stmt = Database::connection()->prepare($sql);
        $stmt->execute([':id' => $id, ':website_id' => $this->websiteId()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * @return array<string, int>
     */
    public function countByStatut(): array
    {
        $sql = 'SELECT statut, COUNT(*) as cnt
                FROM leads
                WHERE website_id = :website_id AND lead_type = :lt
                GROUP BY statut';
        $stmt = Database::connection()->prepare($sql);
        $stmt->execute([':website_id' => $this->websiteId(), ':lt' => 'qualifie']);
        return $stmt->fetchAll(PDO::FETCH_KEY_PAIR) ?: [];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function findByStatut(string $statut): array
    {
        $sql = 'SELECT id, lead_type, nom, email, telephone, ville, type_bien, surface_m2, pieces, estimation, urgence, motivation, score, statut, created_at
                FROM leads
                WHERE website_id = :website_id AND statut = :statut
                ORDER BY
                  CASE score WHEN "chaud" THEN 1 WHEN "tiede" THEN 2 ELSE 3 END,
                  created_at DESC';
        $stmt = Database::connection()->prepare($sql);
        $stmt->execute([':website_id' => $this->websiteId(), ':statut' => $statut]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function findAllLeadsFiltered(?string $score = null, ?string $statut = null, ?string $type = null): array
    {
        $conditions = ['website_id = :website_id'];
        $params = [':website_id' => $this->websiteId()];

        if ($score !== null && in_array($score, ['chaud', 'tiede', 'froid'], true)) {
            $conditions[] = 'score = :score';
            $params[':score'] = $score;
        }
        if ($statut !== null && $statut !== '') {
            $conditions[] = 'statut = :statut';
            $params[':statut'] = $statut;
        }
        if ($type !== null && in_array($type, ['tendance', 'qualifie'], true)) {
            $conditions[] = 'lead_type = :lead_type';
            $params[':lead_type'] = $type;
        }

        $where = implode(' AND ', $conditions);
        $sql = "SELECT id, lead_type, nom, email, telephone, ville, type_bien, surface_m2, pieces, estimation, urgence, motivation, score, statut, created_at
                FROM leads
                WHERE {$where}
                ORDER BY created_at DESC";

        $stmt = Database::connection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function updateScore(int $id, string $score): bool
    {
        $allowed = ['chaud', 'tiede', 'froid'];
        if (!in_array($score, $allowed, true)) {
            return false;
        }

        $sql = 'UPDATE leads SET score = :score WHERE id = :id AND website_id = :website_id';
        $stmt = Database::connection()->prepare($sql);
        $stmt->bindValue(':score', $score, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':website_id', $this->websiteId(), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    private function websiteId(): int
    {
        return (int) Config::get('website.id', 1);
    }
}
