<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/index.css">

		<title>Loisirs pour tous</title>
	</head>
	<body style="overflow:hidden">
		<header></header>
		<main class="container-fluid">
			<section id="handicap">
				<form id="one">
					<input type="checkbox" class="filled-in" id="filled-in-box1" name="filtres[]" value="h_auditory" />
					<label for="filled-in-box1">Auditif</label>
					<input type="checkbox" class="filled-in" id="filled-in-box2" name="filtres[]" value="h_visual"/>
					<label for="filled-in-box2">Visuel</label>
					<input type="checkbox" class="filled-in" id="filled-in-box3" name="filtres[]" value="h_mental"/>
					<label for="filled-in-box3">Mental</label>
					<input type="checkbox" class="filled-in" id="filled-in-box4" name="filtres[]" value="h_mobility"/>
					<label for="filled-in-box4">Moteur</label><br/>

					<select multiple name="test">
						<option value="volvo">Volvo</option>
						<option value="saab">Saab</option>
						<option value="mercedes">Mercedes</option>
						<option value="audi">Audi</option>
					</select>

					<input type="button" onclick="window.location='#lieux'" value="Envoyer">
				</form>
			</section>
			<section id="lieux">
				<form id="two">
					<svg id="demo" width="100%" height="100vh" viewBox="0 0 600 600"></svg>
				</form>
			</section>
			<section id="typeActivitee">
				<form id="third" method="post">
					<div id="third-div"></div>
					<input type="submit" value="Envoyer">
				</form>
			</section>
		</main>
		<footer></footer>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js"></script>
		<script type="text/javascript">
			var test = function(data){
				$.ajax({
					url:"session",
					method:"POST",
					data:"data="+data,
					success:function(){
						window.location="resultat2";
					}
				});
			}
			var div = function(reg){
				$.ajax({
					url:"send",
					method:"POST",
					data:$("#one").serialize() + "&region=" + reg + $("#third").serialize(),
					success:function(data){
						$("#third-div").html(data);
					}
				});
			};

			console.log('ok');
			var s = Snap("#demo");

			Snap.load("assets/svg/france.svg", onSVGLoaded); //chargement du SVG
			function onSVGLoaded(data) {
				var star = data.selectAll('.land'); // étoile du SVG
				star.forEach(function(elem, i) {
					elem.click(function() {
						console.log("c");
						var reg = elem.attr('data-id');
					   // setCookie('region', reg, 3);
						/*this.animate({
							fill: 'red'
						});*/
						window.location="#typeActivitee";
						div(reg);
					});
				});

				s.append(data); // ajout du svg chargé
				var grabLink = Snap.select('main .land');
				console.log(grabLink);
			}
		</script>
	</body>
</html>