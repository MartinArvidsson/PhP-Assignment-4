<?php

class RegisterModel
{   
    private $Usernametorval;
    private $Passwordtorval;
    private $RepeatPasswordtoval;
    private $RegisterDAL;
    private $ListofUsers;
    private $Registermessage;
    public function __construct(RegisterDAL $_RegisterDAL)
    {
        $this->RegisterDAL = $_RegisterDAL;
    }

    public function RegisterUser($_Username,$_Password,$_RepeatPassword)
    {
        $this->Usernametorval = $_Username;
        $this->Passwordtorval = $_Password;
        $this->RepeatPasswordtoval = $_RepeatPassword;
        
        
        if($this->ValidateUser($Usernametorval,$Passwordtorval,$RepeatPasswordtoval) == true)
        {
            $this->RegisterDAL->AddUser($Usernametorval,$Passwordtorval,$RepeatPasswordtoval);
        }
    }
    
    private function ValidateUser($Usernametorval,$Passwordtorval,$RepeatPasswordtoval)
    {
        $ListofUsers = $this->RegisterDAL->GetAllUsers(); //<- Does not work, .bin file not yet created, need to learn Serialize first.
        //Will check if username already exists in the list of registed users. 
        
        foreach($ListofUsers as $RegistedUsers)
        {
            if($Usernametorval == $RegistedUsers->getUsername())
            {
                $this->Registermessage = "User exists, pick another username."
            }
        }
        if(strip_tags($Usernametorval) != $Usernametorval)
        {
            $this->Registermessage ="Username contains invalid characters.";
        }
        if(strip_tags($Passwordtorval) != $Passwordtorval)
        {
            $this->Registermessage ="password contains invalid characters.";
        }
        if(strlen($Usernametorval) < 3 && strlen($Passwordtorval) < 6)
        {
            $this->Registermessage ="Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters.";
        }
        if(ctype_space($Passwordtorval) || strlen($Passwordtorval) < 6)
        {
            $this->Registermessage ="Password has too few characters, at least 6 characters.";
        }
        if(strlen($Usernametorval) < 3)
        {
            $this->Registermessage ="Username has too few characters, at least 3 characters.";
        }
        if(strlen($Passwordtorval) < 6)
        {
            $this->Registermessage ="Password has too few characters, at least 6 characters.";
        }
        if($Passwordtorval != $RepeatPasswordtoval)
        {
            $this->Registermessage ="Passwords do not match.";
        }
        
        return true;
        
    }
    
    
    public function getMessage()
    {
         return $this->Registermessage;
    }
    
}