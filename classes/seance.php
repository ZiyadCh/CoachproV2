<?php
require_once "../config/database.php";
class seance extends connection
{
    protected $id;
    protected $coach_id;
    protected $date;
    protected $heure;
    protected $duree;
    protected $statut;

    public function __construct($coach_id, $date, $heure, $duree, $statut)
    {
        $this->coach_id = $coach_id;
        $this->date = $date;
        $this->heure = $heure;
        $this->duree = $duree;
        $this->statut = $statut;
    }

    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getCid()
    {
        return $this->coach_id;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getHeure()
    {
        return $this->heure;
    }
    public function getDuree()
    {
        return $this->duree;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    //setters
    public function setCid($coach_id)
    {
        $this->coach_id = $coach_id;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
    //cree
    public function creer()
    {
        $pdo = $this->connect();

        $sql = "insert into seances (coach_id, date_seance, heure, duree, statut) 
                VALUES (:coach_id, :date, :heure, :duree, :statut)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':coach_id' => $this->coach_id,
            ':date'     => $this->date,
            ':heure'    => $this->heure,
            ':duree'    => $this->duree,
            ':statut'   => $this->statut
        ]);
    }
    //modifier
    public function modifier()
    {
        $pdo = $this->connect();

        $sql = "update seances
                set date_seance = :date,
                    heure = :heure,
                    duree = :duree,
                    statut = :statut
                where id = :id AND coach_id = :coach_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':coach_id' => $this->coach_id,
            ':date'     => $this->date,
            ':heure'    => $this->heure,
            ':duree'    => $this->duree,
            ':statut'   => $this->statut
        ]);
    }
    //supprimer
    public function delete()
    {
        $pdo = $this->connect();

        $sql = "delete from seances
                where id = :id AND coach_id = :coach_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id'       => $this->id,
            ':coach_id' => $this->coach_id
        ]);
    }
    public function showDisponible()
    {
        $pdo = $this->connect();
        $sql = " select seances.*,nom from seances left join users on seances.coach_id = users.id where statut = 'disponible'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_DEFAULT);
        foreach ($result as $d) {
            echo " 
              <tr>
                <td>" . $d['nom'] . "</td>
                <td>" . $d['date_seance'] . "</td>
                <td>" . $d['heure'] . "</td>
                <td>" . $d['duree'] . "</td>
                <td> <form action='../pages/reserver.php' method='POST'>
                <input type='hidden' name='seance_id' value=" . $d['id'] . ">

                <button type='submit' id='reser'>Reserver</button>
                </form> </td>
             </tr>";
        }
    }
    public function showReservee($coach_id)
    {
        $pdo = $this->connect();
        $sql = "select seances.*,nom from seances left join users on seances.coach_id = users.id where statut = 'reservee' and coach_id = :coach";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':coach' => $coach_id]);
        $result = $stmt->fetchAll(PDO::FETCH_DEFAULT);
        foreach ($result as $d) {
            echo " 
              <tr>
                <td>" . $d['nom'] . "</td>
                <td>" . $d['date_seance'] . "</td>
                <td>" . $d['heure'] . "</td>
                <td>" . $d['duree'] . "</td>
             </tr>";
        }
    }
    //modifier
    public function modifierStatut($seance_id)
    {
        $pdo = $this->connect();

        $sql = "update seances set statut = 'reservee' where id =:id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id'   => $seance_id
        ]);
    }
}
