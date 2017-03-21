<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
<div class="container">
	<div class="row">
		<style>#mapid{height:500px;}td,th{padding:1%}article{border:1px solid black;margin:1%;padding:1%;}.normal{border-radius:5px;}</style>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">HandiKap</h3>
				</div><!-- .panel-heading -->
				<div class="panel-body">
					<div id="mapid" class="bloc-map"></div>
<?php foreach($data2 as $id => $data) : ?>
					<article class="normal">
						<h2><?=$data->name_est?></h2>
<?php if($data->email_contact) : ?>
						<p><b>Contact :</b> <a href="mailto:<?=$data->email_contact?>"><?=$data->email_contact?></a></p>
<?php endif;?>
<?php if($data->siteweb) : ?>
						<p><b>Site Web :</b> <a href="<?=$data->siteweb?>"><?=$data->siteweb?></a></p>
<?php endif;?>
						<p><b>Télephone :</b> <a href="tel:<?=$data->phone?>"><?=$data->phone?></a></p>
<?php if($data->fax) : ?>
						<p><b>Fax :</b> <a href="tel:<?=$data->fax?>"><?=$data->fax?></a></p>
<?php endif;?>
<?php if($data->address) : ?>
						<p><b>Adresse :</b> <?=$data->address?></p>
<?php endif;?>
					</article>
<?php endforeach?>
				</div><!-- .col-md-10 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .col-md-10 -->
</div><!-- .col-md-10 -->
<script type="text/javascript" src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<?php function geo($a,$b){
	$j = json_decode(file_get_contents("http://maps.google.com/maps/api/geocode/json?sensor=false&address=".str_replace(" ","+",$a)."%20".$b),true);
	return ($j["results"][0]["geometry"]["location"]["lat"].",".$j["results"][0]["geometry"]["location"]["lng"]);
}?>
<script type="text/javascript">
<?php foreach($data2 as $id => $data) : ?>
	var map = L.map("mapid").setView([<?=geo($data->address,$data->postcode);?>],13);

	L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={access_token}",{
		maxZoom:18,
		attribution:'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' + '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id:"mapbox.streets",
		access_token:"pk.eyJ1IjoidmljdG9yeXNoIiwiYSI6ImNpeTVzdGI4MTAwMnMyd3J2OXZ3emdkeWcifQ.T7A873FB8CceQ5KvcO943Q"
	}).addTo(map);

	L.marker([<?=geo($data->address,$data->postcode);?>]).addTo(map)
		.bindPopup("<h4><?=$data->name_est?></h4><?php if($data->email_contact) : ?><b>Contact :</b> <a href=\"mailto:<?=$data->email_contact?>\"><?=$data->email_contact?></a><br><?php endif;?><?php if($data->siteweb) : ?><b>Site Web :</b> <a href=\"<?=$data->siteweb?>\"><?=$data->siteweb?></a><br><?php endif;?><b>Phone :</b> <a href=\"tel:<?=$data->phone?>\"><?=$data->phone?></a><br><?php if($data->fax) : ?><b>Fax :</b> <a href=\"tel:<?=$data->fax?>\"><?=$data->fax?></a><br><?php endif;?><?php if($data->address) : ?><b>Adresse :</b> <?=$data->address?><?php endif;?>")
		.openPopup();
<?php endforeach;?>
</script>