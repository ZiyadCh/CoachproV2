<?php
require_once "../config/database.php";
class user extends connection
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;

    public function __construct($id, $nom, $prenom, $email, $password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
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

    public function show()
    {
        $sql = "select * from users";
        $stmt = $this->connect()->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $this->id . "</br>";
        echo $this->nom . "</br>";
        echo $this->prenom . "</br>";
        echo $this->email . "</br>";
        echo $this->password. "</br>";
    }
}
