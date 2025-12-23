<?php
class user
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $passwordhash;

    public function __construct($id, $nom, $prenom, $email, $passwordHash = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

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
}
