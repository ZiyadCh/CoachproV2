<?php 
require_once '../classes/utilisateur.php';
class coach extends user
{
    protected $discipline;
    protected $experience;
    protected $description;

    public function __construct($discipline, $experience, $description)
    {
        $this->discipline = $discipline;
        $this->experience = $experience;
        $this->description = $description;
    }

    //getters
    public function getDiscipline()
    {
        return $this->discipline;
    }
    public function getExperience()
    {
        return $this->experience;
    }
    public function getDescription()
    {
        return $this->description;
    }

    //setters
    public function setDiscipline($discipline){
        $this->discipline = $discipline;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setExperience($experience){
        $this->experience = $experience;
    }
 public function insert()
    {
        $sql = "insert into coachs (discipline,experience,description) values(:dis,:exp,:desc)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([
            ':dis' => $this->discipline,
            ':exp' => $this->experience,
            ':desc' => $this->description
        ]);
    }
}
?>