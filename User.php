<?php
// models/User.php

class User extends Model
{
    protected $table = 'users';

    public function findByUsername($username)
    {
        $sql = "SELECT * FROM {$this->table} WHERE username = :username LIMIT 1";
        $query = $this->pdo->prepare($sql);
        $query->execute(['username' => $username]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $query = $this->pdo->prepare($sql);
        $query->execute(['id' => $id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
