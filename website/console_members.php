<?php 
	require('utils/lang.php');
	require('action/ConsoleMembersAction.php');

	$action = new ConsoleMembersAction();
	$action->execute();

    include("partials/console-header.php");
?>


<div class="col-md-8 col-md-offset-2">

	<!-- copier membres -->
	<div class="row console-container option-blue">
		<h1 class="console-container-title">Copier la liste de tous les membres</h1>
		<div class="row" style="margin-bottom: 10px">
			<div class="col-md-4">
				<p style="width: 100%; text-align: right">Clickez pour copier tous les <b><?= count($action->members) ?></b> membres (ensuite, faites 'coller' dans le champ destinataire de votre email): </p>
			</div>
			<div class="col-md-2">
				<button type="button" class="" onclick="copyMembers('<?php 
					foreach ($action->members as $member) {
						if(!preg_match('/"/', $member['email']) && strlen($member['email']) > 0){
							echo $member['email'] . ',';
						}
					}
				?>')">Copier les <b><?= count($action->members) ?></b> membres</button>
			</div>
			<div class="col-md-6">
				<textarea id="membersdummy" style=""></textarea>
			</div>
		</div>
	</div>

	<!-- liste des membres -->
	<p style="margin-left: 10px; margin-top: 40px; font-style: italic;">Liste des membres:</p>
	<div class="row console-container">
		<?php
			foreach ($action->members as $member) { 
				if(!preg_match('/"/', $member['email']) && strlen($member['email']) > 0){?>

			<div class="row image-item-container">
			
				<div class="col-md-8">
					<a href="<?= $member['email'] ?>" target="_blank"><p><?= $member['email'] ?></p></a>
				</div>

				<div class="col-md-2"></div>

				<div class="col-md-2">
					<div class="row">
						<button type="button" class="btn btn-danger" onclick="deleteMember('<?= $member['subscriber_id'] ?>')">Supprimer</button>
					</div>

				</div>
			</div>

			<?php
			 }
				}
			?>
	</div>

	

</div>

</body>

<script>
	function copyMembers(emails){
		var dummy = document.getElementById("membersdummy");
		dummy.value=emails
		dummy.select();
		document.execCommand("copy");
		document.body.removeChild(dummy);
	}

	function deleteMember(id){
			if(confirm("Êtes-vous certain de vouloir supprimer ce membre?")){
				$.ajax({
					url: 'dummy.php',
					type: 'post',
					data: {
						'action': 'member_delete',
						'id': id
					},
					success: function(data, status) {
						if(data == "ok") {
							window.location.replace("console_members.php");
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