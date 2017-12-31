<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/OtherDAO.php");
	require_once("action/DAO/BabillardDAO.php");
	require_once("action/DAO/MiscDAO.php");

	class indexAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC); //super(visibility?)
		}

		protected function executeAction() {
			$this->babillards = BabillardDAO::getAllBabillards();
			$this->babillards_visible_count = 0;

			foreach ($this->babillards as $item) { 
				if($item['visible'] == 1){
					$this->babillards_visible_count++;
				}
			}

			$this->mainLogoMobile = OtherDAO::getLogo("main_logo_mobile");
			$this->mainLogoLarge = OtherDAO::getLogo("main_logo_large");
			$this->hotelLogo = OtherDAO::getLogo("hotel_logo");
			$this->hotelLink = OtherDAO::get("hotel_link");
			$this->hotelBackground = OtherDAO::getLogo("background_hotel");

			$this->backgroundImageMobile = OtherDAO::getLogo("background_image_mobile");
			$this->backgroundVideo = OtherDAO::getVideo("background_video");
		
			$this->cnnBar=OtherDAO::get("cnn_bar");
			$this->classiqueFooterVideo=OtherDAO::get("home_youtube_video");
			$this->mapCoords=MiscDAO::get("google_map_coords");
			$this->countdownDate=MiscDAO::get("countdown_date");

			$this->countdownLabel_months=["mois", "month"];
			$this->countdownLabel_days=["jours", "days"];
			$this->countdownLabel_hours=["heures et", "hours and"];
			$this->countdownLabel_minutes=["minutes", "minutes"];
			$this->countdownLabel_seconds=["secondes", "seconds"];

			// $this->babillardImages=[
			// 					['img/babillard/b-showtime.jpg', 'img/babillard/b-showtime.jpg'],
			// 					['img/babillard/b-blank.jpg', 'img/babillard/b-blank.jpg'],
			// 					['img/babillard/b-arthur.jpg', 'img/babillard/b-arthur.jpg'],
			// 					['img/babillard/b-crystal.jpg', 'img/babillard/b-crystal.jpg'],
			// 					['img/babillard/b-rbc.jpg', 'img/babillard/b-rbc.jpg'],
			// 					['img/babillard/b-gam.jpg', 'img/babillard/b-gam.jpg'],
			// 					['img/babillard/b-parasuco.jpg', 'img/babillard/b-parasuco.jpg'],
			// 					['img/babillard/b-lauzon.jpg', 'img/babillard/b-lauzon.jpg'],
			// 					['img/babillard/b-gallery-fr.jpg', 'img/babillard/b-gallery-en.jpg'],
			// 					['img/babillard/b-reser-fr.jpg', 'img/babillard/b-reser-en.jpg'],
			// 					['img/babillard/b-danceshoes.jpg', 'img/babillard/b-danceshoes.jpg'],
			// 					['img/babillard/b-result-fr.jpg', 'img/babillard/b-result-en.jpg']

			// 				];

			// $this->babillardFullPub=[
			// 					["img/babillard/LaClassique_Ad_November_2016_showtime.jpg", "img/babillard/LaClassique_Ad_November_2016_showtime.jpg"],
			// 					["", ""],
			// 					['STTabqzbHvM', 'STTabqzbHvM'],
			// 					['img/babillard/cc_evia_ballroom_fp_jan_ad_final_REV1.jpg', 'img/babillard/cc_evia_ballroom_fp_jan_ad_final_REV1.jpg'],
			// 					["img/babillard/rbc_pub.jpg", "img/babillard/rbc_pub.jpg"],
			// 					["img/babillard/gampub.jpg", "img/babillard/gampub.jpg"],
			// 					["img/babillard/LaClassique_Ad_November_2016.jpg", "img/babillard/LaClassique_Ad_November_2016.jpg"],
			// 					['dGd1mHbybpg', 'dGd1mHbybpg'],
			// 					[null, null],
			// 					['img/babillard/reser_ad.jpg', 'img/babillard/reser_ad.jpg'],
			// 					[null, null],
			// 					["pdf/event/0002017ClaChampionsAnglaisFrancaisSept15.pdf", "pdf/event/0002017ClaChampionsAnglaisFrancaisSept15.pdf"]
			// 				];

			$this->hotelCTA=["Réservez maintenant!","Book now!"];

			$this->subscribeTitle=["S'inscrire en tant que membre", "Subscribe as a member"];
			$this->subscribePlaceholder=["votre@courriel.ici", "your@email.here"];
			$this->subscribeButton=["S'abonner", "Subscribe"];
			$this->seeVideo=["Voir la vidéo", "See the video"];
		}
	}
?>