<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");


	class LoginAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC); //super(visibility?)
		}

		protected function executeAction() {
			$this->wrongLogin = false;
			$this->loggedOut = false;
			

			if (!empty($_GET["logout"])) {
				$this->loggedOut = true;
			}

			if (isset($_POST["console-username"])) {
				$user = UserDAO::authenticate($_POST["console-username"], $_POST["console-password"]);

				if (!empty($user)) {
					$_SESSION["username"] = $user["username"];
					$_SESSION["visibility"] = $user["visibility"];
					
					header("location:console_home.php");
					exit;
				}
				else {
					$this->wrongLogin = true;
				}
			}
        }
		
	}
	
?>