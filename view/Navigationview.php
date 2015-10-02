<?php

class Navigationview{
    private static $registerview = "register";
    
    
    private function getlinktoregister()
    {
        return "<a href='?'".self::$registerview."'>Register a new user</a>";
    }
    
    private function getlinktologin()
    {
        return "<a href='?'>Go back to Login</a>";
    }
    
    public function Doesuserwanttoregister()
    {
        return isset($_GET[self::$registerview]);
    }
    
    public function getLink(){
        if(!$this->Doesuserwanttoregister())
        {
            return $this->getlinktoregister();
        }
        else
        {
            return $this->getlinktologin();
        }
    }
    
}
