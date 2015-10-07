<?php
require_once('model/User.php');
class RegisterDAL
{
    private static $Database = "../Data/Database.bin";
    private $users = array();
    private $serialized;
    //http://conctus.eu/example/5
    public function AddUser($Username,$Password)
    {
        //Lägg till en ny användare.
        //http://php.net/manual/en/function.hash.php
        array_push($this->users,new User($Username,$Password));
        
        $this->serialized = serialize($this->users);
        
        
        
        file_put_contents(self::$Database, $this->serialized);
        
    }
    
    public function GetAllUsers()
    {
        //Returnerar platsen där datan sparas unserialized så att man kan lägga till fler användare, man kan också jämföra mot datan som finns i arrayen.
        
        return unserialize(file_get_contents(self::$Database));
        
    }
}