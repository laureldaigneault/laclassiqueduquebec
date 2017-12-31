<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/PdfsDAO.php");
	require_once("action/DAO/ImagesDAO.php");
	require_once("action/DAO/MenusDAO.php");

	class ConsoleMenusAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMIN);
		}

		protected function executeAction() {
			$this->pdfs_en = PdfsDAO::getPdfsWithParam('en');
			$this->pdfs_fr = PdfsDAO::getPdfsWithParam('fr');
			$this->pdfs_bi = PdfsDAO::getPdfsWithParam('bi');

			$this->images_en = ImagesDAO::getImagesWithParam('en', 0);
			$this->images_fr = ImagesDAO::getImagesWithParam('fr', 0);
			$this->images_bi = ImagesDAO::getImagesWithParam('bi', 0);

			$this->newMenuError = null;
			$this->newMenuSuccess = null;


			// create new menu
			if(isset($_POST["create_menu"])){
				
				// verify if all data was submitted
				if(!isset($_POST["sectionOfMenu"])){
					$this->newMenuError = "Please specify the section of the menu.";
				}
				if(!isset($_POST["menuNameEnglish"]) || !isset($_POST["menuNameFrench"])) {
					$this->newMenuError = "Please enter a french and english name for the menu.";
				}
				if(!isset($_POST["typeOfMenu"])) {
					$this->newMenuError = "Please specify the type of menu.";
				}
				if(isset($_POST["menuNameEnglish"])){
					if($_POST["typeOfMenu"] == 'url' && (!isset($_POST["type_url_link_fr"]) || !isset($_POST["type_url_link_en"]))){
						$this->newMenuError = "Please specify the url of the menu.";
					}
					if($_POST["typeOfMenu"] == 'img' && (!isset($_POST["type_img_fr"]) || !isset($_POST["type_img_en"]))){
						$this->newMenuError = "Please specify the image of the menu.";
					}
					if($_POST["typeOfMenu"] == 'pdf' && (!isset($_POST["type_pdf_fr"]) || !isset($_POST["type_pdf_en"]))){
						$this->newMenuError = "Please specify the pdf of the menu.";
					}

					if(is_null($this->newMenuError)){
						// all data required was submitted
						if($_POST["typeOfMenu"] == 'url'){
							$creation_error = MenusDAO::createMenu($_POST["sectionOfMenu"], $_POST["typeOfMenu"], $_POST["menuNameFrench"], $_POST["menuNameEnglish"], $_POST["type_url_link_fr"], $_POST["type_url_link_en"]);
						}
						if($_POST["typeOfMenu"] == 'img'){
							$creation_error = MenusDAO::createMenu($_POST["sectionOfMenu"], $_POST["typeOfMenu"], $_POST["menuNameFrench"], $_POST["menuNameEnglish"], $_POST["type_img_fr"], $_POST["type_img_en"]);
						}
						if($_POST["typeOfMenu"] == 'pdf'){
							$creation_error = MenusDAO::createMenu($_POST["sectionOfMenu"], $_POST["typeOfMenu"], $_POST["menuNameFrench"], $_POST["menuNameEnglish"], $_POST["type_pdf_fr"], $_POST["type_pdf_en"]);
						}
						
						if(is_null($creation_error)){
							$this->newMenuSuccess = "The menu was created successfully";
						} else {
							$this->newMenuError = "Sorry, there was an error creating the menu.";
						}


					}
				}
			}

			// get data
			$this->event_menus = MenusDAO::getAllMenus('event');
			$this->ticket_menus = MenusDAO::getAllMenus('ticket');

        }
	}
	
?>