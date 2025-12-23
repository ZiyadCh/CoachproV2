<?php 
include './classes/utilisateur.php';
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
}
?>