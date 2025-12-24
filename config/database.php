<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class connection
{
    private static $instance = null;
    private $host = "localhost";
    private $user = "coachuser";
    private $password = "strongpassword";
    private $db = "coachprov2";
    private $pdo;

    protected function connect()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=utf8mb4";
           $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage());
            throw new Exception("Database connection failed");
        }
    }
      public static function getInstance($dsn = null, $username = null, $password = null) {
        if (self::$instance === null) {
            $dsn = $dsn ?? 'mysql:host=localhost;dbname=your_database_name';
            $username = $username ?? 'your_username';
            $password = $password ?? 'your_password';
            self::$instance = new connection($dsn, $username, $password);
        }
        return self::$instance;
    }
  public function getConnection() {
        return $this->pdo;
    }
}
