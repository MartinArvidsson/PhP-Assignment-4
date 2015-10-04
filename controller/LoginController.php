<?php

class LoginController{
    
    private $view;
    private $Model;
    
    public function __construct(LoginView $view,LoginModel $model,DateTimeView $datetime,LayoutView $layoutview){ //Skapar 2 instanser av Model och View
      $this-> View = $view;
      $this-> Model = $model;
      $this->Datetime = $datetime;
      $this->LayoutView = $layoutview;
    }
    
    public function Init()
    {
        $this->checkLogin();
        $this->LayoutView->render($this->Model->Issessionset(),true,$this->View,$this->Datetime);
    }
    
    public function checkLogin(){ //Kollar om man vill logga in eller ut beroende på vad funktionerna i LoginView säger rad 83-97
        if($this->View->doesUserWantToLogout())
        { //Är man inloggad
            $this->Model->UserWantsToLogout();
        }
        else if($this->View->doesUserWantToLogin())
        { //Försöker logga in
            $this->Model->CheckLogin($this->View->getPassword(),$this->View->getUsername());
        }
        
    }
}