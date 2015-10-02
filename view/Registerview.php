<?php

class registerview{
    
    
    
    private function generateLoginFormHTML() { //Koden att generera en användare.
		return '
			<form method="post" > 
				<fieldset>
					<legend>Register a new user - Write username and password</legend>
				    
				    <label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name .'" value="" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					
					<label for="' . self::$repeatpassword . '">Repeat Password :</label>
					<input type="password" id="' . self::$repeatpassword . '" name="' . self::$repeatpassword . '" />
					
					<input type="submit" name="Register" value="Register" />
				</fieldset>
			</form>
		';
	}
    
}