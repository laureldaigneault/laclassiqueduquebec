<?php 
	require('utils/lang.php');
	require('action/ConsoleCompetitorsAction.php');

	$action = new ConsoleCompetitorsAction();
	$action->execute();

    include("partials/console-header.php");
?>

<div class="col-md-10 col-md-offset-1">

	<div class="row console-container">

		<?php 
				if ($action->newCompetitorError != null) {
					?>
					<div class="error-div"><strong><?=$action->newCompetitorError?></strong></div>
					<?php
				}
				if ($action->newCompetitorSuccess != null) {
					?>
					<div class="success-div"><strong><?=$action->newCompetitorSuccess?></strong></div>
					<?php
				}
			?>

		<h1 class="console-container-title">Ajouter un document dans la section Compétiteurs</h1>

		<form action="console_competitors.php" method="post" enctype="multipart/form-data">

			<!-- section -->
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Section du document: </p>
				</div>
				<div class="col-md-4">
					<select name="docSection" id="docSection" style="width: 100%; padding: 4px 0">
						<option disabled selected value> -- choisissez une section -- </option>
						<option value="comp">Compétiteur / Competitors</option>
						<option value="other">Autres documents / Other documents</option>
					</select>
				</div>
			</div>

			<!-- nom du document -->
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Nom du document: </p>
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
					<p style="width: 100%; text-align: right">Pdf: </p>
				</div>
				<div class="col-md-2">
					<select name="pdf_fr" id="pdf_fr" style="width: 100%; padding: 4px 0">
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
					<select name="pdf_en" id="pdf_en" style="width: 100%; padding: 4px 0">
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
				<input type="submit" value="Créer" name="create_competitor" class="submit-button-style">
			</div>

		</form>
	</div>

	<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste des documents dans Compétiteurs / Competitors:</p>
	<div class="row console-container">
		<?php
			foreach ($action->competitor_docs as $doc) { ?>

			<div class="row image-item-container">
			
				<div class="col-md-4">
					<?= $doc['name_fr'] ?> / <?= $doc['name_en'] ?>
				</div>
			
				<div class="col-md-2">
					<a href="<?=$doc['url_pdf_fr']?>" target="_blank">fichier FR</a> / <a href="<?=$doc['url_pdf_en']?>" target="_blank">fichier EN</a>
				</div>


				<div class="col-md-1">
					visible <input type="checkbox" id="visible-<?=$doc['competitor_id']?>" name="vehicle" onclick="updateVisibility('<?=$doc['competitor_id']?>')" <?php if($doc['visible']==1) echo "checked"?> >
				</div>

				<div class="col-md-3">
					<div class="row">
						rang: 
						<input id="rank-<?= $doc['competitor_id'] ?>" type="number" value="<?= $doc['rank'] ?>" style="width: 50px"/>
						<button type="button" class="" onclick="saveNewRank('<?= $doc['competitor_id'] ?>')">Sauvegarder</button>
					</div>
				</div>

				<div class="col-md-2">
					<div class="row">
						<button type="button" class="btn btn-danger" onclick="deleteCompetitor('<?= $doc['competitor_id'] ?>')">Supprimer</button>
					</div>

				</div>
			</div>

			<?php
				}
			?>
	</div>

	<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste des documents dans Autres documents / Other documents:</p>
	<div class="row console-container">
		<?php
			foreach ($action->other_docs as $doc) { ?>

			<div class="row image-item-container">
			
				<div class="col-md-4">
					<?= $doc['name_fr'] ?> / <?= $doc['name_en'] ?>
				</div>
			
				<div class="col-md-2">
					<a href="<?=$doc['url_pdf_fr']?>" target="_blank">fichier FR</a> / <a href="<?=$doc['url_pdf_en']?>" target="_blank">fichier EN</a>
				</div>


				<div class="col-md-1">
					visible <input type="checkbox" id="visible-<?=$doc['competitor_id']?>" name="vehicle" onclick="updateVisibility('<?=$doc['competitor_id']?>')" <?php if($doc['visible']==1) echo "checked"?> >
				</div>

				<div class="col-md-3">
					<div class="row">
						rang: 
						<input id="rank-<?= $doc['competitor_id'] ?>" type="number" value="<?= $doc['rank'] ?>" style="width: 50px"/>
						<button type="button" class="" onclick="saveNewRank('<?= $doc['competitor_id'] ?>')">Sauvegarder</button>
					</div>
				</div>

				<div class="col-md-2">
					<div class="row">
						<button type="button" class="btn btn-danger" onclick="deleteCompetitor('<?= $doc['competitor_id'] ?>')">Supprimer</button>
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

	function deleteCompetitor(id){
			if(confirm("Êtes-vous certain de vouloir supprimer ce document?")){
				$.ajax({
					url: 'dummy.php',
					type: 'post',
					data: {
						'action': 'competitor_delete',
						'id': id
					},
					success: function(data, status) {
						if(data == "ok") {
							window.location.replace("console_competitors.php");
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
				'action': 'update_competitor_visibility',
				'id': id,
				'visible': visible_num
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_competitors.php");
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
				'action': 'update_competitor_rank',
				'id': id,
				'rank': rank
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_competitors.php");
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