<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/OtherDAO.php");
	require_once("action/DAO/MiscDAO.php");
	require_once("action/DAO/ImagesDAO.php");
	require_once("action/DAO/VideosDAO.php");
	require_once("action/DAO/SponsorsDAO.php");

	class ConsoleOtherAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMIN);
		}

		protected function executeAction() {
			$this->otherError = null;
			$this->otherSuccess = null;

			$this->newSponsorError = null;
			$this->newSponsorSuccess = null;

			$this->cnnBar = OtherDAO::get("cnn_bar");
			$this->logoMobile = OtherDAO::get("main_logo_mobile");
			$this->logoLarge = OtherDAO::get("main_logo_large");
			$this->menuLogoMobile = OtherDAO::getLogo("menu_bar_logo_mobile");
			$this->menuLogoLarge = OtherDAO::getLogo("menu_bar_logo_large");
			$this->preloaderLogo = OtherDAO::getLogo("preloader_logo");
			$this->faviconIco = OtherDAO::getLogo("favicon_icon");
			$this->backgroundImageMobile = OtherDAO::getLogo("background_image_mobile");
			$this->backgroundVideo = OtherDAO::getVideo("background_video");
			$this->hotelLogo = OtherDAO::getLogo("hotel_logo");
			$this->hotelLink = OtherDAO::get("hotel_link");
			$this->hotelBackground = OtherDAO::get("background_hotel");

			$this->classiqueFooterVideo=OtherDAO::get("home_youtube_video");
			$this->mapCoords=MiscDAO::get("google_map_coords");
			$this->countdownDate=MiscDAO::get("countdown_date");

			$this->logos_en = ImagesDAO::getImagesWithParam('en', 1);
			$this->logos_fr = ImagesDAO::getImagesWithParam('fr', 1);
			$this->logos_bi = ImagesDAO::getImagesWithParam('bi', 1);
			$this->images_en = ImagesDAO::getImagesWithParam('en', 0);
			$this->images_fr = ImagesDAO::getImagesWithParam('fr', 0);
			$this->images_bi = ImagesDAO::getImagesWithParam('bi', 0);
			$this->videos_en = VideosDAO::getVideosWithParam('en');
			$this->videos_fr = VideosDAO::getVideosWithParam('fr');
			$this->videos_bi = VideosDAO::getVideosWithParam('bi');

			if(isset($_POST["create_sponsor"])){
				// verify if all data was submitted
				if(!isset($_POST["sponsor_logo"]) || !isset($_POST["sponsor_url"])) {
					$this->newSponsorError = "Please choose a logo and specify the link for the new sponsor.";
				}
				
				if(is_null($this->newSponsorError)){
					// all data required was submitted
					$creation_error = SponsorsDAO::createSponsor($_POST["sponsor_logo"], $_POST["sponsor_url"]);
						
					if(is_null($creation_error)){
						$this->newSponsorSuccess = "The sponsor was created successfully";
					} else {
						$this->newSponsorError = "Sorry, there was an error creating the sponsor.";
					}
				}
			}

			$this->sponsors = SponsorsDAO::getAllSponsors();
        }
	}
	
?>