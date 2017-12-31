<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/SubscribeDAO.php");


	class SubscribeAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC); //super(visibility?)
		}

		protected function executeAction() {
			
			if (isset($_POST["sub-email"])) {
				$err = SubscribeDAO::subscribe($_POST["sub-email"]);

				if($err == null){
					if($_SESSION['lang']=='en'){
						echo "Thank you for subscribing to La Classique du Québec 2017!";
					}
					if($_SESSION['lang']=='fr'){
						echo "Merci de vous être abonnés à La Classique du Québec 2017!";
					}
					exit;
				} else {
					if($err == 23000){
						if($_SESSION['lang']=='en'){
							echo "This email is already subscribed.";
						}
						if($_SESSION['lang']=='fr'){
							echo "Ce email est déjà abonné.";
						}
						exit;
					}
					if($_SESSION['lang']=='en'){
						echo "An error occured.";
					}
					if($_SESSION['lang']=='fr'){
						echo "Une erreur est survenue.";
					}
					exit;
				}
			} else {
				if($_SESSION['lang']=='en'){
					echo "An error occured.";
				}
				if($_SESSION['lang']=='fr'){
					echo "Une erreur est survenue.";
				}
				exit;
			}
			
			
		}
		
	}
	
?>