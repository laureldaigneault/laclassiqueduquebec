<?php 
	require('utils/lang.php');
	require('action/ConsoleHomeAction.php');

	$action = new ConsoleHomeAction();
	$action->execute();

    include("partials/console-header.php");
?>


	<div class="row">
		<div class="col-md-12 text-center" style="margin-top: 200px">
			<p>Bienvenue dans la console d'administration de la Classique du Québec. Cette console permet de modifier le contenu du site en temps réel.</p>
			<p>Prenez note que chaque modification sauvegardée sera mise en ligne <b>immédiatement</b> donc il est important de faire attention aux modifications apportées.</p>
		</div>
	</div>

</body>