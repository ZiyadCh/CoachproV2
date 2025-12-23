<?php 
class user{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $passwordhash;

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getEmail() { return $this->email; }

}
class coach extends user{
    protected $discipline;
    protected $experience;
    protected $description;
}
?>