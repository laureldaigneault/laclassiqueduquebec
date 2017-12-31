<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/ImagesDAO.php");
	require_once("action/DAO/GalleryDAO.php");

	class ConsoleGalleryAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMIN);
		}

		protected function executeAction() {
			$this->images_fr = ImagesDAO::getImagesWithParam('en', 0);
			$this->images_en = ImagesDAO::getImagesWithParam('fr', 0);
			$this->images_bi = ImagesDAO::getImagesWithParam('bi', 0);

			$this->newGalleryError = null;
			$this->newGallerySuccess = null;

			// create new document
			if(isset($_POST["create_gallery"])){
				
				if(!isset($_POST["photo_id_gal"])){
					$this->newGalleryError = "Please specify the photo to add.";
				}

				if(is_null($this->newGalleryError)){
					// all data required was submitted
					$creation_error = GalleryDAO::createGallery($_POST["photo_id_gal"]);
					
					
					if(is_null($creation_error)){
						$this->newGallerySuccess = "The photo was added successfully";
					} else {
						$this->newGalleryError = "Sorry, there was an error adding the photo.";
					}
				}
			}

			// get data
			$this->gallery_photos = GalleryDAO::getAllGallery();
        }
	}
	
?>