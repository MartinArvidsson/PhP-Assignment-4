<?php
class RegisterDAL
{
    private static $Database = "../Data/Database.bin";
    private $users = array();
    //http://conctus.eu/example/5
    public function AddUser($Username,$Password)
    {
        //Lägg till en ny användare.
        
    }
    
    public function GetAllUsers()
    {
        //Returnerar platsen där datan sparas unserialized så att man kan lägga till fler användare, man kan också jämföra mot datan som finns i arrayen.
        
        return unserialize(file_get_contents(self::$Database));
        
    }
}