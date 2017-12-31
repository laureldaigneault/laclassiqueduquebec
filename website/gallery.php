<?php 
	require('utils/lang.php');
	require('action/galleryAction.php');

	$action = new galleryAction();
	$action->execute();

	
	$link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $page = end($link_array);
	$isGalleryHeader = false;

    if($page == "gallery.php"){
		$isGalleryHeader = true;
    }

	include("partials/header.php");
?>

<!-- body -->

	<!-- <div class="se-header-gallery">
		<div class="container">
		</div>
	</div> -->

	<div class="se-gallery-container">
	<!-- Gallery for big quantity of photos -->
		<div class="se-gallery">
			<div id="freewall" class="free-wall"></div>
		</div>

	</div>

<?php
	foreach ($action->gallery_photos as $img) { 
		if($img['visible'] == 1) {?>
		<div id="p<?=$img['gallery_id']?>" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<img src="<?=$img['url_image']?>" class="img-responsive">
				</div>
			</div>
			</div>
		</div>
	<?php
		}
	}
?>
	



</body>
<!-- /body -->
<?php 
	include("partials/footer.php");
?>

<script type="text/javascript">
	var temp = "<div class='cell' style='width:{width}px; height: {height}px; background-image: url({gallery_url})' data-toggle='modal' data-target='#p{gallery_id}'></div>";
	var gallery_obj = <?= json_encode($action->gallery_photos) ?>;
	var w = 1, html = '';

	for (var i = 0; i < gallery_obj.length; i++) {
		if(gallery_obj[i].visible){
			w = 200 +  200 * Math.random() << 0;
			html += temp.replace(/\{height\}/g, 200).replace(/\{width\}/g, w).replace(/\{gallery_url\}/g, gallery_obj[i].url_image).replace(/\{gallery_id\}/g, gallery_obj[i].gallery_id);
		}
		
	}

	$("#freewall").html(html);

	var wall = new Freewall("#freewall");
	wall.reset({
		selector: '.cell',
		animate: false,
		cellW: 20,
		cellH: 200,
		onResize: function() {
		  wall.fitWidth();
		}
	});

	// for scroll bar appear;
	$(window).trigger("resize");
</script>