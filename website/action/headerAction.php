<?php

	require_once("action/CommonAction.php");
	require_once("action/DAO/MenusDAO.php");
	require_once("action/DAO/OtherDAO.php");
	require_once("action/DAO/MiscDAO.php");
	require_once("action/DAO/SponsorsDAO.php");

	class headerAction extends CommonAction{

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		function executeAction(){
			$this->event_menus_visible_count = 0;
			$this->ticket_menus_visible_count = 0;
			$this->sponsor_visible_count = 0;

			$this->heatlist=MiscDAO::get("heatlist_link");
			$this->result=MiscDAO::get("result_link");

			if($this->heatlist['arg2'] == '1') {
				$this->event_menus_visible_count++;
			}
			if($this->result['arg2'] == '1') {
				$this->event_menus_visible_count++;
			}

			$this->event_menus = MenusDAO::getAllMenus('event');
			$this->ticket_menus = MenusDAO::getAllMenus('ticket');

			$this->menuLogoMobile = OtherDAO::getLogo("menu_bar_logo_mobile");
			$this->menuLogoLarge = OtherDAO::getLogo("menu_bar_logo_large");
			$this->preloaderLogo = OtherDAO::getLogo("preloader_logo");
			$this->faviconIco = OtherDAO::getLogo("favicon_icon");
			$this->sponsors = SponsorsDAO::getAllSponsors();

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
