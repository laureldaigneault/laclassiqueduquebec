<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/PdfsDAO.php");
	require_once("action/DAO/CompetitorsDAO.php");

	class ConsoleCompetitorsAction extends CommonAction {
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMIN);
		}

		protected function executeAction() {
			$this->pdfs_en = PdfsDAO::getPdfsWithParam('en');
			$this->pdfs_fr = PdfsDAO::getPdfsWithParam('fr');
			$this->pdfs_bi = PdfsDAO::getPdfsWithParam('bi');

			$this->newCompetitorError = null;
			$this->newCompetitorSuccess = null;

			// create new document
			if(isset($_POST["create_competitor"])){
				// verify if all data was submitted
				if(!isset($_POST["docSection"])) {
					$this->newCompetitorError = "Please specify the section for the document.";
				}

				// verify if all data was submitted
				if(!isset($_POST["menuNameEnglish"]) || !isset($_POST["menuNameFrench"])) {
					$this->newCompetitorError = "Please enter a french and english name for the document.";
				}
				
				if(isset($_POST["menuNameEnglish"])){
					if(!isset($_POST["pdf_fr"]) || !isset($_POST["pdf_en"])){
						$this->newCompetitorError = "Please specify the pdf of the document.";
					}

					if(is_null($this->newCompetitorError)){
						// all data required was submitted
						$creation_error = CompetitorsDAO::createCompetitor($_POST["menuNameFrench"], $_POST["menuNameEnglish"], $_POST["pdf_fr"], $_POST["pdf_en"], $_POST["docSection"]);
						
						
						if(is_null($creation_error)){
							$this->newCompetitorSuccess = "The document was created successfully";
						} else {
							$this->newCompetitorError = "Sorry, there was an error creating the document.";
						}


					}
				}
			}

			// get data
			$this->competitor_docs = CompetitorsDAO::getAllCompetitors('comp');
			$this->other_docs = CompetitorsDAO::getAllCompetitors('other');
        }
	}
	
?>