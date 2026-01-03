<?php
namespace App\Models;

use App\Core\Model;

class Project extends Model
{
    public function all()
    {
        return $this->db->query(
            "SELECT * FROM projects WHERE type IN ('duka','bar')"
        )->fetchAll();
    }
}
