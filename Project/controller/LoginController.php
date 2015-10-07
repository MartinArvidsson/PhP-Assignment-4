<?php

class LoginController{
    
    private $view;
    private $Model;
    
    public function __construct(LoginView $view,LoginModel $model){ //Skapar 2 instanser av Model och View
      $this-> View = $view;
      $this-> Model = $model;
    }
    
    public function Init()
    {
        if($this->View->doesUserWantToLogout())
        { //Är man inloggad
            $this->Model->UserWantsToLogout();
        }
        else if($this->View->doesUserWantToLogin())
        { //Försöker logga in
            $this->Model->CheckLogin($this->View->getPassword(),$this->View->getUsername());
        }
        return $this->View;
        
    }
}