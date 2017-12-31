<?php 
	require('utils/lang.php');
	require('action/ConsoleVideosAction.php');

	$action = new ConsoleVideosAction();
	$action->execute();

    include("partials/console-header.php");
?>

	<div class="col-md-8 col-md-offset-2">
		<div class="row console-container">

			<?php 
				if ($action->imageUploadError != null) {
					?>
					<div class="error-div"><strong><?=$action->imageUploadError?></strong></div>
					<?php
				}
				if ($action->imageUploadSuccess != null) {
					?>
					<div class="success-div"><strong><?=$action->imageUploadSuccess?></strong></div>
					<?php
				}
			?>

			<h1 class="console-container-title">Télécharger un nouveau vidéo</h1>


			<form action="console_videos.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-4">
						<input type="file" name="fileToUpload" id="fileToUpload">
					</div>
					<div class="col-md-4">
						<input type="text" placeholder="nom du vidéo" style="width: 100%" name="nameOfFile" id="nameOfFile">
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
					<input type="submit" value="Télécharger" name="submit_image" class="submit-button-style">
				</div>
				
			</form>
		</div>
		<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste de tous les vidéos:</p>
		<div class="row console-container">
			<?php
				foreach ($action->videos as $img) { ?>
					
						<div class="row image-item-container">
							<div class="col-md-2">
								<a href="<?= $img['url'] ?>" target="_blank"><img src="<?= $img['url'] ?>" onerror="this.src=''; this.src='img/camera.png';" style="height: 30px"/></a>
							</div>
							<div class="col-md-3">
								<?= $img['name'] ?>
							</div>
							<div class="col-md-4">
								<?= $img['url'] ?>
							</div>
							<div class="col-md-1">
								<?= $img['language'] ?>
							</div>
							<div class="col-md-2">
								<div class="row">
									<button type="button" class="btn btn-danger" onclick="deleteImage('<?= $img['video_id'] ?>', '<?= $img['url'] ?>', '<?= $img['name'] ?>')">Supprimer</button>
									<button type="button" class="btn btn-primary" onclick="setEditImage('<?= $img['video_id'] ?>', '<?= $img['url'] ?>', '<?= $img['name'] ?>')">Modifier</button>
								</div>
								
							</div>
						</div>
					
				<?php
				}
			?>
		</div>
	</div>

	<div class="made-modal" id="myModal">
		<form action="console_videos.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<input type="file" name="fileToUploadUpdate" id="fileToUploadUpdate">
				</div>
				<div class="col-md-6">
					<input type="text" placeholder="nom du vidéo'" style="width: 100%" name="nameOfFileUpdate" id="nameOfFileUpdate">
				</div>
				<input type="hidden" name="idOfImageUpdate" id="idOfImageUpdate" value="">
			</div>
			<div class="row text-center" style="margin-top: 20px">
				<button type="button" class="btn btn-danger" onclick="cancelEdit()">Annuler</button>
				<button type="submit" class="btn btn-primary" name="image_edit" id="image_edit">Sauvegarder</button>
			</div>
		</form>
	</div>


</body>

<script>


		var activeImage = {
			id: "",
			url: "",
			name: ""
		}
		function setEditImage(id, url, name){
			activeImage.id=id;
			activeImage.url=url;
			activeImage.name=name;
			
			$("#myModal").addClass('made-modal-show');

			$('#nameOfFileUpdate').val(activeImage.name);
			$('#idOfImageUpdate').val(activeImage.id);
			//...
		}

		function cancelEdit(){
			activeImage = {
				id: "",
				url: "",
				name: ""
			};

			$("#myModal").removeClass('made-modal-show');
		}

		function deleteImage(id, url, name){
			if(confirm("Êtes-vous certain de vouloir supprimer le vidéo: "+name+"? Cette action pourrait corrompre les emplacement du site qui utilisent ce vidéo. Il est recommandé de 'Modifier' le vidéo au lieu de le supprimer.")){
				$.ajax({
					url: 'dummy.php',
					type: 'post',
					data: {
						'action': 'video_delete',
						'id': id,
						'url': url
					},
					success: function(data, status) {
						if(data == "ok") {
							window.location.replace("console_videos.php");
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