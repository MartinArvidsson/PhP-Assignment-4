<?php

class registerview{

	private static $Username = 'Registerview::Username';
	private static $Password = 'Registerview::Password';
	private static $RepeatedPassword = 'Registerview::RepeatedPassword';
	private static $RegisterUser = 'Registerview::Register';
	private static $Message = 'Registerview::Message';
	private static $Savedname ="";
	
	
	public function response()
	{
	    return $this->GenerateRegistrationForm("");
	}
	
	private function GenerateRegistrationForm($Message)
	{
	    return '
	    <h2>Register a new user</h2>
	    
	    <form method="post" >
         <fieldset>
         <legend>Register a new user - Write username and password</legend>
         <p id="'. self::$Message .'"> '.$Message.' </php> 
         <label for="' . self::$Username . '">Username :</label>
	   	 <input type="text" id="' . self::$Username . '" name="' . self::$Username . '" value="'. self::$Savedname .'" /> 
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
	    else
	    {
	        return false;
	    }
	}
	
	public function getUsername()
	{
	    return $_POST[self::$Username];
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