<?php 
	require('utils/lang.php');
	require('action/ConsoleOtherAction.php');

	$action = new ConsoleOtherAction();
	$action->execute();

    include("partials/console-header.php");
?>


<div class="col-md-8 col-md-offset-2">

	<!-- cnn -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier la barre de nouvelles</h1>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Contenu de la barre: </p>
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="contenu francais" style="width: 100%" name="cnnBarFr" id="cnnBarFr" value="<?= $action->cnnBar['value_fr']?>">
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="contenu anglais" style="width: 100%" name="cnnBarEn" id="cnnBarEn" value="<?= $action->cnnBar['value_en']?>">
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateCnn()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- changer rebourd -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier la date du compte a rebours</h1>
		<p>Vous devez entrer la date dans un format particuler <b>sans faute</b>. le format est: <b><i>MOIS JJ, AAAA HH:MM:SS</i></b>
		</br>Le MOIS correspond au mois, le JJ correspond au jour, le AAAA correspond a l'année, le HH correspond a l'heure (format 24h), le MM correspond aux minutes et le SS correspond aux secondes.
		Si vous souhaiter mettre le rebours a zéro, mettez simplement une date dans le passé.</p>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">La date du rebours: </p>
			</div>
			<div class="col-md-4">
				<input type="text" placeholder="Date" style="width: 100%" name="dateRebours" id="dateRebours" value="<?= $action->countdownDate['arg1']?>">
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateCountdown()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- main logos -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier les logos principaux</h1>

		<!-- logo mobile -->
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Logo mobile: </p>
			</div>
			<div class="col-md-2">
				<select name="logo_mobile_fr" id="logo_mobile_fr" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en français -- </option>
					<?php
						foreach ($action->logos_fr as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->logoMobile['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->logoMobile['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<select name="logo_mobile_en" id="logo_mobile_en" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en anglais -- </option>
					<?php
						foreach ($action->logos_en as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->logoMobile['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->logoMobile['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateLogoMobile()">Sauvegarder</button>
			</div>
		</div>

		<!-- logo gros -->
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Logo Large: </p>
			</div>
			<div class="col-md-2">
				<select name="logo_big_fr" id="logo_big_fr" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en français -- </option>
					<?php
						foreach ($action->logos_fr as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->logoLarge['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->logoLarge['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<select name="logo_big_en" id="logo_big_en" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en anglais -- </option>
					<?php
						foreach ($action->logos_en as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->logoLarge['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->logoLarge['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateLogoLarge()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- menu logos -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier les logos de la compagnie dans la barre de menu</h1>

		<!-- logo mobile -->
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Logo mobile: </p>
			</div>
			<div class="col-md-2">
				<select name="menu_logo_mobile_fr" id="menu_logo_mobile_fr" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en français -- </option>
					<?php
						foreach ($action->logos_fr as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->menuLogoMobile['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->menuLogoMobile['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<select name="menu_logo_mobile_en" id="menu_logo_mobile_en" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en anglais -- </option>
					<?php
						foreach ($action->logos_en as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->menuLogoMobile['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->menuLogoMobile['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateMenuLogoMobile()">Sauvegarder</button>
			</div>
		</div>

		<!-- logo gros -->
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Logo Large: </p>
			</div>
			<div class="col-md-2">
				<select name="menu_logo_big_fr" id="menu_logo_big_fr" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en français -- </option>
					<?php
						foreach ($action->logos_fr as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->menuLogoLarge['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->menuLogoLarge['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<select name="menu_logo_big_en" id="menu_logo_big_en" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en anglais -- </option>
					<?php
						foreach ($action->logos_en as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->menuLogoLarge['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->menuLogoLarge['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateMenuLogoLarge()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- preloader logo -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier le logo lors du chargement du site</h1>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Logo de chargement: </p>
			</div>
			<div class="col-md-2">
				<select name="preloader_logo_fr" id="preloader_logo_fr" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en français -- </option>
					<?php
						foreach ($action->logos_fr as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->preloaderLogo['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->preloaderLogo['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<select name="preloader_logo_en" id="preloader_logo_en" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en anglais -- </option>
					<?php
						foreach ($action->logos_en as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->preloaderLogo['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->preloaderLogo['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updatePreloaderLogo()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- Favicon image -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier l'image 'favicon' (format .ico)</h1>
		<p>Pour que le favicon fonctionne, il est recommandé que le format de l'image soit <b>.ico</b>. Ces images sont des icones.</p>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Icone 'favicon': </p>
			</div>
			<div class="col-md-4">
				<select name="favicon_fr" id="favicon_fr" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- icone -- </option>
					<?php
						foreach ($action->images_fr as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->faviconIco['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->images_en as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->faviconIco['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->images_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->faviconIco['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateFavicon()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- hotel logo and link -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier le logo de l'hotel et le lien sur la page d'accueil</h1>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Logo de l'hôtel: </p>
			</div>
			<div class="col-md-2">
				<select name="hotel_logo_fr" id="hotel_logo_fr" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en français -- </option>
					<?php
						foreach ($action->logos_fr as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->hotelLogo['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->hotelLogo['value_fr']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<select name="hotel_logo_en" id="hotel_logo_en" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- logo en anglais -- </option>
					<?php
						foreach ($action->logos_en as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->hotelLogo['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->logos_bi as $logo) { ?>
							<option value="<?= $logo['image_id']?>" <?php if($logo['image_id'] == $action->hotelLogo['value_en']) echo "selected" ?>><?= $logo['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateHotelLogo()">Sauvegarder</button>
			</div>
		</div>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Le lien (doit absoluement commencer par <b>http://</b> ou <b>https://</b>): </p>
			</div>

			<div class="col-md-2">
				<input type="text" placeholder="Lien francais" style="width: 100%" name="hotelLinkFr" id="hotelLinkFr" value="<?= $action->hotelLink['value_fr']?>">
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="Lien anglais" style="width: 100%" name="hotelLinkEn" id="hotelLinkEn" value="<?= $action->hotelLink['value_en']?>">
			</div>

			<div class="col-md-2">
				<button type="button" class="" onclick="updateHotelUrl()">Sauvegarder</button>
			</div>
		</div>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Fond d'écran de l'hôtel: </p>
			</div>
			<div class="col-md-4">
				<select name="hotel_background_img" id="hotel_background_img" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- image -- </option>
					<?php
						foreach ($action->images_fr as $img) { ?>
							<option value="<?= $img['image_id']?>" <?php if($img['image_id'] == $action->hotelBackground['value_fr']) echo "selected" ?>><?= $img['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->images_en as $img) { ?>
							<option value="<?= $img['image_id']?>" <?php if($img['image_id'] == $action->hotelBackground['value_fr']) echo "selected" ?>><?= $img['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->images_bi as $img) { ?>
							<option value="<?= $img['image_id']?>" <?php if($img['image_id'] == $action->hotelBackground['value_fr']) echo "selected" ?>><?= $img['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateHotelBackground()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- backgrounds -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier le fond d'écran du haut de la page d'accueil</h1>

		<!-- image for mobile -->
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Fond d'écran mobile: </p>
			</div>
			<div class="col-md-4">
				<select name="background_mobile" id="background_mobile" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- image -- </option>
					<?php
						foreach ($action->images_fr as $img) { ?>
							<option value="<?= $img['image_id']?>" <?php if($img['image_id'] == $action->backgroundImageMobile['value_fr']) echo "selected" ?>><?= $img['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->images_en as $img) { ?>
							<option value="<?= $img['image_id']?>" <?php if($img['image_id'] == $action->backgroundImageMobile['value_fr']) echo "selected" ?>><?= $img['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->images_bi as $img) { ?>
							<option value="<?= $img['image_id']?>" <?php if($img['image_id'] == $action->backgroundImageMobile['value_fr']) echo "selected" ?>><?= $img['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateBackgroundImage()">Sauvegarder</button>
			</div>
		</div>

		<!-- video -->
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Vidéo en fond d'écran pour ordinateurs: </p>
			</div>
			<div class="col-md-4">
				<select name="background_video" id="background_video" style="width: 100%; padding: 4px 0">
					<option disabled selected value> -- vidéo -- </option>
					<?php
						foreach ($action->videos_fr as $vid) { ?>
							<option value="<?= $vid['video_id']?>" <?php if($vid['video_id'] == $action->backgroundVideo['value_fr']) echo "selected" ?>><?= $vid['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->videos_en as $vid) { ?>
							<option value="<?= $vid['video_id']?>" <?php if($vid['video_id'] == $action->backgroundVideo['value_fr']) echo "selected" ?>><?= $vid['name'] ?></option>
					<?php
						}
					?>
					<option style="font-style: italic" disabled>-------------------------</option>
					<?php
						foreach ($action->videos_bi as $vid) { ?>
							<option value="<?= $vid['video_id']?>" <?php if($vid['video_id'] == $action->backgroundVideo['value_fr']) echo "selected" ?>><?= $vid['name'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateBackgroundVideo()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- youtube video -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier le video youtube sur la page d'accueil</h1>
		<p>Pour trouver quel est la valeur à entrer, allez sur Youtube et clickez sur le vidéo que vous désirez.
		Ensuite, lorsque vous êtes sur la page avec le vidéo qui joue, regarder le url. Il devrait commencer par ceci: <b>https://www.youtube.com/watch?v=</b>
		La valeur a entrer ici est la série de chiffres et de lettres suivant le symbole '<b>=</b>' dans le url.</p>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">La série de chiffre pour le vidéo: </p>
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="Video francais" style="width: 100%" name="youtubeVidFr" id="youtubeVidFr" value="<?= $action->classiqueFooterVideo['value_fr']?>">
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="Video anglais" style="width: 100%" name="youtubeVidEn" id="youtubeVidEn" value="<?= $action->classiqueFooterVideo['value_en']?>">
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateYoutubeVideo()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- google map lat/long -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier l'endroit sur la 'map' de google</h1>
		<p>Pour changer l'emplacement, vous avez besoin de la <b>latitude</b> et de la <b>longitude</b> de l'emplacement. Plusieurs sites sur le web permettent de trouver ces informations (ex: <a target="_blank" href="http://www.latlong.net/convert-address-to-lat-long.html">http://www.latlong.net/convert-address-to-lat-long.html</a>). Donc, dans le premier champ, entrez la latitude, et dans le deuxième champ, la longitude.<p>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">La latitude et longitude: </p>
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="Latitude" style="width: 100%" name="mapLatitude" id="mapLatitude" value="<?= $action->mapCoords['arg1']?>">
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="Longitude" style="width: 100%" name="mapLongitude" id="mapLongitude" value="<?= $action->mapCoords['arg2']?>">
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateMap()">Sauvegarder</button>
			</div>
		</div>
	</div>


	<!-- sponsors -->
	<div class="row console-container">

		<?php 
				if ($action->newSponsorError != null) {
					?>
					<div class="error-div"><strong><?=$action->newSponsorError?></strong></div>
					<?php
				}
				if ($action->newSponsorSuccess != null) {
					?>
					<div class="success-div"><strong><?=$action->newSponsorSuccess?></strong></div>
					<?php
				}
			?>

		<h1 class="console-container-title">Ajouter un nouveau partenaire</h1>

		<form action="console_other.php" method="post" enctype="multipart/form-data">

			<!-- logo -->
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Logo: </p>
				</div>
				<div class="col-md-4">
					<select name="sponsor_logo" id="sponsor_logo" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- logo en français -- </option>
						<?php
							foreach ($action->logos_fr as $logo) { ?>
								<option value="<?= $logo['image_id']?>"><?= $logo['name'] ?></option>
						<?php
							}
						?>
						<option style="font-style: italic" disabled>-------------------------</option>
						<?php
							foreach ($action->logos_en as $logo) { ?>
								<option value="<?= $logo['image_id']?>"><?= $logo['name'] ?></option>
						<?php
							}
						?>
						<option style="font-style: italic" disabled>-------------------------</option>
						<?php
							foreach ($action->logos_bi as $logo) { ?>
								<option value="<?= $logo['image_id']?>"><?= $logo['name'] ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>

			<!-- lien du partenaire -->
			<div class="row">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Le lien (doit absoluement commencer par <b>http://</b> ou <b>https://</b>. Si vous ne voulez pas de lien, mettez un espace. Si vous voulez que le lien soit une adresse email, écrivez <b>mailto:</b> suivi de l'adresse email.):</p>
				</div>
				<div class="col-md-4">
					<input type="text" placeholder="Lien du partenaire" style="width: 100%" name="sponsor_url" id="sponsor_url">
				</div>
			</div>

			<div class="row text-center" style="margin-top: 20px">
				<input type="submit" value="Créer" name="create_sponsor" class="submit-button-style">
			</div>

		</form>
	</div>

	<!-- liste des partenaires -->
	<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste des documents dans Compétiteurs / Competitors:</p>
	<div class="row console-container">
		<?php
			foreach ($action->sponsors as $sponsor) { ?>

			<div class="row image-item-container">
			
				<div class="col-md-2">
					<a href="<?= $sponsor['url_image'] ?>" target="_blank"><img src="<?= $sponsor['url_image'] ?>" style="height: 30px"/></a>
				</div>
				<div class="col-md-1">
					<a href="<?= $sponsor['url'] ?>" target="_blank">Lien</a>
				</div>
				<div class="col-md-2">
					<?= $sponsor['name_image'] ?>
				</div>
				<div class="col-md-1">
					visible <input type="checkbox" id="visible-<?=$sponsor['sponsor_id']?>" name="vehicle" onclick="updateVisibilitySponsor('<?=$sponsor['sponsor_id']?>')" <?php if($sponsor['visible']==1) echo "checked"?> >
				</div>

				<div class="col-md-3">
					<div class="row">
						rang: 
						<input id="rank-<?= $sponsor['sponsor_id'] ?>" type="number" value="<?= $sponsor['rank'] ?>" style="width: 50px"/>
						<button type="button" class="" onclick="saveNewRankSponsor('<?= $sponsor['sponsor_id'] ?>')">Sauvegarder</button>
					</div>
				</div>

				<div class="col-md-2">
					<div class="row">
						<button type="button" class="btn btn-danger" onclick="deleteSponsor('<?= $sponsor['sponsor_id'] ?>')">Supprimer</button>
					</div>

				</div>
			</div>

			<?php
				}
			?>
	</div>

</div>

</body>

<script>

	function updateCnn(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'cnn_bar',
				'value_fr': $('#cnnBarFr').val(),
				'value_en': $('#cnnBarEn').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateYoutubeVideo(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'home_youtube_video',
				'value_fr': $('#youtubeVidFr').val(),
				'value_en': $('#youtubeVidEn').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateLogoMobile(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'main_logo_mobile',
				'value_fr': $('#logo_mobile_fr').val(),
				'value_en': $('#logo_mobile_en').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateLogoLarge(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'main_logo_large',
				'value_fr': $('#logo_big_fr').val(),
				'value_en': $('#logo_big_en').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateMenuLogoMobile(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'menu_bar_logo_mobile',
				'value_fr': $('#menu_logo_mobile_fr').val(),
				'value_en': $('#menu_logo_mobile_en').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateMenuLogoLarge(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'menu_bar_logo_large',
				'value_fr': $('#menu_logo_big_fr').val(),
				'value_en': $('#menu_logo_big_en').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updatePreloaderLogo(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'preloader_logo',
				'value_fr': $('#preloader_logo_fr').val(),
				'value_en': $('#preloader_logo_en').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateMap(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_misc',
				'label': 'google_map_coords',
				'arg1': $('#mapLatitude').val(),
				'arg2': $('#mapLongitude').val(),
				'arg3': null,
				'arg4': null,
				'arg5': null
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateCountdown(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_misc',
				'label': 'countdown_date',
				'arg1': $('#dateRebours').val(),
				'arg2': null,
				'arg3': null,
				'arg4': null,
				'arg5': null
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateBackgroundImage(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'background_image_mobile',
				'value_fr': $('#background_mobile').val(),
				'value_en': $('#background_mobile').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateBackgroundVideo(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'background_video',
				'value_fr': $('#background_video').val(),
				'value_en': $('#background_video').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateFavicon(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'favicon_icon',
				'value_fr': $('#favicon_fr').val(),
				'value_en': $('#favicon_fr').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateHotelLogo(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'hotel_logo',
				'value_fr': $('#hotel_logo_fr').val(),
				'value_en': $('#hotel_logo_en').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateHotelUrl(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'hotel_link',
				'value_fr': $('#hotelLinkFr').val(),
				'value_en': $('#hotelLinkEn').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function updateHotelBackground(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_other',
				'label': 'background_hotel',
				'value_fr': $('#hotel_background_img').val(),
				'value_en': $('#hotel_background_img').val(),
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function deleteSponsor(id){
			if(confirm("Êtes-vous certain de vouloir supprimer ce partenaire?")){
				$.ajax({
					url: 'dummy.php',
					type: 'post',
					data: {
						'action': 'sponsor_delete',
						'id': id
					},
					success: function(data, status) {
						if(data == "ok") {
							window.location.replace("console_other.php");
						} else {
							console.log(data); //error
						}
					},
					error: function(xhr, desc, err) {
						console.log(xhr);
						console.log("Details: " + desc + "\nError:" + err);
					}
				});
			}
	}

	function updateVisibilitySponsor(id){
		let visible = $('#visible-' + id).is(':checked');

		let visible_num = (visible)? 1:0;

		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_sponsor_visibility',
				'id': id,
				'visible': visible_num
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}

	function saveNewRankSponsor(id){
		let rank = $('#rank-' + id).val();

		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_sponsor_rank',
				'id': id,
				'rank': rank
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_other.php");
				} else {
					console.log(data); //error
				}
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	}
	

</script>