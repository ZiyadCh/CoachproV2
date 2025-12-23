<?php
require_once "../config/database.php";
class user extends connection
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $role;
    protected $password;

    public function __construct($id, $nom, $prenom, $email,$role, $password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->role = $role;
        $this->password= $password;
    }
    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    //setters
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setPass($password){
        $this->password= $password;
    }
    public function insert(){
        $sql = "insert into users(nom,prenom,email,role,password) values(". $this->nom .",".$this->prenom.",".$this->email.",".$this->role.", ".$this->password.")";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute();

    }
}
