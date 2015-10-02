<?php

class LoginController{
    
    private $view;
    private $Model;
    
    public function __construct(LoginView $view,LoginModel $Model){ //Skapar 2 instanser av Model och View
      $this -> view = $view;
      $this -> Model = $Model;
    }
    
    public function checkLogin(){ //Kollar om man vill logga in eller ut beroende på vad funktionerna i LoginView säger rad 83-97
        if($this->view->doesUserWantToLogout())
        { //Är man inloggad
            $this->Model->UserWantsToLogout();
        }
        else if($this->view->doesUserWantToLogin())
        { //Försöker logga in
            $this->Model->CheckLogin($this->view->getPassword(),$this->view->getUsername());
        }
        
    }
}