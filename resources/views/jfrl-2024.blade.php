@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
	@include('inc-meta')
	<link href="https://fonts.googleapis.com/css2?family=Latin+Modern+Roman:wght@400;700&display=swap" rel="stylesheet">
    <title>JFRL 2024</title>
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
			font-size:2rem;
			text-align:right;
			font-weight:bold;
		}

		.prog_heure {
			padding:4px 10px 0px 0px;
			color:#e3342f !important;
			font-family:SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace !important;
			font-weight:bold;
			font-size:80%;
			vertical-align:top;
		}

	</style>
</head>
<body>
	<div class="container mt-4 mb-2">
		<div class="row">

            <div class="col-md-1">
				<a class="btn btn-light btn-sm" href="/" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-10">

				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-danger font-weight-bold m-0" style="font-size:2.8rem">JFRL 2024</h1>
						<div class="text-center text-secondary text-monospace small font-weight-bold">Tokyo | 13 décembre 2024</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="text-center mt-3">
		<a class="btn btn-primary" href="#programme" role="button" style="width:120px;">programme</a>
		<a class="btn btn-primary" href="#photos" role="button" style="width:120px;">photos</a>
	</div>

	<div class="text-center mt-3" style="font-family:'Latin Modern Roman',serif;font-size:20px;text-align:justify;line-height:1;">
		<a name="programme"></a>
		<h2 class="text-center text-dark font-weight-bold m-0" style="font-size:2rem">PROGRAMME</h2>
	</div>

	<div class="container-fluid mb-5">
		<div class="row">
			
			<div class="col-md-6 text-right pt-2">
				<img class="img-fluid" src="{{ asset('img/affiche_jfrl_2024.jpeg') }}" width="710" class="pr-2" />
			</div>
			<div class="col-md-6 pr-5 pt-4" style="font-family:'Latin Modern Roman',serif;font-size:20px;text-align:justify;line-height:1;">
			
				<table>
					<tr>
						<td class="prog_heure">10h00</td>
						<td class="pb-3">Ouverture / accueil</td>
					</tr>
					<tr>
					<td class="prog_heure">10h30</td>
						<td class="pb-3">Mots d'introduction</td>
					</tr>
					<tr>
					<td class="prog_heure">10h45</td>
						<td class="pb-3">
							Les escales des marins français de Tsuruga des années 1880 à la veille de la Première Guerre Mondiale.
							<br />
							<small class="text-muted">Lycée Français International de Kyoto. Projet encadré par M. Roynette</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">11h15</td>
						<td class="pb-3">Visite du campus de Hongo et d’un de ces laboratoires</td>
					</tr>
					<tr>
						<td class="prog_heure">12h00</td>
						<td class="pb-3">Pause Déjeuner</td>
					</tr>
					<tr>
						<td class="prog_heure">13h30</td>
						<td class="pb-3">
							La réception de l'art et de la culture du Japon dans la France des Années folles au prisme de la Revue franco-nipponne (1926-1930). 
							<br />
							<small class="text-muted">Lycée Français International de Tokyo. Projet encadré par M. Mastalski & M. Seguela.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">14h00</td>
						<td class="pb-3">
							Dynamique par RMN d'un fragment génomique du virus SARS-CoV-2.
							<br />
							<small class="text-muted">Lycée Français International de Tokyo. Projet encadré par M. Snoussi.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">14h10</td>
						<td class="pb-3">
							Dynamique par RMN d'un oligonucléotide riche en cytidines.
							<br />
							<small class="text-muted">Lycée Français International de Tokyo. Projet encadré par M. Snoussi.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">14h20</td>
						<td class="pb-3">
							Fernand Pujol, un résistant.
							<br />
							<small class="text-muted">Lycée René Descartes de Phnom Penh. Projet encadré par M. Besseyre.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">14h50</td>
						<td class="pb-3">
							Conférence invitée 1 - Baptiste Alric (LIMMS-CNRS/IIS)
							<br />
							<small>Explorer la vie sous pression : la biophysique en action</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">15h20</td>
						<td class="pb-3">Pause-café / posters </td>
					</tr>
					<tr>
						<td class="prog_heure">15h50</td>
						<td class="pb-3">
							La disparition des langues, de l'Antiquité à nos jours.
							<br />
							<small class="text-muted">Lycée Français International de Tokyo. Projet encadré par Mme Gademer.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">16h20</td>
						<td class="pb-3">
							Le rôle de l'écrivain Kuni Matsuo (1899-1975) dans les cercles franco-japonais dans le Paris des années 1920 et 1930.
							<br />
							<small class="text-muted">Lycée Français International de Tokyo. Projet encadré par M. Mastalski & M. Seguela.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">16h30</td>
						<td class="pb-3">
							La disparition des langues, de l'Antiquité à nos jours.
							<br />
							<small class="text-muted">Lycée Français International de Tokyo. Projet encadré par Mme Gademer.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">16h40</td>
						<td class="pb-3">
							Scientific Game Jam Tokyo 2024 - Soyons Foujita!
							<br />
							<small class="text-muted">Lycée Français International de Tokyo. Projet encadré par M. Abbal.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">16h50</td>
						<td class="pb-3">
							Scientific Game Jam Tokyo 2024 - Language defender
							<br />
							<small class="text-muted">Lycée Français International de Tokyo. Projet encadré par M. Abbal.</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">17h00</td>
						<td class="pb-3">
							Conférence invitée 2 - Naoko Hosokawa (université de Tokyo)
							<br />
							<small>Multilinguisme : Diversité linguistique et langue claire</small>
						</td>
					</tr>
					<tr>
						<td class="prog_heure">17h30</td>
						<td class="pb-3">Mots de clôture</td>
					</tr>
					<tr>
						<td class="prog_heure">17h50</td>
						<td class="pb-3">Pot convivial</td>
					</tr>
				</table>

			</div>
		</div>
	</div>

	<div class="text-center mt-3" style="font-family:'Latin Modern Roman',serif;font-size:20px;text-align:justify;line-height:1;">
		<a name="photos"></a>
		<h2 class="text-center text-dark font-weight-bold m-0" style="font-size:2rem">PHOTOS</h2>
	</div>


	<div class="container mt-4 mb-5">
		<div class="row mt-4">
			<div class="col-md-10 offset-md-1" style="font-family: 'Latin Modern Roman', serif;font-size:20px;text-align:justify;">			

			</div>
		</div><!-- row -->



	</div><!-- container -->
	
	@include('inc-bottom-js')

</body>
</html>
