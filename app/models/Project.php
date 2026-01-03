<?php
// namespace App\Models;

// use App\Core\Model;

// class Project extends Model
// {
//     public function all()
//     {
//         return $this->db->query(
//             "SELECT * FROM projects ORDER BY id DESC"
//         )->fetchAll();
//     }
// }



namespace App\Models;

use App\Core\Model;
use PDO;

class Project extends Model
{
    protected string $table = 'projects';

    public function all(): array
    {
        $stmt = $this->db->query(
            "SELECT * FROM {$this->table} ORDER BY id DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO {$this->table} (name, description)
             VALUES (?, ?)"
        );

        return $stmt->execute([
            $data['name'],
            $data['description']
        ]);
    }
}
