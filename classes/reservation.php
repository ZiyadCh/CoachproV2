<?php
require_once "../config/database.php";
require_once "../classes/seance.php";
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
    public function insert($seance_id,$sportif_id){
      $pdo = $this->connect();  
      $sql = "insert into reservations(seance_id,sportif_id) values(:seance_id,:sportif_id)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ":seance_id" => $seance_id,
        ":sportif_id" => $sportif_id
      ]);
      $seance = new seance(0,0,0,0,0);
      $seance->modifierStatut($seance_id);
    }
}
?>