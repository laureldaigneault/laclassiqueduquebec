<?php 
	require('utils/lang.php');
	require('action/ConsoleGalleryAction.php');

	$action = new ConsoleGalleryAction();
	$action->execute();

    include("partials/console-header.php");
?>


<div class="col-md-10 col-md-offset-1">

	<div class="row console-container">

		<?php 
				if ($action->newGalleryError != null) {
					?>
					<div class="error-div"><strong><?=$action->newGalleryError?></strong></div>
					<?php
				}
				if ($action->newGallerySuccess != null) {
					?>
					<div class="success-div"><strong><?=$action->newGallerySuccess?></strong></div>
					<?php
				}
			?>

		<h1 class="console-container-title">Ajouter une photo</h1>

		<form action="console_gallery.php" method="post" enctype="multipart/form-data">

			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Photo à ajouter: </p>
				</div>
				<div class="col-md-4">
					<select name="photo_id_gal" id="photo_id_gal" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- photo -- </option>
						<?php
							foreach ($action->images_fr as $img) { ?>
								<option value="<?= $img['image_id']?>"><?= $img['name'] ?></option>
						<?php
							}
						?>
						<option style="font-style: italic" disabled>-------------------------</option>
						<?php
							foreach ($action->images_en as $img) { ?>
								<option value="<?= $img['image_id']?>"><?= $img['name'] ?></option>
						<?php
							}
						?>
						<option style="font-style: italic" disabled>-------------------------</option>
						<?php
							foreach ($action->images_bi as $img) { ?>
								<option value="<?= $img['image_id']?>"><?= $img['name'] ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>

			<div class="row text-center" style="margin-top: 20px">
				<input type="submit" value="Créer" name="create_gallery" class="submit-button-style">
			</div>

		</form>
	</div>

	<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste des photos:</p>
	<div class="row console-container">
		<?php
			foreach ($action->gallery_photos as $img) { ?>

			<div class="row image-item-container">

				<div class="col-md-3">
					<a href="<?= $img['url_image'] ?>" target="_blank"><img src="<?= $img['url_image'] ?>" style="height: 30px"/></a>
				</div>

				<div class="col-md-2">
					<p><?= $img['name_image'] ?></p>
				</div>

				<div class="col-md-2">
					visible <input type="checkbox" id="visible-<?=$img['gallery_id']?>" name="vehicle" onclick="updateVisibility('<?=$img['gallery_id']?>')" <?php if($img['visible']==1) echo "checked"?> >
				</div>

				<div class="col-md-3">
					<div class="row">
						rang: 
						<input id="rank-<?= $img['gallery_id'] ?>" type="number" value="<?= $img['rank'] ?>" style="width: 50px"/>
						<button type="button" class="" onclick="saveNewRank('<?= $img['gallery_id'] ?>')">Sauvegarder</button>
					</div>
				</div>

				<div class="col-md-2">
					<div class="row">
						<button type="button" class="btn btn-danger" onclick="deleteGallery('<?= $img['gallery_id'] ?>')">Supprimer</button>
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

	function deleteGallery(id){
			if(confirm("Êtes-vous certain de vouloir supprimer ce document?")){
				$.ajax({
					url: 'dummy.php',
					type: 'post',
					data: {
						'action': 'gallery_delete',
						'id': id
					},
					success: function(data, status) {
						if(data == "ok") {
							window.location.replace("console_gallery.php");
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
				'action': 'update_gallery_visibility',
				'id': id,
				'visible': visible_num
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_gallery.php");
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
				'action': 'update_gallery_rank',
				'id': id,
				'rank': rank
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_gallery.php");
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