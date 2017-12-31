<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/ImagesDAO.php");
	require_once("action/DAO/VideosDAO.php");
	require_once("action/DAO/PdfsDAO.php");
	require_once("action/DAO/MenusDAO.php");
	require_once("action/DAO/OtherDAO.php");
	require_once("action/DAO/MiscDAO.php");
	require_once("action/DAO/GalleryDAO.php");
	require_once("action/DAO/SponsorsDAO.php");
	require_once("action/DAO/MembersDAO.php");
	require_once("action/DAO/CompetitorsDAO.php");
	require_once("action/DAO/BabillardDAO.php");


	class DummyAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC); //super(visibility?)
		}

		protected function executeAction() {
			
			if($_POST['action'] == "image_delete"){
				if(isset($_POST['id']) && isset($_POST['url']))
					$error = ImagesDAO::deleteImage($_POST['url'], $_POST['id']);
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "video_delete"){
				if(isset($_POST['id']) && isset($_POST['url']))
					$error = VideosDAO::deleteVideo($_POST['url'], $_POST['id']);
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}
			
			if($_POST['action'] == "pdf_delete"){
				if(isset($_POST['id']) && isset($_POST['url']))
					$error = PdfsDAO::deletePdf($_POST['url'], $_POST['id']);
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "menu_delete"){
				if(isset($_POST['id'])){
					$error = MenusDAO::deleteMenu($_POST['id']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_menu_visibility"){
				if(isset($_POST['id']) && isset($_POST['visible'])){
					$error = MenusDAO::updateMenuVisibility($_POST['id'], $_POST['visible']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_menu_rank"){
				if(isset($_POST['id']) && isset($_POST['rank'])){
					$error = MenusDAO::updateMenuRank($_POST['id'], $_POST['rank']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "babillard_delete"){
				if(isset($_POST['id'])){
					$error = BabillardDAO::deleteBabillard($_POST['id']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_babillard_visibility"){
				if(isset($_POST['id']) && isset($_POST['visible'])){
					$error = BabillardDAO::updateBabillardVisibility($_POST['id'], $_POST['visible']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_babillard_rank"){
				if(isset($_POST['id']) && isset($_POST['rank'])){
					$error = BabillardDAO::updateBabillardRank($_POST['id'], $_POST['rank']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "competitor_delete"){
				if(isset($_POST['id'])){
					$error = CompetitorsDAO::deleteCompetitor($_POST['id']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_competitor_visibility"){
				if(isset($_POST['id']) && isset($_POST['visible'])){
					$error = CompetitorsDAO::updateCompetitorVisibility($_POST['id'], $_POST['visible']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_competitor_rank"){
				if(isset($_POST['id']) && isset($_POST['rank'])){
					$error = CompetitorsDAO::updateCompetitorRank($_POST['id'], $_POST['rank']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "sponsor_delete"){
				if(isset($_POST['id'])){
					$error = SponsorsDAO::deleteSponsor($_POST['id']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_sponsor_visibility"){
				if(isset($_POST['id']) && isset($_POST['visible'])){
					$error = SponsorsDAO::updateSponsorVisibility($_POST['id'], $_POST['visible']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_sponsor_rank"){
				if(isset($_POST['id']) && isset($_POST['rank'])){
					$error = SponsorsDAO::updateSponsorRank($_POST['id'], $_POST['rank']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "member_delete"){
				if(isset($_POST['id'])){
					$error = MembersDAO::deleteMember($_POST['id']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "gallery_delete"){
				if(isset($_POST['id'])){
					$error = GalleryDAO::deleteGallery($_POST['id']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_gallery_visibility"){
				if(isset($_POST['id']) && isset($_POST['visible'])){
					$error = GalleryDAO::updateGalleryVisibility($_POST['id'], $_POST['visible']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_gallery_rank"){
				if(isset($_POST['id']) && isset($_POST['rank'])){
					$error = GalleryDAO::updateGalleryRank($_POST['id'], $_POST['rank']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_other"){
				if(isset($_POST['label']) && isset($_POST['value_fr']) && isset($_POST['value_en'])){
					$error = OtherDAO::update($_POST['label'], $_POST['value_fr'], $_POST['value_en']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			if($_POST['action'] == "update_misc"){
				if(isset($_POST['label']) && isset($_POST['arg1']) && isset($_POST['arg2']) && isset($_POST['arg3']) && isset($_POST['arg4']) && isset($_POST['arg5'])){
					$error = MiscDAO::update($_POST['label'], $_POST['arg1'], $_POST['arg2'], $_POST['arg3'], $_POST['arg4'], $_POST['arg5']);
				}
				
				if(!is_null($error)){
					echo $error;
				} else {
					echo "ok";
				}
			}

			
			echo null;
		}
		
	}
	
?>