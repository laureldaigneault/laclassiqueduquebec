<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/MembersDAO.php");

	class ConsoleMembersAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMIN);
		}

		protected function executeAction() {
			$this->members = MembersDAO::getAllMembers();
        }
	}
	
?>