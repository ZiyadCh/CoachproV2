<?php
class dbh
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "coachprov2";
    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . 'charset=utf8mb4';
            $pdo = new PDO($dsn,$this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage());
            throw new Exception("Database connection failed.");
        }
        return $pdo;
    }
}
