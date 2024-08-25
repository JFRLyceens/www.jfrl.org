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
