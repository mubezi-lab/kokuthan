<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class User extends Model
{
    protected string $table = 'users';

    /* =====================================================
       READ / CHECK METHODS
    ===================================================== */

    // Angalia kama username tayari ipo
    public function exists(string $username): bool
    {
        $stmt = $this->db->prepare(
            "SELECT id FROM {$this->table} WHERE username = ? LIMIT 1"
        );
        $stmt->execute([$username]);
        return (bool) $stmt->fetch();
    }

    // Pata user kwa username (login)
    public function findByUsername(string $username): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table} WHERE username = ? LIMIT 1"
        );
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    // Pata user kwa ID
    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1"
        );
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    // Pata users wote
    public function all(): array
    {
        $stmt = $this->db->query(
            "SELECT id, full_name, username, role, created_at
             FROM {$this->table}
             ORDER BY id DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* =====================================================
       AUTHENTICATION
    ===================================================== */

    // Jaribu login
    public function attempt(string $username, string $password): bool|array
    {
        $user = $this->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    /* =====================================================
       CREATE
    ===================================================== */

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO {$this->table}
            (full_name, username, password, role)
            VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([
            $data['full_name'],
            $data['username'],
            $data['password'], // tayari hashed
            $data['role']
        ]);
    }

    /* =====================================================
       UPDATE
    ===================================================== */

    // Update basic user info
    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE {$this->table}
             SET full_name = ?, username = ?, role = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $data['full_name'],
            $data['username'],
            $data['role'],
            $id
        ]);
    }

    // Update password pekee
    public function updatePassword(int $id, string $password): bool
    {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare(
            "UPDATE {$this->table}
             SET password = ?
             WHERE id = ?"
        );

        return $stmt->execute([$hashed, $id]);
    }

    /* =====================================================
       DELETE / STATUS
    ===================================================== */

    // Futa user kabisa (hard delete)
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM {$this->table} WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }

    /* =====================================================
       HELPERS (OPTIONAL – FUTURE READY)
    ===================================================== */

    // Hesabu users kwa role
    public function countByRole(string $role): int
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM {$this->table} WHERE role = ?"
        );
        $stmt->execute([$role]);
        return (int) $stmt->fetchColumn();
    }
}




