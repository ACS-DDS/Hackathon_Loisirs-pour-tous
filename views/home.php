<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/materialize.css">
		<link rel="stylesheet" type="text/css" href="assets/css/styleIndex.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="assets/js/materialize.js"></script>

		<title>Loisirs pour tous</title>
	</head>
	<body>
		<header class="row">
			<div class="col m6" >
				<a href="<?=base_url();?>">
					<img id="logo" src="assets/img/LoisirsPourTous_purple.svg">
				</a>
			</div>
			<div class="col m6">
				<p>Envie de sortir ? </p>
				<p>Trouver en quelques clics les lieux de visites (musées, châteaux, vignobles... ) labellisés "Tourisme et Handicap".</p>
			</div>
		</header>

		<main id="homepage" class="valign-wrapper">
		<div id="block-search" class="valign">
			<?=form_open();?>
				<div class="row ">
					<div class="input-field col s12 m5">
						<input id="etablissements" type="text" name="etablissements" class="validate "	list="ListEst"/>
						<label for="etablissements">Choisissez un établissement</label>
						<datalist id="ListEst">
							{{#eList}}
							<option value="{{Name_Est}}">{{Name_Est}}</option>
							{{/eList}}
						</datalist>
					</div>
<!-- *************************  choix ville ***************************** -->
					<div id="or" class="col s12 purple-text hide-on-med-and-up">ou</div>
					<div id="orLg" class="col m2 purple-text hide-on-small-only">ou</div>
					<div class="input-field col s12 m5">
					<input id="city" class="validate " type="text" name="city" list="ListCity"/>
					<label for="city">Choisissez une ville</label>
						<datalist id="ListCity">
							{{#eList}}
							<option value="{{City}}">{{City}}</option>
							{{/eList}}
						</datalist>
					</div>
					<p>
						<input type="checkbox" class="filled-in" id="filled-in-box1" name="filtres[]" value="h_auditory" />
						<label for="filled-in-box1">Auditif</label>
						<input type="checkbox" class="filled-in" id="filled-in-box2" name="filtres[]" value="h_visual"/>
						<label for="filled-in-box2">Visuel</label>
						<input type="checkbox" class="filled-in" id="filled-in-box3" name="filtres[]" value="h_mental"/>
						<label for="filled-in-box3">Mental</label>
						<input type="checkbox" class="filled-in" id="filled-in-box4" name="filtres[]" value="h_mobility"/>
						<label for="filled-in-box4">Moteur</label>
					</p>
<!-- *************************  choix géolocalisation (inutile juste pour aider l'utilisateur dans la navigation) ***************************** -->
					<div id="or" class="col s12 hide-on-med-and-up purple-text">ou</div>
					<p id="labelGeo" class="col s12 center-align">
						<input type="checkbox" class="filled-in" id="geoLoc" />
						<label id="geoLabel" for="geoLoc">Trouver les établissements autours de moi</label>
					</p>
<!-- *************************  bouton envoyer ***************************** -->
					<button class="btn-large purple col m2 push-m5 s12 waves-effect waves-light" type="submit">Chercher</button>
					<span class="col s12 center-align black-text" id="myPosition"></span>
					<input id="Long" type="hidden" name="longitude">
					<input id="Lat" type="hidden" name="latitude">
				</div>
			</form> <!-- #search -->
		</div> <!-- #block-search -->
	</main>
	<footer class="page-footer ">
		<div class="row">
			<div id="rs" class="col m3 push-m1">
				<a href="#"><img id="logofb" src="assets/img/facebook.svg" alt="logo Facebook"/></a>
				<a href="#"><img id="logotwitter" src="assets/img/twitter.svg" alt="logo Twitter"/></a>
			</div>
			<div id="link" class="col m2 push-m6">
				<a href="about">A propos</a>
			</div>
		</div><!-- .row -->
	</footer>
	<script>
		/*--- Récupère la position GPS en live ---*/
		myPosition = document.getElementById("myPosition");

		function getCoords(position){
			document.getElementById("Long").value = position.coords.longitude;
			document.getElementById("Lat").value = position.coords.latitude;
		}

		function errorMsg(error){
			msg = {
				1:"Attention, accès à la position non autorisé par le navigateur",
				2:"Position non trouvée",
				3:"Délai expiré"
			}
			myPosition.innerHTML = msg[error.code];
		}

		if(navigator.geolocation){
			navigator.geolocation.getCurrentPosition(getCoords,errorMsg,{enableHighAccuracy:true,timeout:60*1000});
		}
		else{
			myPosition.innerHTML = "Géolocalisation non supportée par ce navigateur !";
		}
	  </script>
  </body>
</html>