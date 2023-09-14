<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    private $pdo;
    private $stat;
    public static $index;
    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=UTF8";
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // public static function getInstance()
    // {
    //     if ($this->$pdo) {
    //         return $this->$pdo;
    //     }
    //     return $instance = new self();
    // }

    public function query($query)
    {
        $this->stat = $this->pdo->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stat->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stat->execute();
    }
    public function fetchAll()
    {
        $this->execute();
        return $this->stat->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetch()
    {
        $this->execute();
        return $this->stat->fetch(PDO::FETCH_ASSOC);
    }     
    
    public function rowCount(){
        return $this->stat->rowCount();
    }
}