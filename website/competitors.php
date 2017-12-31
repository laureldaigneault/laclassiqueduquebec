<?php 
	require('utils/lang.php');
	require('action/competitorsAction.php');

	$action = new competitorsAction();
	$action->execute();

	include("partials/header.php");
?>

<!-- body -->

	<div class="se-header-competitor">
		<!-- <div class="lys-part"></div> -->
		<!-- <div class="lys-part2"></div> -->
		<div class="container">
			<h1 class="text-center"><?= $action->compSection[langIndex(LANG)] ?></h1>
		</div>
	</div>

	<div class="se-competitor-list">
		<div class="container">

			<?php
			if($action->comp_visible_count > 0) { ?>

				<div class="col-md-12 ">
					<h2><?= $action->compSection[langIndex(LANG)] ?></h2>
				</div>

				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width:90%; font-style: italic;"></th>
							<th></th>
						</tr>
					</thead>
					<tbody class="comp-table">
						<?php
							foreach ($action->comp_documents as $doc) {
								if($doc['visible'] == 1) {?>
								<tr><td><?= $doc['name_'.LANG]?></td><td><a href='<?=$doc['url_pdf_'.LANG]?>' target='_blank'><img class='pdf-icon' src='img/pdf-icon.png'/></a></td></tr>
							<?php }
							}
						?>
					</tbody>
				</table> 

			<?php } ?>


			<?php
			if($action->other_visible_count > 0) { ?>

				<div class="col-md-12 ">
					<h2><?= $action->otherSection[langIndex(LANG)] ?></h2>
				</div>

				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width:90%; font-style: italic;"></th>
							<th></th>
						</tr>
					</thead>
					<tbody class="comp-table">
						<?php
							foreach ($action->other_documents as $doc) { 
								if($doc['visible'] == 1) {?>
								<tr><td><?= $doc['name_'.LANG]?></td><td><a href='<?=$doc['url_pdf_'.LANG]?>' target='_blank'><img class='pdf-icon' src='img/pdf-icon.png'/></a></td></tr>
							<?php }
							}
						?>
					</tbody>
				</table>
			<?php } ?>


		</div>
	</div>

	<div style="clear: both"></div>


</body>
<!-- /body -->
<?php 
	include("partials/footer.php");
?>