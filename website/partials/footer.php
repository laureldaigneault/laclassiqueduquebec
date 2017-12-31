
	<?php
	if($action_header->sponsor_visible_count > 0) { ?>
		<div class="se-partners">
			<div class="container">

				<?php
					foreach ($action_header->sponsors as $sponsor) { 
						if($sponsor['visible'] == 1) {?>
							<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
								<a href="<?= $sponsor['url']?>" target="_blank"><img class="partner-img" src="<?= $sponsor['url_image']?>"/></a>
							</div>
					<?php
												}
											}
											?>
			</div>
		</div>
	<?php
	}?>




<!-- SCRIPTS -->
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<!--COUNTER-->	


<!-- INITIALIZATION  -->
<script type="text/javascript" src="js/freewall.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<?php
	if(!isset($isGalleryHeader) || !$isGalleryHeader){
		echo '<script type="text/javascript" src="js/navbarAnimation.js"></script>';
	}
?>

</html>

	<!--			
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.crystal-clover.ca/" target="_blank"><img class="partner-img" src="img/partners/aidabw.jpg"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://hotelbonaventure.com/en" target="_blank"><img class="partner-img" src="img/partners/bonaventure.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="mailto:info@arthurmurray.com" target="_blank"><img class="partner-img" src="img/partners/arthurmurray.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.parasuco.com/en-ca" target="_blank"><img class="partner-img" src="img/partners/parasuco.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://hftcommunications.com/fr/" target="_blank"><img class="partner-img" src="img/partners/htf.jpg"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.dancewithusottawa.com" target="_blank"><img class="partner-img" src="img/partners/dancewithus.png"/></a>
					</div>


					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.ohiostarball.com" target="_blank"><img class="partner-img" src="img/partners/ohio.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.eviactive.com/" target="_blank"><img class="partner-img" src="img/partners/evia.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.studio2720.ca" target="_blank"><img class="partner-img" src="img/partners/studio2720.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<img class="partner-img" src="img/partners/deniselefebvre.png"/>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.bobbyandsally.com" target="_blank"><img class="partner-img" src="img/partners/bobby&sally.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="https://www.supadance.ca/en/" target="_blank"><img class="partner-img" src="img/partners/supadance.png"/></a>
					</div>


					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="mailto:pouliotstephanie@me.com"><img class="partner-img" src="img/partners/stephanie.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.lauzonporsche.com/en/" target="_blank"><img class="partner-img" src="img/partners/porsche.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.lauzonaudi.com" target="_blank"><img class="partner-img" src="img/partners/audi.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.yellowpages.ca/bus/Quebec/Saint-Hubert/Trophees-Dynastie/6441533.html" target="_blank"><img class="partner-img" src="img/partners/dynastie.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.dansesportmontreal.com" target="_blank"><img class="partner-img" src="img/partners/dansesport.png"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="https://ilovedanceshoes.com" target="_blank"><img class="partner-img" src="img/partners/danceshoes.png"/></a>
					</div>


					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.designsbygalina.com" target="_blank"><img class="partner-img" src="img/partners/logo-eg_360.jpg"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.musebyyuliya.com" target="_blank"><img class="partner-img" src="img/partners/muse.jpg"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.dancesportseries.com" target="_blank"><img class="partner-img" src="img/partners/dsseries.jpg"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="https://dancecouncil.ca" target="_blank"><img class="partner-img" src="img/partners/ndc.jpg"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://www.canadiandancesportfederation.ca" target="_blank"><img class="partner-img" src="img/partners/cdf.jpg"/></a>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 partner-block">
						<a href="http://wdced.com" target="_blank"><img class="partner-img" src="img/partners/wdc.jpg"/></a>
					</div>-->


					<!-- <div class="col-xs-12 col-sm-12 col-md-12" style="height: 125px">
						<img class="partner-img" src="img/partners/assoc-bottom.jpg"/>
					</div> -->
