<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/OtherDAO.php");
	require_once("action/DAO/MiscDAO.php");
	require_once("action/DAO/ImagesDAO.php");
	require_once("action/DAO/VideosDAO.php");
	require_once("action/DAO/SponsorsDAO.php");

	class ConsoleManagerModifsAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MANAGER);
		}

		protected function executeAction() {
			$this->modifsError = null;
			$this->modifsSuccess = null;

			$this->heatlist=MiscDAO::get("heatlist_link");
			$this->result=MiscDAO::get("result_link");
		}
	}

?>
