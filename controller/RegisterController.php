<?php

class RegisterController{
    
    public function __construct(Registerview $rv,RegisterModel $rm,Datetimeview $dtv,LayoutView $lv)
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
        
    }
    
}