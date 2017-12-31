<?php 
	require('utils/lang.php');
	require('action/ConsoleMenusAction.php');

	$action = new ConsoleMenusAction();
	$action->execute();

    include("partials/console-header.php");
?>

<div class="col-md-10 col-md-offset-1">

	<div class="row console-container">

		<?php 
				if ($action->newMenuError != null) {
					?>
					<div class="error-div"><strong><?=$action->newMenuError?></strong></div>
					<?php
				}
				if ($action->newMenuSuccess != null) {
					?>
					<div class="success-div"><strong><?=$action->newMenuSuccess?></strong></div>
					<?php
				}
			?>

		<h1 class="console-container-title">Ajouter un menu</h1>

		<form action="console_menus.php" method="post" enctype="multipart/form-data">

			<!-- section -->
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Section du menu: </p>
				</div>
				<div class="col-md-4">
					<select name="sectionOfMenu" id="sectionOfMenu" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- choisissez une section -- </option>
						<option value="event">Événements / Events</option>
						<option value="ticket">Billets / Tickets</option>
					</select>
				</div>
			</div>

			<!-- nom du menu -->
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Nom du menu: </p>
				</div>
				<div class="col-md-2">
					<input type="text" placeholder="nom francais" style="width: 100%" name="menuNameFrench" id="menuNameFrench">
				</div>
				<div class="col-md-2">
					<input type="text" placeholder="nom anglais" style="width: 100%" name="menuNameEnglish" id="menuNameEnglish">
				</div>
			</div>

			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Type du menu: </p>
				</div>
				<div class="col-md-4">
					<select name="typeOfMenu" id="typeOfMenu" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- choisissez un type -- </option>
						<option value="url">Lien web</option>
						<option value="img">Image</option>
						<option value="pdf">Pdf</option>
					</select>
				</div>
			</div>

			<div class="row force-hide" id="type_url">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Lien du menu (doit absoluement commencer par <b>http://</b> ou <b>https://</b>): </p>
				</div>
				<div class="col-md-2">
					<input type="text" placeholder="lien francais" style="width: 100%" name="type_url_link_fr" id="type_url_link_fr">
				</div>
				<div class="col-md-2">
					<input type="text" placeholder="lien anglais" style="width: 100%" name="type_url_link_en" id="type_url_link_en">
				</div>
			</div>

			<div class="row force-hide" id="type_img">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Image à ouvrir: </p>
				</div>
				<div class="col-md-2">
					<select name="type_img_fr" id="type_img_fr" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- image en français -- </option>
						<?php
							foreach ($action->images_fr as $image) { ?>
								<option value="<?= $image['image_id']?>"><?= $image['name'] ?></option>
						<?php
							}
						?>
						<option style="font-style: italic" disabled>-------------------------</option>
						<?php
							foreach ($action->images_bi as $image) { ?>
								<option value="<?= $image['image_id']?>"><?= $image['name'] ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="col-md-2">
					<select name="type_img_en" id="type_img_en" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- image en anglais -- </option>
						<?php
							foreach ($action->images_en as $image) { ?>
								<option value="<?= $image['image_id']?>"><?= $image['name'] ?></option>
						<?php
							}
						?>
						<option style="font-style: italic" disabled>-------------------------</option>
						<?php
							foreach ($action->images_bi as $image) { ?>
								<option value="<?= $image['image_id']?>"><?= $image['name'] ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>

			<div class="row force-hide" id="type_pdf">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Pdf à ouvrir: </p>
				</div>
				<div class="col-md-2">
					<select name="type_pdf_fr" id="type_pdf_fr" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- pdf en français -- </option>
						<?php
							foreach ($action->pdfs_fr as $pdf) { ?>
								<option value="<?= $pdf['pdf_id']?>"><?= $pdf['name'] ?></option>
						<?php
							}
						?>
						<option style="font-style: italic" disabled>-------------------------</option>
						<?php
							foreach ($action->pdfs_bi as $pdf) { ?>
								<option value="<?= $pdf['pdf_id']?>"><?= $pdf['name'] ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="col-md-2">
					<select name="type_pdf_en" id="type_pdf_en" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- pdf en anglais -- </option>
						<?php
							foreach ($action->pdfs_en as $pdf) { ?>
								<option value="<?= $pdf['pdf_id']?>"><?= $pdf['name'] ?></option>
						<?php
							}
						?>
						<option style="font-style: italic" disabled>-------------------------</option>
						<?php
							foreach ($action->pdfs_bi as $pdf) { ?>
								<option value="<?= $pdf['pdf_id']?>"><?= $pdf['name'] ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>

			<div class="row text-center" style="margin-top: 20px">
				<input type="submit" value="Créer" name="create_menu" class="submit-button-style">
			</div>

		</form>
	</div>

	<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste des menus dans Événements / Events:</p>

	<!-- liste de tous les menus -->
	<div class="row console-container">
		<?php
			foreach ($action->event_menus as $menu) { ?>

			<div class="row image-item-container">
				<div class="col-md-4">
					<?= $menu['name_fr'] ?> / <?= $menu['name_en'] ?>
				</div>
				<div class="col-md-1">
					<?= $menu['type'] ?>
				</div>

				<?php
					if($menu['type'] == 'url'){ ?>

						<div class="col-md-2">
							<a href="//<?=$menu['value_fr']?>" target="_blank">lien FR</a> / <a href="//<?=$menu['value_en']?>" target="_blank">lien EN</a>
						</div>

					<?php
					}
				?>
				<?php
					if($menu['type'] == 'img'){ ?>

						<div class="col-md-2">
							<a href="<?=$menu['url_image_fr']?>" target="_blank">fichier FR</a> / <a href="<?=$menu['url_image_en']?>" target="_blank">fichier EN</a>
						</div>

					<?php
					}
				?>
				<?php
					if($menu['type'] == 'pdf'){ ?>

						<div class="col-md-2">
							<a href="<?=$menu['url_pdf_fr']?>" target="_blank">fichier FR</a> / <a href="<?=$menu['url_pdf_en']?>" target="_blank">fichier EN</a>
						</div>

					<?php
					}
				?>

				<div class="col-md-1">
					visible <input type="checkbox" id="visible-<?=$menu['menu_id']?>" name="vehicle" onclick="updateVisibility('<?=$menu['menu_id']?>')" <?php if($menu['visible']==1) echo "checked"?> >
				</div>

				<div class="col-md-2">
					<div class="row">
						rang: 
						<input id="rank-<?= $menu['menu_id'] ?>" type="number" value="<?= $menu['rank'] ?>" style="width: 50px"/>
						<button type="button" class="" onclick="saveNewRank('<?= $menu['menu_id'] ?>')">Sauvegarder</button>
					</div>
				</div>

				<div class="col-md-2">
					<div class="row">
						<button type="button" class="btn btn-danger" onclick="deleteMenu('<?= $menu['menu_id'] ?>')">Supprimer</button>
						<!--<button type="button" class="btn btn-primary" onclick="setEditMenu('<?= $menu['menu_id'] ?>', '<?= $menu['type'] ?>', '<?= $menu['name_fr'] ?>', '<?= $menu['name_en'] ?>', '<?= $menu['value_fr'] ?>', '<?= $menu['value_en'] ?>')">Modifier</button>-->
					</div>

				</div>
			</div>

			<?php
				}
			?>
	</div>

	<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste des menus dans Billets / Tickets:</p>

	<!-- liste de tous les menus -->
	<div class="row console-container">
		<?php
			foreach ($action->ticket_menus as $menu) { ?>

			<div class="row image-item-container">
				<div class="col-md-4">
					<?= $menu['name_fr'] ?> / <?= $menu['name_en'] ?>
				</div>
				<div class="col-md-1">
					<?= $menu['type'] ?>
				</div>

				<?php
					if($menu['type'] == 'url'){ ?>

						<div class="col-md-2">
							<a href="//<?=$menu['value_fr']?>" target="_blank">lien FR</a> / <a href="//<?=$menu['value_en']?>" target="_blank">lien EN</a>
						</div>

					<?php
					}
				?>
				<?php
					if($menu['type'] == 'img'){ ?>

						<div class="col-md-2">
							<a href="<?=$menu['url_image_fr']?>" target="_blank">fichier FR</a> / <a href="<?=$menu['url_image_en']?>" target="_blank">fichier EN</a>
						</div>

					<?php
					}
				?>
				<?php
					if($menu['type'] == 'pdf'){ ?>

						<div class="col-md-2">
							<a href="<?=$menu['url_pdf_fr']?>" target="_blank">fichier FR</a> / <a href="<?=$menu['url_pdf_en']?>" target="_blank">fichier EN</a>
						</div>

					<?php
					}
				?>

				<div class="col-md-3">
					visible <input type="checkbox" id="visible-<?=$menu['menu_id']?>" name="vehicle" onclick="updateVisibility('<?=$menu['menu_id']?>')" <?php if($menu['visible']==1) echo "checked"?> >
				</div>

				<div class="col-md-2">
					<div class="row">
						<button type="button" class="btn btn-danger" onclick="deleteMenu('<?= $menu['menu_id'] ?>')">Supprimer</button>
						<!--<button type="button" class="btn btn-primary" onclick="setEditMenu('<?= $menu['menu_id'] ?>', '<?= $menu['type'] ?>', '<?= $menu['name_fr'] ?>', '<?= $menu['name_en'] ?>', '<?= $menu['value_fr'] ?>', '<?= $menu['value_en'] ?>')">Modifier</button>-->
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
	$(document).on('change', '#typeOfMenu', function () {
		let type = $('#typeOfMenu').val();

		$('#type_url').removeClass('show');
		$('#type_img').removeClass('show');
		$('#type_pdf').removeClass('show');

		if (type == 'url') {
			$('#type_url').addClass('show')
		} else if (type == 'img') {
			$('#type_img').addClass('show')
		} else if (type == 'pdf') {
			$('#type_pdf').addClass('show')
		}
	});

	function deleteMenu(id){
			if(confirm("Êtes-vous certain de vouloir supprimer ce menu?")){
				$.ajax({
					url: 'dummy.php',
					type: 'post',
					data: {
						'action': 'menu_delete',
						'id': id
					},
					success: function(data, status) {
						if(data == "ok") {
							window.location.replace("console_menus.php");
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

	function updateVisibility(id){
		let visible = $('#visible-' + id).is(':checked');

		let visible_num = (visible)? 1:0;

		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_menu_visibility',
				'id': id,
				'visible': visible_num
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_menus.php");
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

	function saveNewRank(id){
		let rank = $('#rank-' + id).val();

		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_menu_rank',
				'id': id,
				'rank': rank
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_menus.php");
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