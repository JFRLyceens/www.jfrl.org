@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
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

		<div class="row mt-5">
			<div class="col-md-12 text-center">
				<img src="{{ asset('img/logo-sciencescope.png') }}" height="60" class="pl-2 pr-2" />
				<img src="{{ asset('img/logo-lfit.png') }}" height="60" class="pl-2 pr-2" />
				<img src="{{ asset('img/logo-aefe-zap.png') }}" height="80" class="pl-2 pr-2" />
			</div>
		</div><!-- row -->

	</div><!-- container -->
	
	@include('inc-footer')
	@include('inc-bottom-js')

</body>
</html>
