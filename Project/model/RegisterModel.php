<?php
class RegisterModel
{   
    private $Usernametorval;
    private $Passwordtorval;
    private $RepeatPasswordtoval;
    private $RegisterDAL;
    private $ListofUsers;
    private $Registermessage = "";
    public function __construct(RegisterDAL $_RegisterDAL)
    {
        $this->RegisterDAL = $_RegisterDAL;
    }

    public function RegisterUser($_Username,$_Password,$_RepeatPassword)
    {
        $this->Usernametorval = $_Username;
        $this->Passwordtorval = $_Password;
        $this->RepeatPasswordtoval = $_RepeatPassword;
        
        
        if($this->ValidateUser($this->Usernametorval,$this->Passwordtorval,$this->RepeatPasswordtoval) == true)
        {
            $this->RegisterDAL->AddUser($this->Usernametorval,$this->Passwordtorval);
            return true;
        }
    }
    
    private function ValidateUser($Usernametorval,$Passwordtorval,$RepeatPasswordtoval)
    {
        $ListofUsers = $this->RegisterDAL->GetAllUsers(); //<- Does not work, .bin file not yet created, need to learn Serialize first.
        //Will check if username already exists in the list of registed users. 
        if(strip_tags($Usernametorval) != $Usernametorval)
        {
            $this->Registermessage ="Username contains invalid characters.";
        }
        elseif(strip_tags($Passwordtorval) != $Passwordtorval)
        {
            $this->Registermessage ="password contains invalid characters.";
        }
        elseif(strlen($Usernametorval) < 3 && strlen($Passwordtorval) < 6)
        {
            $this->Registermessage ="Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters.";
        }        
        elseif(strlen($Usernametorval) < 3)
        {
            $this->Registermessage ="Username has too few characters, at least 3 characters.";
        }
        elseif(ctype_space($Passwordtorval) || strlen($Passwordtorval) < 6)
        {
            $this->Registermessage ="Password has too few characters, at least 6 characters.";
        }
        elseif(strlen($Passwordtorval) < 6)
        {
            $this->Registermessage ="Password has too few characters, at least 6 characters.";
        }
        elseif($Passwordtorval != $RepeatPasswordtoval)
        {
            $this->Registermessage ="Passwords do not match.";
        }
        
        elseif($ListofUsers != null)
        {
            foreach($ListofUsers as $RegistedUsers)
            {
                if($Usernametorval == $RegistedUsers->getUsername())
                {
                    $this->Registermessage = "User exists, pick another username.";
                }
            }
        }
        
        if($this->Registermessage == "")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getMessage()
    {
         return $this->Registermessage;
    }
    
}