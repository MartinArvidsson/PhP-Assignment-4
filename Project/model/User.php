<?php

class User
{
    private $Username;
    private $Password;
    
    public function __construct($_Username,$_Password)
    {
        $this->Username = $_Username;
        //http://php.net/manual/en/function.hash.php
        $_Password = hash('sha1', $_Password);
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