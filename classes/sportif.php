<?php
include './classes/utilisateur.php';
class sportif extends user
{
    public function __construct()
    {
    }
    public function insertId($userId)
    {
        $pdo = $this->connect();
        $sql = "INSERT INTO sportifs (user_id) VALUES (:user_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId
        ]);
    }
}
