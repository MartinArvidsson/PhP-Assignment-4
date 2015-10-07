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
        if($this->rv->Doesuserwanttoregister())
        {
            if($this->rm->RegisterUser($this->rv->getUsername(),$this->rv->getPassword(),$this->rv->getRepeatPassword()))
            {
                    $_SESSION['SUCCESSFULREG'] = true;
                    header("Location:?");
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