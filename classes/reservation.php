<?php
require_once "../config/database.php";
class reservation extends connection{
    protected $id;
    protected $seance_id;
    protected $sportif_id;
    protected $date_reservation;

    public function __construct($seance_id,$sportif_id,$date_reservation)
    {
        $this->seance_id = $seance_id;
        $this->sportif_id= $sportif_id;
        $this->date_reservation= $date_reservation;
    }
    public function getSeanceId(){
      $pdo = $this->connect();  
      $sql = "select seance_id from reservations where id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ":id" => $this->id
      ]);
      $result = $stmt->fetch(PDO::FETCH_DEFAULT);
      echo $result['seance_id'];
    }
}
?>