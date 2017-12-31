<?php
	require('utils/lang.php');
	require('action/ConsolePdfsAction.php');

	$action = new ConsolePdfsAction();
	$action->execute();

    include("partials/console-header.php");
?>

	<div class="col-md-8 col-md-offset-2">
		<div class="row console-container">

			<?php
				if ($action->pdfUploadError != null) {
					?>
					<div class="error-div"><strong><?=$action->pdfUploadError?></strong></div>
					<?php
				}
				if ($action->pdfUploadSuccess != null) {
					?>
					<div class="success-div"><strong><?=$action->pdfUploadSuccess?></strong></div>
					<?php
				}
			?>

			<h1 class="console-container-title">Télécharger un nouveau PDF</h1>


			<form action="console_pdfs.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-4">
						<input type="file" name="fileToUpload" id="fileToUpload">
					</div>
					<div class="col-md-4">
						<input type="text" placeholder="nom du pdf" style="width: 100%" name="nameOfFile" id="nameOfFile">
					</div>
					<div class="col-md-4">
						<select name="languageFile" id="languageFile" style="width: 100%">
							<option value="fr">Français</option>
							<option value="en">English</option>
							<option value="bi">Bilingue</option>
						</select>
					</div>
				</div>

				<div class="row text-center" style="margin-top: 20px">
					<input type="submit" value="Télécharger" name="submit_pdf" class="submit-button-style">
				</div>

			</form>
		</div>
		<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste de tous les PDF:</p>
		<div class="row console-container">
			<?php
				foreach ($action->pdfs as $pdf) { ?>

						<div class="row image-item-container">
							<div class="col-md-1">
								<a href="<?= $pdf['url'] ?>" target="_blank"><img src="img/pdflogo.png" style="height: 30px"/></a>
							</div>
							<div class="col-md-4">
								<?= $pdf['name'] ?>
							</div>
							<div class="col-md-4">
								<?= $pdf['url'] ?>
							</div>
							<div class="col-md-1">
								<?= $pdf['language'] ?>
							</div>
							<div class="col-md-2">
								<div class="row">
									<button type="button" class="btn btn-primary" onclick="setEditPdf('<?= $pdf['pdf_id'] ?>', '<?= $pdf['url'] ?>', '<?= $pdf['name'] ?>')">Modifier</button>
									<?php
									if($pdf['pdf_id'] != 999998 && $pdf['pdf_id'] != 999999) { ?>
										<button type="button" class="btn btn-danger" onclick="deletePdf('<?= $pdf['pdf_id'] ?>', '<?= $pdf['url'] ?>', '<?= $pdf['name'] ?>')">Supprimer</button>
									<?php } ?>
								</div>

							</div>
						</div>

				<?php
				}
			?>
		</div>
	</div>

	<div class="made-modal" id="myModal">
		<form action="console_pdfs.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<input type="file" name="fileToUploadUpdate" id="fileToUploadUpdate">
				</div>
				<div class="col-md-6">
					<input type="text" placeholder="nom du pdf'" style="width: 100%" name="nameOfFileUpdate" id="nameOfFileUpdate">
				</div>
				<input type="hidden" name="idOfPdfUpdate" id="idOfPdfUpdate" value="">
			</div>
			<div class="row text-center" style="margin-top: 20px">
				<button type="button" class="btn btn-danger" onclick="cancelEdit()">Annuler</button>
				<button type="submit" class="btn btn-primary" name="pdf_edit" id="pdf_edit">Sauvegarder</button>
			</div>
		</form>
	</div>


</body>

<script>


		var activePdf = {
			id: "",
			url: "",
			name: ""
		}
		function setEditPdf(id, url, name){
			activePdf.id=id;
			activePdf.url=url;
			activePdf.name=name;

			$("#myModal").addClass('made-modal-show');

			$('#nameOfFileUpdate').val(activePdf.name);
			$('#idOfPdfUpdate').val(activePdf.id);
			//...
		}

		function cancelEdit(){
			activePdf = {
				id: "",
				url: "",
				name: ""
			};

			$("#myModal").removeClass('made-modal-show');
		}

		function deletePdf(id, url, name){
			if(confirm("Êtes-vous certain de vouloir supprimer le pdf: "+name+"? Cette action pourrait corrompre les emplacement du site qui utilisent ce pdf. Il est recommandé de 'Modifier' le pdf au lieu de le supprimer.")){
				$.ajax({
					url: 'dummy.php',
					type: 'post',
					data: {
						'action': 'pdf_delete',
						'id': id,
						'url': url
					},
					success: function(data, status) {
						if(data == "ok") {
							window.location.replace("console_pdfs.php");
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

</script>
