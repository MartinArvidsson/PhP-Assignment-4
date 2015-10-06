<?php

class registerview{

	private static $Username = 'Registerview::Username';
	private static $Password = 'Registerview::Password';
	private static $RepeatedPassword = 'Registerview::RepeatedPassword';
	private static $RegisterUser = 'Registerview::Register';
	private static $MessageID = 'Registerview::Message';
	
	private $RegModel;		
	private $message;

	
	public function __construct(RegisterModel $_RegModel)
	{
		$this->Regmodel = $_RegModel;
	}
	
	
	public function response()
	{
		$message = $this->Regmodel->getMessage();
	    return $this->GenerateRegistrationForm("");
	}
	
	private function GenerateRegistrationForm($Message)
	{
	    return '
	    <h2>Register a new user</h2>
	    
	    <form method="post" >
         <fieldset>
         <legend>Register a new user - Write username and password</legend>
         <p id="'. self::$MessageID .'"> '.$Message.' </php> 
         <label for="' . self::$Username . '">Username :</label>
	   	 <input type="text" id="' . self::$Username . '" name="' . self::$Username . '" value="'. $this->getUsername() .'" /> 
	   	 <br>
	   	 <label for="' . self::$Password . '">Password :</label>
	   	 <input type="password" id="' . self::$Password . '" name="' . self::$Password . '" value="" /> 
	   	 <br>
	   	 <label for="' . self::$RepeatedPassword . '">Repeat Password :</label>
	   	 <input type="password" id="' . self::$RepeatedPassword . '" name="' . self::$RepeatedPassword . '" value="" /> 
	   	 <br>
	   	 <input type="submit" name="' . self::$RegisterUser . '" value="Register" />
	   	 
	   	 </fieldset>
	   	 </form>
         ';
	}
	
	public function Doesuserwanttoregister()
	{
	    if(isset($_POST[self::$RegisterUser]))
	    {
	        return true;
	    }
	    return false;
	}
	
	public function getUsername()
	{
	    if(isset($_POST[self::$Username]))
		{
			return $_POST[self::$Username];
		}
		else
		{
			return null;
		}
	}
	
	public function getPassword()
	{
	    return $_POST[self::$Password];
	}
	
	public function getRepeatPassword()
	{
		return $_POST[self::$RepeatedPassword];
	}
}