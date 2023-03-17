<?php
// models/Menu.php

class Menu extends Model
{
    protected $table = 'menu';

    public function all()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY position ASC";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $query = $this->pdo->prepare($sql);
        $query->execute(['id' => $id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function findChildren($parent_id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE parent_id = :parent_id ORDER BY position ASC";
        $query = $this->pdo->prepare($sql);
        $query->execute(['parent_id' => $parent_id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
