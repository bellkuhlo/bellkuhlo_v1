<?php
// core/classes/Model.php

namespace core\classes;

use core\database\Connection;
use core\database\QueryBuilder;

abstract class Model
{
    protected $table;
    protected $pdo;
    protected $queryBuilder;

    public function __construct()
    {
        $config = require 'config/database.php';
        $this->pdo = Connection::make(
            $config['host'],
            $config['port'],
            $config['dbname'],
            $config['username'],
            $config['password']
        );
        $this->queryBuilder = new QueryBuilder($this->pdo);
    }

    public function all()
    {
        return $this->queryBuilder->selectAll($this->table);
    }

    public function create($data)
    {
        $this->queryBuilder->insert($this->table, $data);
    }
}
