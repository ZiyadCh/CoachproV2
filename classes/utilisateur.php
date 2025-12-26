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
        $pdo = $this->connect();
        $sql = "select * from users where email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            ':email' => $this->email
        ]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            header("location: ../pages/register.php");
            exit();
        }
        $sql = "insert into users (nom, prenom, email, role, password) values(:nom, :prenom, :email, :role, :password)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nom' => $this->nom,
            ':prenom' => $this->prenom,
            ':email' => $this->email,
            ':role' => $this->role,
            ':password' => $this->password
        ]);

        $userId = $pdo->lastInsertId(); 
    if (!$userId) {
        throw new Exception("User insert failed");
    }

    return (int)$userId; 
     
    }
    //login
    public function login($emailCheck, $passCheck)
    {
        $sql = "select * from users where email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            ':email' => $emailCheck
        ]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            $id = $row['id'];
            $emails = $row['email'];
            $role = $row['role'];
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $pass = $row['password'];
        }

        if ($emailCheck === $emails) {
            //password validaiton
            if (password_verify($passCheck,$pass) ) {
                //check role
                if ($role == 'sportif') {
                    //sesion
                   $_SESSION['id'] = $id; 
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    header("location: ../pages/dashboard.sportif.php");
                    exit();
                } elseif ($role == 'coach') {
                    //sesion
                   $_SESSION['id'] = $id; 
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    header("location: ../pages/dashboard.coach.php");
                    exit();
                }
            } else {
                echo "not";
            }
        }
        else {
            echo "email n'existe pas";
        }
    }

}

