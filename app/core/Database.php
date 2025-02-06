<?php
namespace app\Core;

class Database {
    private $connection;

    public function __construct() {
        $dsn = "pgsql:host=localhost;dbname=cabinet_mdical;user=postgesql;password=2001";
        $this->connection = new \PDO($dsn);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->connection;
    }
}