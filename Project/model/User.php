<?php

class User
{
    private $Username;
    private $Password;
    
    public function __construct($_Username,$_Password)
    {
        $this->Username = $_Username;
        $this->Password = $_Password;
    }
    
    public function getUsername()
    {
        return $this-> Username;
    }
    
    public function getPassword()
    {
        return $this->Password;
    }
}