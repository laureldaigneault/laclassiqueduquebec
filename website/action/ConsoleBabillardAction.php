<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/PdfsDAO.php");
	require_once("action/DAO/ImagesDAO.php");
	require_once("action/DAO/BabillardDAO.php");


	class ConsoleBabillardAction extends CommonAction {
		
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

			$this->newBabillardError = null;
			$this->newBabillardSuccess = null;


			// create new menu
			if(isset($_POST["create_babillard"])){
				
				// verify if all data was submitted
				if(!isset($_POST["typeOfMenu"])) {
					$this->newBabillardError = "Please specify the type of item.";
				}
				if(!isset($_POST["coverImageFr"]) || !isset($_POST["coverImageEn"])) {
					$this->newBabillardError = "Please specify the image of the item to be displayed.";
				}
				if(isset($_POST["typeOfMenu"]) && isset($_POST["coverImageFr"]) && isset($_POST["coverImageEn"])){
					if($_POST["typeOfMenu"] == 'url' && (!isset($_POST["type_url_link_fr"]) || !isset($_POST["type_url_link_en"]))){
						$this->newBabillardError = "Please specify the url of the item.";
					}
					if($_POST["typeOfMenu"] == 'img' && (!isset($_POST["type_img_fr"]) || !isset($_POST["type_img_en"]) || !isset($_POST['type_image_extra_link_fr']) ||!isset($_POST['type_image_extra_link_en']))){
						$this->newBabillardError = "Please specify the image and link of the item.";
					}
					if($_POST["typeOfMenu"] == 'pdf' && (!isset($_POST["type_pdf_fr"]) || !isset($_POST["type_pdf_en"]))){
						$this->newBabillardError = "Please specify the pdf of the item.";
					}
					if($_POST["typeOfMenu"] == 'page' && (!isset($_POST["type_page_value"]))){
						$this->newBabillardError = "Please specify the page of the item.";
					}
					if($_POST["typeOfMenu"] == 'youtube' && (!isset($_POST["type_youtube_fr"]) || !isset($_POST["type_youtube_en"]))){
						$this->newBabillardError = "Please specify the youtube video of the item.";
					}

					if(is_null($this->newBabillardError)){
						// all data required was submitted
						// $creation_error = BabillardDAO::createBabillard($type, $image_fr, $image_en, $arg1_fr, $arg2_fr, $arg3_fr, $arg1_en, $arg2_en, $arg3_en);
						if($_POST["typeOfMenu"] == 'url'){
							$creation_error = BabillardDAO::createBabillard($_POST["typeOfMenu"], $_POST["coverImageFr"], $_POST["coverImageEn"], $_POST["type_url_link_fr"], null, null, $_POST["type_url_link_en"], null, null);
						}
						if($_POST["typeOfMenu"] == 'img'){
							$xtralink_fr = null;
							$xtralink_en = null;
							if(isset($_POST['type_image_extra_extra_link_fr'])){
								$xtralink_fr = $_POST['type_image_extra_extra_link_fr'];
							}
							if(isset($_POST['type_image_extra_extra_link_en'])){
								$xtralink_en = $_POST['type_image_extra_extra_link_en'];
							}
							$creation_error = BabillardDAO::createBabillard($_POST["typeOfMenu"], $_POST["coverImageFr"], $_POST["coverImageEn"], $_POST['type_image_extra_link_fr'], $_POST["type_img_fr"], $xtralink_fr, $_POST['type_image_extra_link_en'], $_POST["type_img_en"], $xtralink_en);
						}
						if($_POST["typeOfMenu"] == 'pdf'){
							$creation_error = BabillardDAO::createBabillard($_POST["typeOfMenu"], $_POST["coverImageFr"], $_POST["coverImageEn"], $_POST["type_pdf_fr"], null, null, $_POST["type_pdf_en"], null, null);
						}
						if($_POST["typeOfMenu"] == 'page'){
							$creation_error = BabillardDAO::createBabillard($_POST["typeOfMenu"], $_POST["coverImageFr"], $_POST["coverImageEn"], $_POST["type_page_value"], null, null, $_POST["type_page_value"], null, null);
						}
						if($_POST["typeOfMenu"] == 'youtube'){
							$creation_error = BabillardDAO::createBabillard($_POST["typeOfMenu"], $_POST["coverImageFr"], $_POST["coverImageEn"], $_POST["type_youtube_fr"], null, null, $_POST["type_youtube_en"], null, null);
						}

						if(is_null($creation_error)){
							$this->newBabillardSuccess = "The item was created successfully";
						} else {
							$this->newBabillardError = "Sorry, there was an error creating the item.";
						}


					}
				}
			}

			// get data
			$this->babillards = BabillardDAO::getAllBabillards();

        }
	}
	
?>