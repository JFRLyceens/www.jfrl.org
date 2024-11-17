@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
	@include('inc-meta')
    <title>JFRL | Inscription auditeur</title>
</head>
<body>

<div class="container mt-4 mb-5">
		<div class="row">

            <div class="col-md-1 mb-5">
				<a class="btn btn-light btn-sm" href="/inscription" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-11">

				<h1 class="m-0">Inscription auditeur</h1>
				<div class="text-monospace small">Pour assister à la JFRL, sur place ou en visioconférence.</div>


				<div class="card mt-5" style="background:none;border:none;">
					
					<div class="card-body p-0">
						<form method="POST" action="{{ route('inscription-auditeur-post') }}">
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
								<label for="email" class="col-md-3 col-form-label text-md-right text-dark text-monospace" style=";line-height:1">
									adresse courriel<sup class="text-danger">&nbsp;*</sup>
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
								<label for="affiliation" class="col-md-3 col-form-label text-md-right text-dark text-monospace">affiliation<sup class="text-danger">&nbsp;*</sup>
                                <div class="small font-italic pr-2" style="opacity:0.5">institution, établissement, organisme...</span></div>
                                </label>
								<div class="col-md-8">
									<input id="affiliation" type="text" class="form-control @error('affiliation') is-invalid @enderror" name="affiliation" value="{{ old('affiliation') }}" />
									@error('affiliation')
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
								<label for="pays" class="col-md-3 col-form-label text-md-right text-dark text-monospace">participation:<sup class="text-danger">&nbsp;*</sup></label>
								<div class="col-md-8 pt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="participation" id="sur_place" value="sur_place" 
                                            {{ old('participation') == 'sur_place' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="sur_place">
                                            sur place<br /><span class="text-monospace text-muted small">The University of Tokyo, Engineering Building 2, First floor, Room 211, Hongo 7-3-1, Bunkyo City, Tokyo 113-8654</span>
                                        </label>
                                    </div>
                                    <div class=" mt-2 form-check">
                                        <input class="form-check-input" type="radio" name="participation" id="a_distance" value="a_distance" 
                                            {{ old('participation') == 'a_distance' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="a_distance">
                                            à distance<br /><span class="text-monospace text-muted small">Le lien de la visioconférence sera envoyé à l'adresse indiquée quelques jours avant l'événement.</span>
                                        </label>
                                    </div>
								</div>
							</div>

							<div class="pt-3 form-group row">
								<label class="col-md-3 text-right"></label>
								<div class="col-md-8">

									<div class="form-check">
										<input id="checkbox1" class="form-check-input" style="cursor:pointer" type="checkbox">
										<label class="form-check-label text-monospace small text-justify pr-1 text-muted" style="padding-top:2px;"><span class="badge badge-warning small" style="padding-top:5px;">RGPD</span> J'autorise ce site à conserver les données transmises via ce formulaire. Ces données peuvent être supprimées à tout moment sur simple demande, en écrivant à contact@jfrl.org.</label>
									</div>

									<div class="form-check">
										<input id="checkbox2" class="form-check-input" style="cursor:pointer" type="checkbox" />
										<label class="form-check-label text-monospace small text-justify pr-1 text-muted" style="padding-top:2px;">
											Je confirme que mon <u>adresse courriel</u> est correcte.
										</label>
									</div>

								</div>
							</div>

							<div class="form-group row pt-2">
								<div class="col-md-8 offset-md-3">
									<button type="submit" id="inscription" class="btn btn-dark" disabled>envoyer</button>
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>
			
		</div><!-- row -->
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
