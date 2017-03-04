<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/materialize.css">
		<link rel="stylesheet" type="text/css" href="assets/css/styleApropos.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="assets/js/materialize.js"></script>

		<title>Loisirs pour tous</title>
	</head>
	<body>
		<header class="row valign-wrapper">
			<figure id="logo" class="col s10">
				<a href="<?=base_url();?>">
					<img class="responsive-img" src="assets/img/LoisirsPourTous_white.svg" alt="logo"/>
				</a>
			</figure>
			<span class="col s3 push-m2 valign">
				<i class="medium material-icons white-text">home</i>
			</span>
		</header>
		<main id="homepage"  class="container">
			<section>
				<h2>Le concept</h2>
				<p>Projet réalisé en cours de formation en se basant sur des données open source nous avons décidé de créer un site web qui permet au personnes en situation de handicaps de voir si un musée et en capacités de leurs offrirs des conditions de visite optimum</p>
			</section> 
			<section>
				<h2>L'équipe</h2>
				<div class="row">
					<figure class="col s6 m3">
						<img class=" responsive-img" alt="HoudaB" src="assets/img/houda.jpg" />
						<figcaption>Alexandra N petite description si vous voulez</figcaption>
					</figure>
					<figure class="col s6 m3">
						<img class=" responsive-img" alt="HoudaB" src="assets/img/houda.jpg" />
						<figcaption>Houda B petite description si vous voulez</figcaption>
					</figure>
					<figure class="col s6 m3">
						<img class=" responsive-img" alt="HoudaB" src="assets/img/houda.jpg" />
						<figcaption>Léa L petite description si vous voulez</figcaption>
					</figure>
					<figure class="col s6 m3">
						<img class="responsive-img" alt="HoudaB" src="assets/img/houda.jpg" />
						<figcaption>Victor A petite description si vous voulez</figcaption>
					</figure>
				</div>
			</section>
			<section>
				<h2 class="center-align">Nous contacter : </h2>
				<div class="row">
				<?=form_open();?>
					<div class="row">
						<div class="input-field col s12 m3 offset-m3 ">
							<input id="last_name" type="text" class="validate">
							<label for="last_name">Nom</label>
						</div>
						<div class="input-field col s12 m3 ">
							<input id="last_name" type="text" class="validate">
							<label for="last_name">Prénom</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6 offset-m3">
							<input id="email" type="email" class="validate">
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6 offset-m3">
							<textarea id="textarea1" class="materialize-textarea"></textarea>
							<label for="textarea1">Message: </label>
						</div>
					</div>
					<button class="input-field col s6 m2 offset-s3 offset-m5 btn waves-effect waves-light center-align" type="submit" name="action">
						Submit<i class="material-icons right">send</i>
					</button>
				</form>
			</div>
		</section>
	</main>
	<footer class="page-footer">
		<div class="row">
			<div id="rs" class="col m3 push-m1">
				<a href="#">
					<svg version="1.1" id="logofb" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 600 600" enable-background="new 0 0 600 600" xml:space="preserve">
						<path id="fond" fill="#993399" d="M299.998,0C134.318,0,0,134.313,0,299.999C0,465.685,134.318,600,299.998,600	C465.695,600,600,465.685,600,299.999C600,134.313,465.695,0,299.998,0z M357.063,300.438h-36.98c0,59,0,133,0,133h-56	c0,0,0-73,0-133h-26v-47h26v-30.804c0-21.786,10.449-55.832,55.934-55.832l41.066,0.161v45.475c0,0-24.786,0-29.62,0	c-4.841,0-11.38,2.593-11.38,12.977v28.023h41.815L357.063,300.438z"/>
					</svg>
				</a>
				<a href="#">
					<svg version="1.1" id="logotwitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 600 600" enable-background="new 0 0 600 600" xml:space="preserve">
						<path id="fond" fill="#fff" d="M299.998,0C134.318,0,0,134.313,0,299.999C0,465.685,134.318,600,299.998,600	C465.695,600,600,465.685,600,299.999C600,134.313,465.695,0,299.998,0z M410.43,241.937c0.094,2.483,0.143,5.031,0.143,7.569	c0,77.197-57.285,166.186-162.081,166.186c-32.161,0-62.12-9.669-87.324-26.21c4.451,0.521,8.997,0.79,13.589,0.79	c26.683,0,51.255-9.331,70.748-25.017c-24.93-0.443-45.953-17.342-53.21-40.54c3.465,0.685,7.056,1.034,10.721,1.034	c5.205,0,10.128-0.685,14.904-2.055c-26.079-5.351-45.837-28.968-45.837-57.278v-0.719c8,4.348,16.602,7.007,25.94,7.288	c-15.302-10.473-25.289-28.363-25.289-48.616c0-10.695,2.819-20.738,7.735-29.4c28.111,35.39,70.083,58.617,117.444,61.055	c-0.986-4.278-1.475-8.72-1.475-13.299c0-32.268,25.515-58.416,56.947-58.416c16.406,0,31.209,7.081,41.59,18.426	c12.988-2.599,25.163-7.458,36.196-14.145c-4.258,13.635-13.286,25.084-25.05,32.305c11.527-1.406,22.51-4.55,32.713-9.195	C431.211,223.415,421.559,233.701,410.43,241.937z"/>
					</svg>
				</a>
			</div>
		</footer>
		<script>
			$('#textarea1').val('Votre message');
			$('#textarea1').trigger('autoresize');
		</script>
	</body>
</html>