<?php

class RegisterController{
    private $Username;
    private $Password;
    private $RepeatPassword;
    
    public function __construct(Registerview $rv,RegisterDAL $rm,Datetimeview $dtv,LayoutView $lv)
    {
        $this->rv = $rv;
        $this->rm = $rm;
        $this->lv = $lv;
        $this->dtv = $dtv;
    }
    
    public function Init()
    {
        $this->RegisterUser();
        $this->lv->render(false,true,$this->rv,$this->dtv);
    }
    
    private function RegisterUser()
    {
        //Hämta data från regview, skicka till RegisterDAL
        $this->rm->RegisterUser($this->rv->getUsername(),$this->rv->getPassword(),$this->rv->getRepeatPassword());
    }
    
}