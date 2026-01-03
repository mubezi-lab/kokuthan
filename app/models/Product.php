<?php
namespace App\Models;

use App\Core\Model;

class Product extends Model
{
    public function all()
    {
        return $this->db->query(
            "SELECT products.*, projects.name AS project_name
             FROM products
             JOIN projects ON projects.id = products.project_id
             ORDER BY products.id DESC"
        )->fetchAll();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO products 
            (project_id, name, buying_price, selling_price, unit)
            VALUES (?,?,?,?,?)"
        );

        return $stmt->execute([
            $data['project_id'],
            $data['name'],
            $data['buying_price'],
            $data['selling_price'],
            $data['unit']
        ]);
    }
}
