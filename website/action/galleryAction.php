<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/GalleryDAO.php");

	class galleryAction extends CommonAction {
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC); //super(visibility?)
		}

		protected function executeAction() {
			$this->gallery_photos = GalleryDAO::getAllGallery();
		}
	}
?>