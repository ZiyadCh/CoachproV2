<?php 
class user{
    protected $id;
    protected $email;
    protected $password;
}
class coach extends user{
    protected $discipline;
    protected $experience;
    protected $description;
}
?>