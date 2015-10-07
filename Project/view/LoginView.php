<?php

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	
	private $Model;
	
	public function __construct(LoginModel $Model){
		$this -> Model = $Model;
		
	 	if(!isset($_SESSION['SUCCESSFULREG']))
	 	{
	 		$_SESSION['SUCCESSFULREG'] = false;
	 	}
	}

	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	 
	public function response() {
		if($_SESSION['SUCCESSFULREG'] == false)
		{
			$message = $this->Model->GetMessage(); //Beroende på vad meddelandet säger visas antingen logout eller login
		}
		else
		{
			$message = "Registered new user.";
			$_SESSION['SUCCESSFULREG'] = false;
		}
		$response = "";
		
		if($this->Model->Issessionset())
		{
			$response .= $this->generateLogoutButtonHTML($message);
		}
		else
		{
		   	$response = $this->generateLoginFormHTML($message);
		}
		return $response;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) { //Koden för Logout formuläret.
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) { //Koden för login formuläret
		return '
			<a href="?Register">Register</a>
			<form method="post" >
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this->getUsername() . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	public function doesUserWantToLogin(){ //Kollar om login  är tryckt eller ej för login
		if(isset($_POST[self::$login]))
		{
			return true;
		}
		return false;
	}
	
	public function doesUserWantToLogout(){ //Kollar om login  är tryckt eller ej för logout 
		if(isset($_POST[self::$logout]))
		{
			return true;
			
		}
		return false;
	}
	
	public function getUsername(){ //Hämtar ut användarnamn
		if(isset($_POST[self::$name]))
		{
			return $_POST[self::$name];
		}
		else
		{
			return null;
		}
	}
	public function getPassword(){ //Hämtar ut lösenord
		return $_POST[self::$password];
	}

}