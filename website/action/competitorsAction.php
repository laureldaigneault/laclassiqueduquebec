<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/CompetitorsDAO.php");
	require_once("action/DAO/MiscDAO.php");

	class competitorsAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC); //super(visibility?)
		}

		protected function executeAction() {
			$this->comp_visible_count=0;
			$this->other_visible_count=0;

			$this->heatlist=MiscDAO::get("heatlist_link");
			$this->result=MiscDAO::get("result_link");

			if($this->heatlist['arg2'] == '1') {
				$this->other_visible_count++;
			}
			if($this->result['arg2'] == '1') {
				$this->other_visible_count++;
			}

			$this->compSection = ["Compétiteurs","Competitors"];
			$this->otherSection = ["Autres documents","Other documents"];

			$this->comp_documents = CompetitorsDAO::getAllCompetitors('comp');
			$this->other_documents = CompetitorsDAO::getAllCompetitors('other');

			foreach ($this->comp_documents as $doc) {
				if($doc['visible'] == 1){
					$this->comp_visible_count++;
				}
			}
			foreach ($this->other_documents as $doc) {
				if($doc['visible'] == 1){
					$this->other_visible_count++;
				}
			}

			// $this->docs=[
			// 			[
			// 				["PRO-AM Danse Single Inscription","pdf/competitor/0002017ClaPro-AmSingle1FRANCAISSept15.pdf"],
			// 				["PRO-AM MULTI-DANSE & SOLO Inscription","pdf/competitor/0002017ClaProAmMultiDance2FRANCAISept15.pdf"],
			// 				["PROFESSIONNEL  Inscription","pdf/competitor/0002017ClaPro-Entry3FRANCAISSept15.pdf"],
			// 				["AMATEUR STYLE INTERNATIONAL  Championnat ouvert","pdf/competitor/0002017ClaAmateurOpenChamp4FRANCAISSept15.pdf"],
			// 				["AMATEUR STYLE INTERNATIONAL  Débutant à Pré-Champ","pdf/competitor/0002017ClaAmateurFRANCAISDeb-Pre-Champ5OCT31.pdf"],
			// 				["AMATEUR SOCIAL & AMÉRICAN  Inscription","pdf/competitor/0002017ClaAmateurSocial6FRANCAISept15.pdf"],
			// 				["AM-AM MIXED AMATEUR Danse Single Inscription","pdf/competitor/0002017ClaAmAm7MixedAmateurFRANCAISSept15.pdf"],
			// 				["STAR-SOLO Danse Single Inscription","pdf/competitor/0002017ClaStarSoloFRANCAISSept15.pdf"],
			// 				["FORMATION TEAM Inscription","pdf/competitor/0002017ClaFORMATIONTeamFRANCAISSept15.pdf"],
			// 				["BORDEREAU DE COMMANDE","pdf/competitor/0002017ClaAccountingSheet10FRANCAISSEPT15.pdf"]
			// 			],
			// 			[
			// 				["PRO-AM Dance Single Entry form","pdf/competitor/0002017ClaPro-AmSingle1EnglishSept15.pdf"],
			// 				["PRO-AM MULTI-DANCE & SOLO  Entry form","pdf/competitor/0002017ClaProAmMultiDance2EnglishSept15.pdf"],
			// 				["PROFESSIONAL  Entry form","pdf/competitor/0002017ClaPro-Entry3EnglishSept15.pdf"],
			// 				["AMATEUR STYLE INTERNATIONAL  Open Champ","pdf/competitor/0002017ClaAmateurOpenChamp4Sept15.pdf"],
			// 				["AMATEUR STYLE INTERNATIONAL  Deb-Pre-Champ","pdf/competitor/0002017ClaAmateurEnglishDeb-Pre-Champ5OCT31.pdf"],
			// 				["AMATEUR SOCIAL & AMERICAN  Entry form","pdf/competitor/0002017ClaAmateurSocial6EnglishSept15.pdf"],
			// 				["AM-AM MIXED AMATEUR Dance Single Entry form","pdf/competitor/0002017ClaAmAm7MixedAmateurEnglishOCT31.pdf"],
			// 				["STAR-SOLO Dance Single Entry form","pdf/competitor/0002017ClaStarSoloEnglishSept15.pdf"],
			// 				["FORMATION TEAM Entry form","pdf/competitor/0002017ClaFORMATIONTeamEnglishSEPT15.pdf"],
			// 				["ACCOUNTING SHEET","pdf/competitor/0002017ClaAccountingSheet10EnglishSEPT15.pdf"]
			// 			]

			// ];

			// $this->other=[
			// 			[
			// 				// ["Règlements","pdf/competitor/0002017ClaRulesFRANCAISSept15.pdf"],
			// 				// ["Horaire Officiel","live_update/laclass2017_schedule.pdf"],
			// 				["Liste des figures Latines","pdf/competitor/0002017ClaStepListCDFLatinStepList.pdf"],
			// 				["Liste des figures Ballroom","pdf/competitor/0002017ClaStepListBallroomCDFStandardStepList.pdf"]
			// 			],
			// 			[
			// 				// ["Rules","pdf/competitor/0002017ClaRulesEnglishSept15.pdf"],
			// 				// ["Official Schedule","live_update/laclass2017_schedule.pdf"],
			// 				["Latin Step list","pdf/competitor/0002017ClaStepListCDFLatinStepListEnglish.pdf"],
			// 				["Ballroom Step list","pdf/competitor/0002017ClaStepListBallroomCDFStandardStepList.pdf"]
			// 			]

			// ];
		}
	}
?>
