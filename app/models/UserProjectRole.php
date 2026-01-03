<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class UserProjectRole extends Model
{
    protected string $table = 'user_project_roles';

    // Assign user to project with role (insert/update)
    public function assign(int $user_id, int $project_id, string $role): array
    {
        try {
            $db = $this->db;
            $db->beginTransaction();

            $stmt = $db->prepare("
                INSERT INTO {$this->table} (user_id, project_id, role)
                VALUES (:user_id, :project_id, :role)
                ON DUPLICATE KEY UPDATE role = :role
            ");

            $stmt->execute([
                ':user_id' => $user_id,
                ':project_id' => $project_id,
                ':role' => $role
            ]);

            $db->commit();

            return ['success' => true];
        } catch (\Exception $e) {
            $db->rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    // Get all projects assigned to a user
    public function getByUser(int $user_id): array
    {
        $stmt = $this->db->prepare("
            SELECT upr.*, p.name AS project_name
            FROM {$this->table} upr
            JOIN projects p ON p.id = upr.project_id
            WHERE upr.user_id = ?
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
