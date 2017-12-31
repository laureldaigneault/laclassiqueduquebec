<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/MenusDAO.php");
	require_once("action/DAO/OtherDAO.php");
	require_once("action/DAO/SponsorsDAO.php");

	class headerAction extends CommonAction{

		// public $data=[
		// 				["La Classique du Québec","La Classique du Quebec"],  //page title

		// 				[
		// 					["Contactez-nous",
		// 						["Nom","Votre nom","Doit contenir uniquement des lettres et au moins 3 caractères de long."],
		// 						["Message","Votre message"],
		// 						["Courriel","votre@courriel.ici","Doit être un courriel valide (user@gmail.com)"],
		// 						["Téléphone","999-999-9999","Doit être un téléphone valide (999-999-9999)"],
		// 						["Envoyez le message!","Ce message n'est pas valide."]],
		// 					["Contact-us",
		// 						["Name","Your name","Needs to be only letters and minimum 3 characters long."],
		// 						["Message","Your message"],
		// 						["Email","your@email.here","Needs to be a valid email address."],
		// 						["Phone","999-999-9999","Needs tobe a valid Phone number (999-999-9999)"],
		// 						["Send the message!","This message is not valid."]]
		// 				], //contact form

		// 				[
		// 					[
		// 						"Événements",
		// 						[
		// 							["Hôtel"],
		// 							["Emplacement","https://www.google.ca/maps/place/Hotel+Bonaventure+Montr%C3%A9al/@45.4993335,-73.5671406,17z/data=!3m1!4b1!4m5!3m4!1s0x4cc91a5cea5f36fb:0x5c249de257b318c0!8m2!3d45.4993335!4d-73.5649466"],
		// 							["Prix","pdf/event/hotel/0002017ClaHotelFRANCAISSept15.pdf"],
		// 							["Hôtel","http://hotelbonaventure.com/fr/"],
		// 							["Plan de la salle"],
		// 							["Horaire Officiel","live_update/laclass2017_schedule.pdf"],
		// 							["Publicité","pdf/event/0002017ClaPubsScreenBilingue.pdf"],
		// 							["Règlements","pdf/event/0002017ClaRulesFRANCAISSept15.pdf"],
		// 							["Liste des figures latines","pdf/event/0002017ClaStepListCDFLatinStepList.pdf"],
		// 							["Liste des figures Ballroom","pdf/event/0002017ClaStepListBallroomCDFStandardStepList.pdf"],
		// 							["DanceSport Series","http://www.dancesportseries.com"],
		// 							["Prix $$$","pdf/event/0002017ClaPRIX-BOURSES$$$.pdf"],
		// 							["Heat List","live_update/laclass2017_HeatLists.htm"],
		// 							["Juges & officiels","#"],
		// 							["Partenaires","pdf/event/0002017ClaPartenaires.pdf"],
		// 							["Commanditaires","pdf/event/0002017ClaSponsorsListDec11Corrected.pdf"],
		// 							["Kiosques","pdf/event/0002017ClaVendorsList6dec.pdf"],
		// 							["Les Champions","pdf/event/0002017ClaChampionsAnglaisFrancais.pdf"],
		// 							["Résultats","live_update/laclass2017_ScoresheetsByPerson.htm"],

		// 							["Réservation","https://bookings.ihotelier.com/Hotel-Bonaventure-Montreal/bookings.jsp?groupID=1715754&hotelID=97993"],
		// 							["Programme","live_update/program_2017.pdf"]
		// 						]
		// 					],
		// 					[
		// 						"Events",
		// 						[
		// 							["Hotel"],
		// 							["Map","https://www.google.ca/maps/place/Hotel+Bonaventure+Montr%C3%A9al/@45.4993335,-73.5671406,17z/data=!3m1!4b1!4m5!3m4!1s0x4cc91a5cea5f36fb:0x5c249de257b318c0!8m2!3d45.4993335!4d-73.5649466"],
		// 							["Hotel Rates","pdf/event/hotel/0002017ClaHotelEnglishSept15.pdf"],
		// 							["Place","http://hotelbonaventure.com/en/"],
		// 							["Ballroom"],
		// 							["Official Schedule","live_update/laclass2017_schedule.pdf"],
		// 							["Advertising","pdf/event/0002017ClaPubsScreenBilingue.pdf"],
		// 							["Rules","pdf/event/0002017ClaRulesEnglishSept15.pdf"],
		// 							["Latin Step list","pdf/event/0002017ClaStepListCDFLatinStepList.pdf"],
		// 							["Ballroom Step list","pdf/event/0002017ClaStepListBallroomCDFStandardStepList.pdf"],
		// 							["DanceSport Series","http://www.dancesportseries.com"],
		// 							["Price $$$","pdf/event/0002017ClaPRIX-BOURSES$$$.pdf"],
		// 							["Heat List","live_update/laclass2017_HeatLists.htm"],
		// 							["Judges & officials","#"],
		// 							["Partner","pdf/event/0002017ClaPartenaires.pdf"],
		// 							["Sponsor","pdf/event/0002017ClaSponsorsListDec11Corrected.pdf"],
		// 							["Vendors","pdf/event/0002017ClaVendorsList6dec.pdf"],
		// 							["The Champions","pdf/event/0002017ClaChampionsAnglaisFrancaisSept15.pdf"],
		// 							["Results","live_update/laclass2017_ScoresheetsByPerson.htm"],

		// 							["Book Now","https://bookings.ihotelier.com/Hotel-Bonaventure-Montreal/bookings.jsp?groupID=1715754&hotelID=97993"],
		// 							["Program","live_update/program_2017.pdf"]
		// 						]
		// 					]

		// 				],

		// 				[
		// 					[
		// 						"Billets",
		// 						[
		// 							["Billets","pdf/ticket/0002017ClaTicketsFRANCAISSEPT15pdf.pdf"],
		// 							["Packages","pdf/ticket/0002017ClaPackagesFRANCAISNOpricesSEPT15.pdf"],
		// 							["Horaire","pdf/ticket/0002017ClaScheduleFRANCAISOCT31.pdf"],
		// 							["Bordereau de commande","pdf/ticket/0002017ClaAccountingSheet10FRANCAISSEPT15.pdf"]
		// 						]
		// 					],
		// 					[
		// 						"Tickets",
		// 						[
		// 							["Tickets","pdf/ticket/0002017ClaTicketsEnglishSept15.pdf"],
		// 							["Packages","pdf/ticket/0002017ClaPackagesEnglisgRevisedNOpricesSEPT15.pdf"],
		// 							["Schedule","pdf/ticket/0002017ClaScheduleEnglishOCT31.pdf"],
		// 							["Accounting Sheet","pdf/ticket/0002017ClaAccountingSheet10EnglishSEPT15.pdf"]
		// 						]
		// 					]
		// 				],

		// 				["Compétiteurs","Competitors"],

		// 				["Contact","Contact"]
		// ];
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		function executeAction(){
	        // return $this->data;
			$this->event_menus = MenusDAO::getAllMenus('event');
			$this->ticket_menus = MenusDAO::getAllMenus('ticket');

			$this->menuLogoMobile = OtherDAO::getLogo("menu_bar_logo_mobile");
			$this->menuLogoLarge = OtherDAO::getLogo("menu_bar_logo_large");
			$this->preloaderLogo = OtherDAO::getLogo("preloader_logo");
			$this->faviconIco = OtherDAO::getLogo("favicon_icon");
			$this->sponsors = SponsorsDAO::getAllSponsors();

			$this->event_menus_visible_count = 0;
			$this->ticket_menus_visible_count = 0;
			$this->sponsor_visible_count = 0;

			foreach ($this->event_menus as $menu) { 
				if($menu['visible'] == 1){
					$this->event_menus_visible_count++;
				}
			}
			foreach ($this->ticket_menus as $menu) { 
				if($menu['visible'] == 1){
					$this->ticket_menus_visible_count++;
				}
			}
			foreach ($this->sponsors as $sponsor) { 
				if($sponsor['visible'] == 1){
					$this->sponsor_visible_count++;
				}
			}

			$this->contact_modal_title = ["Contactez-nous", "Contact-us"];
			$this->main_title = ["La Classique du Québec","La Classique du Quebec"];
			$this->contact_menu = ["Contact","Contact"];
			$this->competitor_menu = ["Compétiteurs","Competitors"];
			$this->event_menu = ["Événements", "Events"];
			$this->ticket_menu = ["Billets", "Tickets"];
	    }
	}
?>