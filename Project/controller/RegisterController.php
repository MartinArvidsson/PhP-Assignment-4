<?php

class RegisterController{

    public function __construct(Registerview $rv, RegisterModel $rm, LoginView $lv)
    {
        $this->rv = $rv;
        $this->rm = $rm;
        $this->lv = $lv;
    }
    
    public function Init()
    {
         //Hämta data från regview, skicka till RegisterDAL
        if($this->rv->Doesuserwanttoregister() == true)
        {
            if($this->rm->RegisterUser($this->rv->getUsername(),$this->rv->getPassword(),$this->rv->getRepeatPassword()) ==  true)
            {
                    $_SESSION['SUCCESSFULREG'] = true;
                    $link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                    header("Location:$link");
            }
            else
            {
                return $this->rv;
            }
            //if register ok
            //return $this->lv;
            //else
            //return $this->rv;
        }
        else{
            return $this->rv;
        }
    }
    
}