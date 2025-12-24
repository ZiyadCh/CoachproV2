<?php
class seance {
    protected $coach_id;
    protected $date;
    protected $heure;
    protected $duree;
    protected $statut;

    public function __construct($coach_id,$date,$heure,$duree,$statut)
    {
        $this->coach_id = $coach_id;
        $this->date = $date;
        $this->heure = $heure;
        $this->duree = $duree;
        $this->statut = $statut;
    }
    
    //getters
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
    public function setCid($coach_id){
        $this->coach_id = $coach_id;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function setHeure($heure){
        $this->heure = $heure;
    }
    public function setCid($coach_id){
        $this->coach_id = $coach_id;
    }
    public function setCid($coach_id){
        $this->coach_id = $coach_id;
    }
}
?>