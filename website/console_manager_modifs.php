<?php
	require('utils/lang.php');
	require('action/ConsoleManagerModifsAction.php');

	$action = new ConsoleManagerModifsAction();
	$action->execute();

    include("partials/console-header.php");
?>


<div class="col-md-8 col-md-offset-2">

	<!-- cnn -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier le pdf horaire</h1>
		<p></p>
		<form action="console_manager_modifs.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Le pdf en français: </p>
				</div>
				<div class="col-md-4">
					<input type="file" name="fileToUpload" id="fileToUpload">
				</div>
				<div class="col-md-4">
					<a href="" target="_blank">cliquez pour voir le pdf actuel: <img src="img/pdflogo.png" style="height: 30px"/></a>
				</div>
			</div>

			<div class="row text-center" style="margin-top: 5px">
				<input type="submit" value="Télécharger" name="submit_pdf" class="submit-button-style">
			</div>

		</form>

		<form action="console_manager_modifs.php" method="post" enctype="multipart/form-data" style="margin-top: 30px">
			<div class="row">
				<div class="col-md-4">
					<p style="width: 100%; text-align: right">Le pdf en anglais: </p>
				</div>
				<div class="col-md-4">
					<input type="file" name="fileToUpload" id="fileToUpload">
				</div>
				<div class="col-md-4">
					<a href="" target="_blank">cliquez pour voir le pdf actuel: <img src="img/pdflogo.png" style="height: 30px"/></a>
				</div>
			</div>

			<div class="row text-center" style="margin-top: 5px; margin-bottom: 30px">
				<input type="submit" value="Télécharger" name="submit_pdf" class="submit-button-style">
			</div>

		</form>
	</div>

	<!-- changer heatlist -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier le lien heat-list</h1>
		<p>Le lien (doit absoluement commencer par <b>http://</b> ou <b>https://</b>): </p>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Lien heat-list: </p>
			</div>
			<div class="col-md-4">
				<input type="text" placeholder="lien" style="width: 100%" name="heatlist" id="heatlist" value="<?= $action->heatlist['arg1']?>">
			</div>
		</div>

		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Afficher sur le site: </p>
			</div>
			<div class="col-md-4">
				<select name="heatlist_display" id="heatlist_display" style="width: 100%; padding: 4px 0">
					<option value="1" <?php if($action->heatlist['arg2'] == '1') echo "selected" ?>>oui</option>
					<option value="0" <?php if($action->heatlist['arg2'] == '0') echo "selected" ?>>non</option>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateHeatList()">Sauvegarder</button>
			</div>
		</div>
	</div>

	<!-- changer resultat -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Modifier le lien resultat</h1>
		<p>Le lien (doit absoluement commencer par <b>http://</b> ou <b>https://</b>): </p>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Lien résultat: </p>
			</div>
			<div class="col-md-4">
				<input type="text" placeholder="lien" style="width: 100%" name="result" id="result" value="<?= $action->result['arg1']?>">
			</div>
		</div>

		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Afficher sur le site: </p>
			</div>
			<div class="col-md-4">
				<select name="result_display" id="result_display" style="width: 100%; padding: 4px 0">
					<option value="1" <?php if($action->result['arg2'] == '1') echo "selected" ?>>oui</option>
					<option value="0" <?php if($action->result['arg2'] == '0') echo "selected" ?>>non</option>
				</select>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="updateResult()">Sauvegarder</button>
			</div>
		</div>
	</div>
</div>

</body>

<script>

	function updateHeatList(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_misc',
				'label': 'heatlist_link',
				'arg1': $('#heatlist').val(),
				'arg2': $('#heatlist_display').val(),
				'arg3': null,
				'arg4': null,
				'arg5': null
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_manager_modifs.php");
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

	function updateResult(){
		$.ajax({
			url: 'dummy.php',
			type: 'post',
			data: {
				'action': 'update_misc',
				'label': 'result_link',
				'arg1': $('#result').val(),
				'arg2': $('#result_display').val(),
				'arg3': null,
				'arg4': null,
				'arg5': null
			},
			success: function(data, status) {
				if(data == "ok") {
					window.location.replace("console_manager_modifs.php");
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
