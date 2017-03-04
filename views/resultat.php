<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- import css -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/materialize.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/styleResult.css">

		<title>Loisirs pour tous</title>
	</head>
	<body>
		<header class="row">
			<a href="<?=base_url();?>">
				<img id="logo" src="assets/img/LoisirsPourTous_white.svg">
			</a>
		</header>
		<main>
			<div id="results">
				<div id="mapid" class="bloc-map"></div>
				<div class="bloc-list">
					<section class="list">
<?php foreach($_SESSION["data_city"] as $city) : ?>
						<div class="card grey lighten-3 " id="etbm<?=$city->id;?>">
							<article class="card-content">
								<h2 class="card-title"><?=$city->name_est;?></h2>
								<ul class="etbm-picto">
<?php if($city->h_auditory) : ?>
										<li class="auditif"><img src="assets/img/auditif.svg" alt="accès handicap auditif"/></li>
<?php endif;?>
<?php if($city->h_visual) : ?>
										<li class="visuel"><img src="assets/img/visuel.svg" alt="accès handicap visuel"/></li>
<?php endif;?>
<?php if($city->h_mobility) : ?>
										<li class="moteur"><img src="assets/img/moteur.svg" alt="accès handicap moteur"/></li>
<?php endif;?>
<?php if($city->h_mental) : ?>
										<li class="mental"><img src="assets/img/mental.svg" alt="accès handicap mental"/></li>
<?php endif;?>
								</ul>
								<p>
<?php if($city->email_contact) : ?>
									<?=$city->email_contact;?><br />
<?php endif;?>
<?php if($city->phone) : ?>
									tél : <a href="tel:<?=$city->phone;?>"><?=$city->phone;?></a>
<?php endif;?>
<?php if($city->fax) : ?>
									 | fax : <?=$city->fax;?><br />
<?php endif;?>
									<?=$city->address;?><br />
									<?=$city->postcode . " " . $city->city;?><br />
									<a href="<?=$city->siteweb;?>" target="blank"><?=$city->siteweb;?><br /></a>
								</p>
							</article>
						</div>
<?php endforeach;?>
					</div>
				</div>
			</div>
		</main>
		<footer class="row">
			<div id="rs" class="col m3 push-m1">
				<a href="#"><img id="logofb" src="assets/img/logofb-white.png" alt="logo Facebook"/></a>
				<a href="#"><img id="logotwitter" src="assets/img/logotwitter-white.png" alt="logo Twitter"/></a>
			</div>
			<div id="link" class="col m2 push-m6">
				<a href="#">A propos</a>
				<a href="#">Contact</a>
			</div>
		</footer>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
		<script type="text/javascript">
			var mymap = L.map("mapid").setView([<?=$_SESSION["data_city"][0]->latitude;?>,<?=$_SESSION["data_city"][0]->longitude;?>],13);// definition de la map avec point de coordonnées

			/*type de "tiles" pour la map, on peut en changer (skin)*/
			L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmljdG9yeXNoIiwiYSI6ImNpeTVzdGI4MTAwMnMyd3J2OXZ3emdkeWcifQ.T7A873FB8CceQ5KvcO943Q",{
				maxZoom:18,
				attribution:'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' + '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="http://mapbox.com">Mapbox</a>',
				id:'mapbox.streets'
			}).addTo(mymap);

<?php foreach($_SESSION["data_city"] as $city) : ?>
			var handiImg<?=$city->id;?>="";
<?php if($city->h_auditory) : ?>
			handiImg<?=$city->id;?>+='<img src="assets/img/auditif.svg" class="imgPop">';
<?php endif;?>
<?php if($city->h_visual) : ?>
			handiImg<?=$city->id;?>+='<img src="assets/img/visuel.svg" class="imgPop">';
<?php endif;?>
<?php if($city->h_mental) : ?>
			handiImg<?=$city->id;?>+='<img src="assets/img/mental.svg" class="imgPop">';
<?php endif;?>
<?php if($city->h_mobility) : ?>
			handiImg<?=$city->id;?>+='<img src="assets/img/moteur.svg" class="imgPop">';
<?php endif;?>
			var popup<?=$city->id;?> = L.popup({minWidth:100},{keepInView:"true"}).setContent("<a href='#etbm<?=$city->id;?>'><h5 class='card-title'><?=$city->name_est;?></h5></a>" + handiImg<?=$city->id;?>);
			var marker<?=$city->id;?> = L.marker([<?=$city->latitude;?>,<?=$city->longitude;?>]).addTo(mymap);
			marker<?=$city->id;?>.bindPopup(popup<?=$city->id;?>);

<?php endforeach;?>
		</script>
	</body>
</html>