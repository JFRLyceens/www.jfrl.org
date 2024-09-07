@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | mise à jour des renseignements</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-4 mb-5">
		<div class="row">

            <div class="col-md-1 mb-5">
				<a class="btn btn-light btn-sm" href="/console" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-11 pt-2">

				@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif

                <div class="card" style="background:none;border:none;">

					<div class="card-body p-0">
						<form method="POST" action="{{ route('fiche-inscription-modifier_post') }}">
							@csrf

							<div class="form-group row">
								<label for="prenom" class="col-md-3 col-form-label text-md-right text-dark text-monospace">prénom <sup class="text-danger">*</sup></label>

								<div class="col-md-8">
									<input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom', Auth::user()->prenom) }}" autofocus>
									@error('prenom')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="nom" class="col-md-3 col-form-label text-md-right text-dark text-monospace">nom <sup class="text-danger">*</sup></label>

								<div class="col-md-8">
									<input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', Auth::user()->nom)}}" />
									@error('nom')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="titre" class="col-md-3 col-form-label text-md-right text-dark text-monospace" style="line-height:1">rôle <sup class="text-danger">*</sup><br /><span class="small font-italic" style="opacity:0.5">ex.: enseignant de xxx, proviseur, proviseur-adjoint, CPE...</span></label>
								<div class="col-md-8">
									<input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre', Auth::user()->titre) }}" />
									@error('titre')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="etablissement" class="col-md-3 col-form-label text-md-right text-dark text-monospace">établissement <sup class="text-danger">*</sup></label>
								<div class="col-md-8">
									<input id="etablissement" type="text" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" value="{{ old('etablissement', Auth::user()->etablissement) }}" />
									@error('etablissement')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

                            <div class="form-group row">
								<label for="ac_zone" class="col-md-3 col-form-label text-md-right text-dark text-monospace">académie / zone <sup class="text-danger">*</sup></label>
								<div class="col-md-8">

									<?php
									$academies = ["Aix-Marseille", "Amiens", "Besançon", "Bordeaux", "Clermont-Ferrand", "Corse", "Créteil", "Dijon", "Grenoble", "Guadeloupe", "Guyane", "La Réunion", "Lille", "Limoges", "Lyon", "Martinique", "Mayotte", "Montpellier", "Nancy-Metz", "Nantes", "Nice", "Normandie", "Orléans-Tours", "Paris", "Poitiers", "Reims", "Rennes", "Strasbourg", "Toulouse", "Versailles", "Wallis-et-Futuna", "Nouvelle-Calédonie", "Saint-Pierre-et-Miquelon", "Polynésie française"];
									$zones = ["AEFE - Afrique Australe et Orientale", "AEFE - Afrique Centrale", "AEFE - Afrique Occidentale", "AEFE - Amérique du Nord", "AEFE - Amérique Latine Rythme Nord", "AEFE - Amérique Latine Rythme Sud", "AEFE - Asie-Pacifique", "AEFE - Europe Centrale et Orientale", "AEFE - Europe du Nord-Ouest et Scandinave", "AEFE - Europe du Sud-Est", "AEFE - Europe Ibérique", "AEFE - Maghreb Est", "AEFE - Maroc", "AEFE - Proche-Orient", "AEFE - Moyen-Orient", "AEFE - Océan Indien"];
									?>
									<select id="ac_zone" name="ac_zone" class="custom-select @error('ac_zone') is-invalid @enderror">
										<option value=""></option>
										@foreach($academies as $academie)
										<option value="{{$academie}}" @if(old('ac_zone') == $academie OR Auth::user()->ac_zone == $academie) selected  @endif>{{$academie}}</option>
										@endforeach
										@foreach($zones as $zone)
										<option value="{{$zone}}" @if(old('ac_zone') == $zone OR Auth::user()->ac_zone == $zone) selected  @endif>{{$zone}}</option>
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
								<label for="ville" class="col-md-3 col-form-label text-md-right text-dark text-monospace">ville <sup class="text-danger">*</sup></label>
								<div class="col-md-8">
									<input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville', Auth::user()->ville) }}" />
									@error('ville')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

                            <div class="form-group row">
								<label for="pays" class="col-md-3 col-form-label text-md-right text-dark text-monospace">pays <sup class="text-danger">*</sup></label>
								<div class="col-md-8">
									<input id="pays" type="text" class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays', Auth::user()->pays) }}" />
									@error('pays')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

                            <div class="form-group row">
								<label for="participation" class="col-md-3 col-form-label text-md-right text-dark text-monospace" style=";line-height:1">participation <sup class="text-danger">&nbsp;</sup></label>
								<div class="col-md-8 form-inline">

									<div>
										<input id="nb_visio" type="text" style="width:75px;" class="mr-2 text-center form-control @error('nb_visio') is-invalid @enderror" name="nb_visio" value="{{ old('nb_visio', Auth::user()->nb_visio) }}" />élèves de l'établissement suivront la JFRL en visioconférence
										@error('nb_visio')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="mt-1">
										<input id="nb_distanciel" type="text" style="width:75px;" class="mr-2 text-center form-control @error('nb_distanciel') is-invalid @enderror" name="nb_distanciel" value="{{ old('nb_distanciel', Auth::user()->nb_distanciel) }}" />élèves de l'établissement feront une présentation<sup>*</sup> en distanciel
										@error('nb_distanciel')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="mt-1">
										<input id="nb_presentiel" type="text" style="width:75px;" class="mr-2 text-center form-control @error('nb_presentiel') is-invalid @enderror" name="nb_presentiel" value="{{ old('nb_presentiel', Auth::user()->nb_presentiel) }}" />élèves de l'établissement feront une présentation<sup>*</sup> en présentiel
										@error('nb_presentiel')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="mt-3 small">
										<sup>*</sup> Trois formats de présentation:
										<ul>
											<li>présentation orale courte (5 minutes)</li>
											<li>présentation orale longue (20 minutes à 2/3 élèves ou plus)</li>
											<li>poster (en présentiel seulement)</li>
										</ul>
									</div>
								</div>
							</div>							

							<div class="form-group row mb-0 pt-2">
								<div class="col-md-6 offset-md-3">
									<button type="submit" class="btn btn-dark pl-3 pr-3"><i class="fas fa-check"></i></button>
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>

		</div>

	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
