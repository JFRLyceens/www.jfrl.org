<?php
//echo 'inscriptions fermées';
//exit;
?>
@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | inscrire un établissement</title>
</head>
<body>

<div class="container mt-4 mb-5">
		<div class="row">

            <div class="col-md-1 mb-5">
				<a class="btn btn-light btn-sm" href="/" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-11">
				<div class="card" style="background:none;border:none;">
					
				<h1 class="mt-0">Inscription</h1>

					<div class="card-body p-0">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group row">
								<label for="prenom" class="col-md-3 col-form-label text-md-right text-dark text-monospace">prénom<sup class="text-danger">&nbsp;*</sup></label>

								<div class="col-md-8">
									<input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" autofocus>
									@error('prenom')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="nom" class="col-md-3 col-form-label text-md-right text-dark text-monospace">nom<sup class="text-danger">&nbsp;*</sup></label>

								<div class="col-md-8">
									<input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" />
									@error('nom')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="titre" class="col-md-3 col-form-label text-md-right text-dark text-monospace" style="line-height:1">
									rôle<sup class="text-danger">&nbsp;*</sup>
									<div class="small font-italic pr-2 pt-1" style="opacity:0.5">ex.: enseignant de xx, proviseur, proviseur-adjoint, CPE...</div>
								</label>
								<div class="col-md-8">
									<input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}" />
									@error('titre')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-md-3 col-form-label text-md-right text-dark text-monospace" style=";line-height:1">
									adresse courriel<sup class="text-danger">&nbsp;*</sup>
									<div class="small font-italic pr-2 pt-1" style="opacity:0.5">adresse profesionnelle<br />(académique, aefe...)</span></div>
								</label>
								<div class="col-md-8">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="etablissement" class="col-md-3 col-form-label text-md-right text-dark text-monospace">nom de l'établissement<sup class="text-danger">&nbsp;*</sup></label>
								<div class="col-md-8">
									<input id="etablissement" type="text" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" value="{{ old('etablissement') }}" />
									@error('etablissement')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="ac_zone" class="col-md-3 col-form-label text-md-right text-dark text-monospace">académie / zone<sup class="text-danger">&nbsp;*</sup></label>
								<div class="col-md-8">

									<?php
									$academies = ["Aix-Marseille", "Amiens", "Besançon", "Bordeaux", "Clermont-Ferrand", "Corse", "Créteil", "Dijon", "Grenoble", "Guadeloupe", "Guyane", "La Réunion", "Lille", "Limoges", "Lyon", "Martinique", "Mayotte", "Montpellier", "Nancy-Metz", "Nantes", "Nice", "Normandie", "Orléans-Tours", "Paris", "Poitiers", "Reims", "Rennes", "Strasbourg", "Toulouse", "Versailles", "Wallis-et-Futuna", "Nouvelle-Calédonie", "Saint-Pierre-et-Miquelon", "Polynésie française"];
									$zones = ["AEFE - Afrique Australe et Orientale", "AEFE - Afrique Centrale", "AEFE - Afrique Occidentale", "AEFE - Amérique du Nord", "AEFE - Amérique Latine Rythme Nord", "AEFE - Amérique Latine Rythme Sud", "AEFE - Asie-Pacifique", "AEFE - Europe Centrale et Orientale", "AEFE - Europe du Nord-Ouest et Scandinave", "AEFE - Europe du Sud-Est", "AEFE - Europe Ibérique", "AEFE - Maghreb Est", "AEFE - Maroc", "AEFE - Proche-Orient", "AEFE - Moyen-Orient", "AEFE - Océan Indien"];
									?>
									<select id="ac_zone" name="ac_zone" class="custom-select @error('ac_zone') is-invalid @enderror">
										<option value=""></option>
										@foreach($academies as $academie)
										<option value="{{$academie}}" @if(old('ac_zone') == $academie) selected  @endif>{{$academie}}</option>
										@endforeach
										@foreach($zones as $zone)
										<option value="{{$zone}}" @if(old('ac_zone') == $zone) selected  @endif>{{$zone}}</option>
										@endforeach
										<option value="autre">autre</option>
									</select>
									@error('ac_zone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="ville" class="col-md-3 col-form-label text-md-right text-dark text-monospace">ville<sup class="text-danger">&nbsp;*</sup></label>
								<div class="col-md-8">
									<input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" />
									@error('ville')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="pays" class="col-md-3 col-form-label text-md-right text-dark text-monospace">pays<sup class="text-danger">&nbsp;*</sup></label>
								<div class="col-md-8">
									<input id="pays" type="text" class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays') }}" />
									@error('pays')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-3 col-form-label text-md-right text-dark text-monospace">mot de passe<sup class="text-danger">&nbsp;*</sup></label>
								<div class="col-md-8">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password-confirm" class="col-md-3 col-form-label text-md-right text-dark text-monospace">confirmation mot de passe<sup class="text-danger">&nbsp;*</sup></label>
								<div class="col-md-8">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" />
								</div>
							</div>

							<div class="form-group row">
								<label for="password-confirm" class="col-md-3 text-right"></label>
								<div class="col-md-8">

									<div class="form-check">
										<input id="checkbox1" class="form-check-input" style="cursor:pointer" type="checkbox">
										<label class="form-check-label text-monospace small text-justify pr-1 text-muted" style="padding-top:2px;"><span class="badge badge-warning small" style="padding-top:5px;">RGPD</span> J'autorise ce site à conserver les données transmises via ce formulaire. Ces données peuvent être supprimées à tout moment en sélectionnant "supprimer ce compte" dans la console.</label>
									</div>

									<div class="form-check">
										<input id="checkbox2" class="form-check-input" style="cursor:pointer" type="checkbox" />
										<label class="form-check-label text-monospace small text-justify pr-1 text-muted" style="padding-top:2px;">
											Je confirme avoir indiqué mon <u>adresse professionnelle</u> et non pas mon adresse personnelle.
										</label>
									</div>




								</div>
							</div>

							<div class="form-group row pt-2">
								<div class="col-md-8 offset-md-3">
									<button type="submit" id="inscription" class="btn btn-dark" disabled>valider</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->

	<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox1 = document.getElementById('checkbox1');
        const checkbox2 = document.getElementById('checkbox2');
        const submitBtn = document.getElementById('inscription');

        function checkCheckboxes() {
            // Le bouton est activé seulement si les deux cases à cocher sont sélectionnées
            if (checkbox1.checked && checkbox2.checked) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        // Attacher l'événement 'change' aux checkboxes pour surveiller leur état
        checkbox1.addEventListener('change', checkCheckboxes);
        checkbox2.addEventListener('change', checkCheckboxes);
    });
	</script>

	@include('inc-bottom-js')

</body>
</html>
