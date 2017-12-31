<?php 
	require('utils/lang.php');
	require('action/ConsoleBabillardAction.php');

	$action = new ConsoleBabillardAction();
	$action->execute();

    include("partials/console-header.php");
?>

<div class="col-md-10 col-md-offset-1">

	<div class="row console-container">

		<?php 
				if ($action->newBabillardError != null) {
					?>
					<div class="error-div"><strong><?=$action->newBabillardError?></strong></div>
					<?php
				}
				if ($action->newBabillardSuccess != null) {
					?>
					<div class="success-div"><strong><?=$action->newBabillardSuccess?></strong></div>
					<?php
				}
			?>

		<h1 class="console-container-title">Ajouter un élément au babillard</h1>

		<form action="console_babillard.php" method="post" enctype="multipart/form-data">

			<!-- image sur babillard -->
			<div class="row">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Image affichée sur le babillard: </p>
				</div>
				<div class="col-md-2">
					<select name="coverImageFr" id="coverImageFr" style="width: 100%; padding: 4px 0">
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
					<select name="coverImageEn" id="coverImageEn" style="width: 100%; padding: 4px 0">
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

			<!-- type de menu -->
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Type de l'élément: </p>
				</div>
				<div class="col-md-4">
					<select name="typeOfMenu" id="typeOfMenu" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- choisissez un type -- </option>
						<option value="url">Lien web</option>
						<option value="page">Page du site</option>
						<option value="img">Image</option>
						<option value="pdf">Pdf</option>
						<option value="youtube">Vidéo youtube</option>
					</select>
				</div>
			</div>

			<!-- type url -->
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

			<!-- type youtube -->
			<div class="row force-hide" id="type_youtube">
				<div class="col-md-12" style="text-align: center">
					<p>Pour trouver quel est la valeur à entrer, allez sur Youtube et clickez sur le vidéo que vous désirez.
															  Ensuite, lorsque vous êtes sur la page avec le vidéo qui joue, regarder le url. Il devrait commencer par 
															  ceci: <b>https://www.youtube.com/watch?v=</b> La valeur a entrer ici est la série de chiffres et de lettres 
															  suivant le symbole '<b>=</b>' dans le url. </p>
				</div>
				<div class="col-md-4">
					<p style="width: 100%; text-align: right"></p>
				</div>
				<div class="col-md-2">
					<input type="text" placeholder="code vidéo francais" style="width: 100%" name="type_youtube_fr" id="type_youtube_fr">
				</div>
				<div class="col-md-2">
					<input type="text" placeholder="code vidéo anglais" style="width: 100%" name="type_youtube_en" id="type_youtube_en">
				</div>
			</div>

			<!-- type page -->
			<div class="row force-hide" id="type_page">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Page du site: </p>
				</div>
				<div class="col-md-4">
					<select name="type_page_value" id="type_page_value" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- choisissez une page -- </option>
						<option value="http://laclassiqueduquebec.com/competitors.php">Compétiteurs</option>
						<option value="http://laclassiqueduquebec.com/gallery.php">Gallerie</option>
					</select>
				</div>
			</div>

			<!-- type img -->
			<div class="row force-hide" id="type_img">
				<div class="row">
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
				<div class="row">
					<div class="col-md-4">
						<p style="width: 100%; text-align: right">Lien de l'image (doit absoluement commencer par <b>http://</b> ou <b>https://</b>): </p>
					</div>
					<div class="col-md-2">
						<input type="text" placeholder="lien francais" style="width: 100%" name="type_image_extra_link_fr" id="type_image_extra_link_fr">
					</div>
					<div class="col-md-2">
						<input type="text" placeholder="lien anglais" style="width: 100%" name="type_image_extra_link_en" id="type_image_extra_link_en">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<p style="width: 100%; text-align: right">Lien secondaire 'voir la vidéo' (doit absoluement commencer par <b>http://</b> ou <b>https://</b>): </p>
					</div>
					<div class="col-md-2">
						<input type="text" placeholder="lien secondaire francais" style="width: 100%" name="type_image_extra_extra_link_fr" id="type_image_extra_extra_link_fr">
					</div>
					<div class="col-md-2">
						<input type="text" placeholder="lien secondaire anglais" style="width: 100%" name="type_image_extra_extra_link_en" id="type_image_extra_extra_link_en">
					</div>
				</div>
			</div>

			<!-- type pdf -->
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
				<input type="submit" value="Créer" name="create_babillard" class="submit-button-style">
			</div>

		</form>
	</div>



	<!-- liste de tous les items -->
	<div class="row console-container">
		<?php
			foreach ($action->babillards as $item) { ?>

			<div class="row image-item-container">
				<div class="col-md-1">
					<a href="<?= $item['url_image_fr_cover'] ?>" target="_blank"><img src="<?= $item['url_image_fr_cover'] ?>" style="height: 30px"/></a> / 
					<a href="<?= $item['url_image_en_cover'] ?>" target="_blank"><img src="<?= $item['url_image_en_cover'] ?>" style="height: 30px"/></a>
				</div>
				<div class="col-md-2">
					<?= $item['name_image_fr_cover'] ?> / <?= $item['name_image_en_cover'] ?>
				</div>
				<div class="col-md-1">
					<?= $item['type'] ?>
				</div>

				<?php
					if($item['type'] == 'url'){ ?>
						<div class="col-md-4">
							<a href="<?=$item['arg1_fr']?>" target="_blank">lien FR</a> / <a href="<?=$item['arg1_en']?>" target="_blank">lien EN</a>
						</div>
					<?php
					}
				?>
				<?php
					if($item['type'] == 'page'){ ?>
						<div class="col-md-4">
							<a href="<?=$item['arg1_fr']?>" target="_blank">lien de la page</a>
						</div>
					<?php
					}
				?>
				<?php
					if($item['type'] == 'youtube'){ ?>
						<div class="col-md-4">
							<a href="https://www.youtube.com/watch?v=<?=$item['arg1_fr']?>" target="_blank">vidéo FR</a> / <a href="https://www.youtube.com/watch?v=<?=$item['arg1_en']?>" target="_blank">vidéo EN</a>
						</div>
					<?php
					}
				?>
				<?php
					if($item['type'] == 'img'){ ?>
						<div class="col-md-2">
							<a href="<?=$item['url_image_fr']?>" target="_blank">image FR</a> / <a href="<?=$item['url_image_en']?>" target="_blank">image EN</a>
						</div>
						<div class="col-md-2">
							<a href="<?=$item['arg1_fr']?>" target="_blank">lien FR</a> / <a href="<?=$item['arg1_en']?>" target="_blank">lien EN</a>
						</div>
					<?php
					}
				?>
				<?php
					if($item['type'] == 'pdf'){ ?>
						<div class="col-md-4">
							<a href="<?=$item['url_pdf_fr']?>" target="_blank">fichier FR</a> / <a href="<?=$item['url_pdf_en']?>" target="_blank">fichier EN</a>
						</div>
					<?php
					}
				?>

				<div class="col-md-1">
					visible <input type="checkbox" id="visible-<?=$item['babillard_id']?>" name="vehicle" onclick="updateVisibility('<?=$item['babillard_id']?>')" <?php if($item['visible']==1) echo "checked"?> >
				</div>

				<div class="col-md-2">
					<div class="row">
						rang: 
						<input id="rank-<?= $item['babillard_id'] ?>" type="number" value="<?= $item['rank'] ?>" style="width: 50px"/>
						<button type="button" class="" onclick="saveNewRank('<?= $item['babillard_id'] ?>')">Sauvegarder</button>
					</div>
				</div>

				<div class="col-md-1">
					<div class="row">
						<button type="button" class="btn btn-danger" onclick="deleteBabillard('<?= $item['babillard_id'] ?>')">Supprimer</button>
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
		$('#type_page').removeClass('show');
		$('#type_youtube').removeClass('show');

		if (type == 'url') {
			$('#type_url').addClass('show')
		} else if (type == 'img') {
			$('#type_img').addClass('show')
		} else if (type == 'pdf') {
			$('#type_pdf').addClass('show')
		} else if (type == 'page') {
			$('#type_page').addClass('show')
		} else if (type == 'youtube') {
			$('#type_youtube').addClass('show')
		}
	});

	function deleteBabillard(id){
			if(confirm("Êtes-vous certain de vouloir supprimer cet item du babillard?")){
				$.ajax({
					url: 'dummy.php',
					type: 'post',
					data: {
						'action': 'babillard_delete',
						'id': id
					},
					success: function(data, status) {
						if(data == "ok") {
							window.location.replace("console_babillard.php");
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
				'action': 'update_babillard_visibility',
				'id': id,
				'visible': visible_num
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_babillard.php");
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
				'action': 'update_babillard_rank',
				'id': id,
				'rank': rank
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_babillard.php");
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