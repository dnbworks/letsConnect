<?php

namespace app\config;
use PDO;

class Database 
{
    private $host = 'localhost';
    private $dbName = 'mismatch';
    private $user = 'root';
    private $pwd = '';
    private $db = null;

    public function connect()
    {
        try {
            $this->db = new PDO($dsn, $user, $password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'connection Error' . $e->getMessage();
        }
       
        return $this->db;
    }

    
}
