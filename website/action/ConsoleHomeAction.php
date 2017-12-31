<?php

	require_once("action/CommonAction.php");

	class ConsoleHomeAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MANAGER); //super(visibility?)
		}

		protected function executeAction() {
			
        }
	}
	
?>