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
}
?>