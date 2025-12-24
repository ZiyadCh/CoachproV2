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

    public function __construct($id, $nom, $prenom, $email, $role, $password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->role = $role;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
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
    public function getRole()
    {
        return $this->role;
    }
    public function getEmail()
    {
        return $this->email;
    }
    //setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPass($password)
    {
        $this->password = $password;
    }
    //insert into mysql
    public function insert()
    {
        $sql = "insert into users (nom, prenom, email, role, password) values(:nom, :prenom, :email, :role, :password)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([
            ':nom' => $this->nom,
            ':prenom' => $this->prenom,
            ':email' => $this->email,
            ':role' => $this->role,
            ':password' => $this->password
        ]);
    }
    public function login($emailCheck, $passCheck)
    {
        $sql = "select * from users where email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            ':email' => $emailCheck
        ]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            $emails = $row['email'];
            $role = $row['role'];
            $nom = $row['nom'];
            $prenom = $row['prenom'];
        }
        if ($emailCheck === $emails) {
            //check role
            if ($role == 'sportif') {
            header("location: ../pages/dashboard.sportif.php");
            exit();
            }
            elseif ($role == 'coach') {
            header("location: ../pages/dashboard.coach.php");
            exit();
            }
            //sesion
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
        } else {
            echo "not";
        }
    }
}
