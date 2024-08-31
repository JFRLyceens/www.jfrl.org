@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
	<link href="https://fonts.googleapis.com/css2?family=Latin+Modern+Roman:wght@400;700&display=swap" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
	<style>
		body {
			background-color:white !important;
		}
		
		#cadre-carte {
			border-radius: 10px 50% 50% 50%; /* Haut gauche, haut droit, bas droit, bas gauche */
			border: solid 1px silver;
		}

		.titre-1 {
			font-size:2.8rem;
			line-height:3.5rem;
			text-align:right;
			font-weight:bold;
		}

		.titre-2 {
			font-size:1.5rem;
			text-align:right;
			font-weight:bold;
		}
	</style>
</head>
<body>

	<div class="container mt-4 mb-5">

		<div class="row">
			<div class="col-md-6">
				<div class="text-right mb-3">
					<a href="https://x.com/jfrlyceens" target="_blank" class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><path fill="#c0c0c0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg></a>
					<a href="https://mastodon.social/@jfrl" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><path fill="#c0c0c0" d="M433 179.1c0-97.2-63.7-125.7-63.7-125.7-62.5-28.7-228.6-28.4-290.5 0 0 0-63.7 28.5-63.7 125.7 0 115.7-6.6 259.4 105.6 289.1 40.5 10.7 75.3 13 103.3 11.4 50.8-2.8 79.3-18.1 79.3-18.1l-1.7-36.9s-36.3 11.4-77.1 10.1c-40.4-1.4-83-4.4-89.6-54a102.5 102.5 0 0 1 -.9-13.9c85.6 20.9 158.7 9.1 178.8 6.7 56.1-6.7 105-41.3 111.2-72.9 9.8-49.8 9-121.5 9-121.5zm-75.1 125.2h-46.6v-114.2c0-49.7-64-51.6-64 6.9v62.5h-46.3V197c0-58.5-64-56.6-64-6.9v114.2H90.2c0-122.1-5.2-147.9 18.4-175 25.9-28.9 79.8-30.8 103.8 6.1l11.6 19.5 11.6-19.5c24.1-37.1 78.1-34.8 103.8-6.1 23.7 27.3 18.4 53 18.4 175z"/></svg></a>
				</div>
				<div class="titre-1 text-danger">JOURNÉE FRANCOPHONE DE LA RECHERCHE</div>
				<div class="titre-2 text-dark">des lycéen(ne)s</div>	
				<div class="text-right text-secondary text-monospace small mt-3"><b>13 décembre 2024</b></div>	
				<div class="text-right text-monospace small" style="color:silver">zone asie-pacifique</div>	
				<div class="text-right mt-4">
					<a class="btn btn-primary" href="register" role="button" style="width:120px;">inscription</a>
					<br />
					<a class="btn btn-sm btn-light mt-3" href="login" role="button" style="width:120px;">se connecter</a>
				</div>	
			</div>
			<div class="col-md-6">
				<iframe id="cadre-carte" width="100%" style="aspect-ratio:1/1;" frameborder="0" allowfullscreen src="//umap.openstreetmap.fr/en/map/jfrl_1058870"></iframe>
			</div>

		</div><!-- row -->

		<div class="row mt-4">
			<div class="col-md-10 offset-md-1" style="font-family: 'Latin Modern Roman', serif;font-size:20px;text-align:justify;">
				<p>Depuis 2017, le <a href="https://www.lfitokyo.org/" target="_blank">Lycée Français International de Tokyo</a> participe à la <a href="https://www.sciencescope.org/events-2/jfr/jfr2023/" target="_blank">Journée Francophone de la Recherche (JFR)</a> organisée depuis bientôt trois décennies par <a href="https://www.sciencescope.org/" target="_blank">Sciencescope</a>, l'association des étudiants et chercheurs francophones au Japon, avec le soutien de l'<a href="http://www.ambafrance-jp.org/" target="_blank">Ambassade de France</a>, du <a href="https://tokyo.cnrs.fr/" target="_blank">CNRS</a> et de l'<a href="http://www.mfj.gr.jp/" target="_blank">Institut Français de Recherches sur le Japon - Maison Franco-Japonaise (IFRJ-MFJ)</a>. L'expérience de ces dernières années ayant été concluante, il a été décidé d'organiser, avec le soutien de l'<a href="https://www.aefe.fr/" target="_blank">AEFE</a>, une Journée Francophone de la Recherche des Lycéen(ne)s, ouverte à tous les lycées français de la zone Asie-Pacifique, le 13 décembre 2024. Cette première édition aura lieu à Tokyo.
				</p>
				L'idée est d'offrir à des lycéens la possibilité :
				<ul>
					<li>d'assister à des communications</li>
					<li>de présenter à l'oral et/ou sous forme de poster un travail de recherche solide qu'ils auront mené avec l'aide de leurs enseignants et éventuellement de chercheurs confirmés.</li>
				</ul>
				Le financement du projet permettra à des équipes de venir à Tokyo pour cette journée (selon des conditions qui sont encore à définir).
			</div>
		</div><!-- row -->

		<div class="row mt-5">
			<div class="col-md-12 text-center">
				<a href="https://www.sciencescope.org/" target="_blank"><img src="{{ asset('img/logo-sciencescope.png') }}" height="60" class="pl-2 pr-2" /></a>
				<a href="https://www.lfitokyo.org/" target="_blank"><img src="{{ asset('img/logo-lfit.png') }}" height="60" class="pl-2 pr-2" /></a>
				<a href="https://www.aefe.fr/" target="_blank"><img src="{{ asset('img/logo-aefe-zap.png') }}" height="80" class="pl-3 pr-2" /></a>
			</div>
		</div><!-- row -->

	</div><!-- container -->
	
	@include('inc-footer')
	@include('inc-bottom-js')

</body>
</html>
