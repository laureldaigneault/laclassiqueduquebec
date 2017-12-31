<?php

	$languages = array('fr','en');

	// handle language selection
	if(!empty($_GET['lang']) && in_array($_GET['lang'], $languages)) {
			$_SESSION['lang'] = $_GET['lang'];
	} else if(!isset($_SESSION['lang'])) {
		$_SESSION['lang'] = 'fr';
	}

	define('LANG', $_SESSION['lang']);


	require('action/headerAction.php');

	$action_header = new headerAction;
	$action_header->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<!-- FAVICON -->
	<link rel="shortcut icon" href="<?= $action_header->faviconIco['url_image_'.LANG] ?>" type="img/favicon.ico">
	<link rel="icon" href="<?= $action_header->faviconIco['url_image_'.LANG] ?>">

	<!-- TITLE -->
	<title><?= $action_header->main_title[langIndex(LANG)] ?></title>

	<!-- DESCRIPTION -->
	<meta name="description" content="La Classique du Quebec" />
	<meta name="keywords"  content="Dance, Championship, Classique, Quebec, Professional, Amateur, Ballroom, Meryem, Pearson, Daniel, Héroux, Toronto Grand Prix, Dancing, Shoes" />
	<meta name="author" content="Ré-Communications" />

	<!-- GOOGLE FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,200,100,800,900' rel='stylesheet' type='text/css'>

	<!-- STYLESHEETS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<script src="https://unpkg.com/scrollreveal@3.3.2/dist/scrollreveal.min.js"></script>

	<!-- flipclock -->
	<link rel="stylesheet" href="css/countdown.css">

	<!-- animate.css -->
	<!-- <link rel="stylesheet" href="css/animate.css"> -->
	<!-- <link href="css/animate.css" rel="stylesheet" type="text/css" /> -->

	<!-- custom styles -->
	<link rel="stylesheet" type="text/css" href="css/style.css" />

	<!-- template and navbar vendor styles -->
	<!-- <link rel="stylesheet" type="text/css" href="css/main.css" /> -->

	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

</head>
<body>

	<!-- PRELOADER -->
	<div class="preloader">
		<!-- <div class="status"></div> -->
		<img class="preload-css-anim" src="<?= $action_header->preloaderLogo['url_image_'.LANG] ?>"/>
	</div>
	<!-- /PRELOADER -->


	<div id="contactModalFinal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h3 id="myModalLabel" style="font-weight: bold; font-size: 22px"><?= $action_header->contact_modal_title[langIndex(LANG)] ?></h3>
	      </div>
	      <div class="modal-body" style='font-family: arial'>
	      	<a href="mailto:meryem.pearson@gmail.com" style="font-weight: bold; color: #296EB3;">Courriel: info@laclassiqueduquebec.com</a>
	      	<p>Téléphone: 1-514-923-1181</p>
	      	<p>Télécopieur: 1-450-906-1119</p>
	      </div>
	      <div class="modal-footer" style="text-align: center;">
	      </div>
	    </div>
	  </div>
	</div>


	<!-- NAVBAR -->
	<nav class="navbar navbar-default navbar-fixed-top" <?php if(isset($isGalleryHeader) && $isGalleryHeader) echo "style='background-color: black !important'"?> >
	    <div class="container">
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>
	        <a href="index.php" class="navbar-brand"><img class="hidden-xs hidden-sm" src="<?= $action_header->menuLogoLarge['url_image_'.LANG] ?>" alt="Classique-brand">
	        <a href="index.php" class="navbar-brand"><img class="visible-xs visible-sm" src="<?= $action_header->menuLogoMobile['url_image_'.LANG] ?>" alt="Classique-brand">
	        </a>
	      </div>
	      <div id="navbar3" class="navbar-collapse collapse">
	        <ul class="nav navbar-nav navbar-right">

							<?php
								if($action_header->event_menus_visible_count > 0) { ?>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $action_header->event_menu[langIndex(LANG)] ?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<?php
											foreach ($action_header->event_menus as $menu) {
												if($menu['visible'] == 1) {?>
												<li><a href="
													<?php
														if($menu['type'] == 'url'){
															echo $menu['value_'.LANG];
														}
														if($menu['type'] == 'pdf'){
															echo $menu['url_pdf_'.LANG];
														}
														if($menu['type'] == 'img'){
															echo $menu['url_image_'.LANG];
														}
													?>
												" target="_blank"><?= $menu['name_'.LANG] ?></a></li>
											<?php
												}
											}
											?>

											<?php
											if($action_header->heatlist['arg2'] == '1') {?>
											<li><a href="<?= $action_header->heatlist['arg1']?>" target="_blank"><?php
												if(LANG == "fr") {
													echo "Entrées";
												}
												if(LANG == "en") {
													echo "Heatlists";
												}
											?>
											</a></li>
											<?php
												}
											?>
											<?php
											if($action_header->result['arg2'] == '1') {?>
											<li><a href="<?= $action_header->result['arg1']?>" target="_blank"><?php
												if(LANG == "fr") {
													echo "Résultats";
												}
												if(LANG == "en") {
													echo "Results";
												}
											?>
											</a></li>
										<?php
											}
										?>
									</ul>
								</li>
							<?php } ?>

							<?php
								if($action_header->ticket_menus_visible_count > 0) { ?>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $action_header->ticket_menu[langIndex(LANG)] ?> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">

									<?php
											foreach ($action_header->ticket_menus as $menu) {
												if($menu['visible'] == 1) {?>

												<li><a href="
													<?php
														if($menu['type'] == 'url'){
															echo $menu['value_'.LANG];
														}
														if($menu['type'] == 'pdf'){
															echo $menu['url_pdf_'.LANG];
														}
														if($menu['type'] == 'img'){
															echo $menu['url_image_'.LANG];
														}
													?>
												" target="_blank"><?= $menu['name_'.LANG] ?></a></li>
											<?php
												}
											}
											?>
								</ul>
							</li>
								<?php } ?>

	          <li><a class="static-menu-item" href="competitors.php"><?= $action_header->competitor_menu[langIndex(LANG)] ?></a></li>
	          <li><a class="static-menu-item" href="#contactModalFinal" data-toggle="modal"><?= $action_header->contact_menu[langIndex(LANG)] ?></a></li>

	          <?php
	          	if(LANG == 'en'){
	          		echo "<li><a class='static-menu-item' href='".$_SERVER['PHP_SELF'] . "?lang=fr'>Français</a></li>";
	          	} else {
	          		echo "<li><a class='static-menu-item' href='".$_SERVER['PHP_SELF'] . "?lang=en'>English</a></li>";
	          	}
	          ?>
	        </ul>
	      </div>
	      <!--/.nav-collapse -->
	    </div>
	    <!--/.container-fluid -->
	 </nav>
	<!-- /NAVBAR -->



	<script>

	</script>
