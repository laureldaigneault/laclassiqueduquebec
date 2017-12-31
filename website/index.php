<?php
	require('utils/lang.php');
	require('action/indexAction.php');

	$action = new indexAction();
	$action->execute();
	
	include("partials/header.php");
?>

    <!-- CONTENT -->
	<div class="se-head" style="background-image: url(<?= $action->backgroundImageMobile['url_image_fr'] ?>)">

		<!-- main logo large -->
		<div class="main-logo-container-large" style="background-image: url('<?= $action->mainLogoLarge['url_image_'.LANG] ?>')">

		</div>

		<!-- main logo mobile -->
		<div class="main-logo-container-mobile" style="background-image: url('<?= $action->mainLogoMobile['url_image_'.LANG] ?>')">

		</div>

		<!-- header background video element -->
		<video id="video-background" preload="none" autoplay muted loop>
		  <source src="<?= $action->backgroundVideo['url_video_fr'] ?>" type="video/mp4">
		  Your browser does not support the video tag.
		</video>

		<!-- cnn news bar over the video -->
		<div class="se-cnn">
			<div id="se-cnn-info">
				<div id="se-cnn-info-p">
					<?= $action->cnnBar['value_'.LANG] ?>
				</div>
			</div>
		</div>

		<div class="cnn-rebours" style="padding-bottom: 5px; float: left; display: inline">
			<div style="padding-top: 5px; float: left; display: inline; margin-right: 10px; margin-left: 10px" >
				<img src="img/clock.png" style="height: 20px; width: 20px;"/>
			</div>
				<div id='rebour-day' class='rebour-number '>0</div> <span class="inlinee"><?= $action->countdownLabel_days[langIndex(LANG)] ?></span>
				<div id='rebour-hour' class='rebour-number force-hide'>0</div> <span class="inlinee force-hide"><?= $action->countdownLabel_hours[langIndex(LANG)] ?></span>
				<div id='rebour-minutes' class='rebour-number force-hide'>0</div> <span class="inlinee force-hide"><?= $action->countdownLabel_minutes[langIndex(LANG)] ?></span>
			</div>
		</div>
	</div>

	<?php
		if($action->babillards_visible_count > 0) { ?>
		<div class="se-bab">
			<div class="container-fluid">
				<div class="row">

					<?php
						foreach ($action->babillards as $item) { ?>

							<?php if($item['visible']){ ?>

								<?php if($item['type'] == 'url' || $item['type'] == 'page' || $item['type'] == 'pdf'){ ?>
									<a <?php if($item['type'] != 'page') echo "target='_blank'"; ?> href="<?php if($item['type'] == 'pdf') echo $item['url_pdf_'.LANG]; else echo $item['arg1_'.LANG]; ?>">
								<?php } ?>

								<div class="col-md-2 col-xs-3 bab-elem vcenter" <?php if($item['type'] == 'youtube' || $item['type'] == 'img') echo "data-toggle='modal' data-target='#babelem-".$item['babillard_id']."'"; ?>
									style="background-image: url('<?= $item['url_image_'.LANG.'_cover'] ?>')">
								</div>

								<?php if($item['type'] == 'url' || $item['type'] == 'page' || $item['type'] == 'pdf'){ ?>
									</a>
								<?php }
								} ?>

					<?php } ?>
				
				</div>
			</div>
		</div>
	<?php } ?>

	<?php
		foreach ($action->babillards as $item) { ?>
			<?php if($item['visible']){ 

				if($item['type'] == 'img'){ ?>
					<div id="babelem-<?=$item['babillard_id']?>" class="modal fade" tabindex="-1" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
									<a href="<?=$item['arg1_'.LANG]?>" target="_blank"><img style="width: 100%" src="<?=$item['url_image_'.LANG]?>"/></a>
									<?php if($item['arg3_'.LANG] != null) { ?>
										<a style="position: absolute; width: calc(100% - 40px); text-align: center; text-decoration: none; font-weight: bold; bottom: 4px;" href="<?=$item['arg3_'.LANG]?>" target="_blank"><?= $action->seeVideo[langIndex(LANG)] ?></a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>

				<?php }
				if($item['type'] == 'youtube'){ ?>
					<div id="babelem-<?=$item['babillard_id']?>" class="modal fade" tabindex="-1" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body" id="youtube-<?=$item['babillard_id']?>">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
									<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?= $item['arg1_'.LANG] ?>" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>

				<?php }
				}
			?>
<!--
			<div id="mod-bab0" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" id="if0">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
						<img style="width: 100%" src="<?= $action->babillardFullPub[0][langIndex(LANG)] ?>"/>
					</div>
				</div>
			</div>
			</div>

			<div id="mod-bab2" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" id="if2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
						<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?= $action->babillardFullPub[2][langIndex(LANG)] ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			</div>

			<div id="mod-bab3" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" id="if3" style="position: relative">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
						<a href="http://crystal.cruiselines.com/index.cfm" target="_blank"><img style="width: 100%" src="<?= $action->babillardFullPub[3][langIndex(LANG)] ?>"/></a>
						<a style="position: absolute; width: 100%; text-align: center; text-decoration: none; font-weight: bold; bottom: 4px;" href="https://www.youtube.com/watch?v=eWjyu6ql03E" target="_blank"><?= $action->seeVideo[langIndex(LANG)] ?></a>
					</div>
				</div>
			</div>
			
			</div>

			<div id="mod-bab4" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" id="if4">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
						<a href="mailto:louis.villeneuve@rbc.com"><img style="width: 100%" src="<?= $action->babillardFullPub[4][langIndex(LANG)] ?>"/></a>
					</div>
				</div>
			</div>
			</div>

			<div id="mod-bab5" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" id="if5">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
						<a href="http://gamsps.com" target="_blank"><img style="width: 100%" src="<?= $action->babillardFullPub[5][langIndex(LANG)] ?>"/></a>
					</div>
				</div>
			</div>
			</div>

			<div id="mod-bab6" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" id="if6">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
						<a href="http://www.parasuco.com/en-ca/" target="_blank"><img style="width: 100%" src="<?= $action->babillardFullPub[6][langIndex(LANG)] ?>"/></a>
					</div>
				</div>
			</div>
			</div>

			<div id="mod-bab7" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" id="if7">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
						<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?= $action->babillardFullPub[7][langIndex(LANG)] ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			</div>

			<div id="mod-bab9" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" id="if9">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px; margin-right: -18px; background-color: white; border-radius: 50px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); padding: 5px; font-size: 22px;"><span aria-hidden="true">&times;</span></button>
						<a href="http://www.hftcommunications.com" target="_blank"><img style="width: 100%" src="<?= $action->babillardFullPub[9][langIndex(LANG)] ?>"/></a>
					</div>
				</div>
			</div>
			</div>-->
	<?php 
		}
	?>


	<div class="se-hotel" style="background-image: url(<?=$action->hotelBackground['url_image_fr']?>)">
		<div class="container">
			<a href="<?= $action->hotelLink['value_'.LANG] ?>" target="_blank"><div class="hotel-logo" style="background-image: url(<?= $action->hotelLogo['url_image_'.LANG] ?>)"></div></a>
		</div>
	</div>




	<div id="se-subscribe" class="se-number">
		<div class="new-video-main-container">
			
			<iframe class="new-video-main"
				src="https://www.youtube.com/embed/<?= $action->classiqueFooterVideo['value_'.LANG] ?>?loop=1">
			</iframe>
		</div>

		<div class="container">          
			<div class="col-md-12 text-center"  style="margin-bottom: 14px">
				<h2 class="text-center"><?= $action->subscribeTitle[langIndex(LANG)] ?></h2>
			</div>
			<form id="sub-form">
				<div class="col-md-6 col-md-offset-2">
					<input class="member-input" name="sub-email" placeholder="<?= $action->subscribePlaceholder[langIndex(LANG)] ?>" type="text" name="">
				</div>
			</form>
			<div class="col-md-2">
				<a href="#!" class="lc-button2" onclick="sendEmail()"><?= $action->subscribeButton[langIndex(LANG)] ?></a>
			</div>
		</div>
	</div>



	<div id="gmapobj">
        <div id='fullWidthMap'></div>
    </div>

<?php 
	include("partials/footer.php");
	include("partials/facebook-tab.php");
?>

	<script type="text/javascript" src="js/index.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH4S4YbLOdKXpO2h4HZopHGlOWaLKBVEE&sensor=false&extension=.js"></script>

</body>
<script type="text/javascript">
    $(document).ready(function() {

		// declare weddingdate and data variables

		var weddingDate = new Date("<?= $action->countdownDate['arg1']?>"),
		years, months, days, minutes, seconds,
		//declare Dom position
		countdown = document.getElementsByClassName("rebour-number");

		// Set padding zero's to 1 number integers
		function padZero(number){
			return String("0" + number).slice(-2);
		}

		setInterval(function() {
			var now = Date.now();
			var trackTime = (weddingDate - now)/1000;

			days = parseInt(0.00001157407 * trackTime);
			hours = parseInt(((0.00001157407 * trackTime) - days) * 24);
			minutes = parseInt((((0.00001157407 * trackTime) - days) * 24 - hours) * 60);
			
			if(trackTime < 0){
				countdown[0].innerHTML = 0;
				countdown[1].innerHTML = 0;
				countdown[2].innerHTML = 0;
			} else {
				countdown[0].innerHTML = days;
				countdown[1].innerHTML = hours;
				countdown[2].innerHTML = minutes;
			}

			
		}, 1000)

        // For Customized Google Map
        google.maps.event.addDomListener(window, 'load', init);
        var map;

        function init() {
            var mapOptions = {
                center: new google.maps.LatLng(<?= $action->mapCoords['arg1']?>, <?= $action->mapCoords['arg2']?>),
                zoom: 15,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.DEFAULT,
                },
                disableDoubleClickZoom: true,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    mapTypeIds: []
                },
                scaleControl: true,
                scrollwheel: false,
                panControl: true,
                streetViewControl: true,
                draggable: true,
                overviewMapControl: true,
                overviewMapControlOptions: {
                    opened: false,
                },
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{"featureType":"administrative.locality","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text","stylers":[{"lightness":"0"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#000000"},{"visibility":"on"},{"lightness":"25"}]},{"featureType":"administrative.locality","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":"0.75"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ded7c6"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ded7c6"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"lightness":"25"},{"saturation":"-100"}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":"50"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"saturation":"-100"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"transit.line","elementType":"labels.text.fill","stylers":[{"lightness":"25"},{"saturation":"-100"}]},{"featureType":"transit.line","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"all","stylers":[{"visibility":"on"},{"hue":"#6a00ff"},{"saturation":"-100"},{"lightness":"-2"}]},{"featureType":"transit.station","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"lightness":"25"}]},{"featureType":"transit.station.airport","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.bus","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.rail","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#c3a866"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#D9BB75"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]}]
            }

            var contentString = '<p class="content-google-info"><b class="force-bold">Hôtel Bonaventure</b></br>900 Rue de la Gauchetière Ouest</br> Montréal, Québec </br> CANADA, H5A1E4</p>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                padding: 50
            });


            var mapElement = document.getElementById('fullWidthMap');
            var map = new google.maps.Map(mapElement, mapOptions);
            var icon = {
                url: "img/marker.png",
                scaledSize: new google.maps.Size(30, 55)
            };
            var marker = new google.maps.Marker({
                // Add your location here.
                position: new google.maps.LatLng(45.4993335, -73.5649466),
                map: map,
                icon: icon,
                title: 'Hôtel Bonaventure',
                animation: google.maps.Animation.BOUNCE
            });

                        infowindow.open(map, marker);

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

            google.maps.event.addListener(marker, 'click', toggleAnimation);

            function toggleAnimation() {
                if (marker.getAnimation() != null) {
                    marker.setAnimation(null);
                }
                else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }

            google.maps.event.addDomListener(window, 'resize', function() {
                map.setCenter(new google.maps.LatLng(45.4993335, -73.5649466));
            });


        }
    });
</script>


<script type="text/javascript">
    $('#mod-bab2').on('hidden.bs.modal', function () {
        $("#if2 iframe").attr("src", $("#if2 iframe").attr("src"));
    });
    $('#mod-bab7').on('hidden.bs.modal', function () {
        $("#if7 iframe").attr("src", $("#if7 iframe").attr("src"));
    });
	<?php 
		foreach ($action->babillards as $item) {
			if($item['visible']){ 
				if($item['type'] == 'youtube'){ ?>
					$('#babelem-<?=$item['babillard_id']?>').on('hidden.bs.modal', function () {
						$("#<?='youtube-'.$item['babillard_id']?> iframe").attr("src", $("#youtube<?=$item['babillard_id']?> iframe").attr("src"));
					});
				<?php }
				}
			}
		?>
</script>

<script>
	window.sr = ScrollReveal();

	sr.reveal('.se-compet',{ duration: 1500, delay: 350, distance:'0px', scale:1});

	sr.reveal('.hotel-logo', { duration: 1500, scale:0.6 });
	sr.reveal('.hotel-logo-button', { duration: 1500, scale:0.6, delay: 250});

	sr.reveal('.proudly-text', { duration: 1200, scale:1, delay:200 } );
</script>

<script>
	function sendEmail() {
		var data = $("#sub-form").serialize();
		  $.ajax({
		         data: data,
		         type: "post",
		         url: "subscribe.php"
			}).done(function(data) {
			    alert(data);
			}).fail(function(data) {
			    alert(JSON.stringify(data)); 
			});
	}
</script>