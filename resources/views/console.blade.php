@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>JFRL Console</title>
    <style>
    .table-sm th, .table-sm td {padding: 0 4px 0 4px;}
    </style>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-4 mb-5">
		<div class="row">

            <div class="col-md-1 mb-5">

				<a class="btn btn-light btn-sm" href="/" role="button"><i class="fas fa-arrow-left"></i></a>

				@if (Auth::user()->is_admin == 1)
					<div class="mt-4">
						<a class=" btn btn-danger btn-sm" href="/console/admin" role="button"><i class="fas fa-shield-alt"></i></a>
					</div>
				@endif

            </div>

			<div class="col-md-11">

				<div class="row mb-5">
					<div class="col-md-12">
						<h1 class="text-center m-0" style="font-size:34px">JFRL 2024</h1>
						<div class="text-center text-secondary text-monospace small font-weight-bold">Tokyo | 13 décembre 2024</div>
					</div>
				</div>

				<?php
				$presentations = App\Models\Presentation::where('user_id', Auth::id())->get();
				?>

				<div class="row mb-3">
                    <div class="col-md-10 offset-md-1">
                        <table class="table table-sm table-borderless text-muted" style="width:0">
                            <tr>
                                <td class="text-center"><i class="fas fa-address-card"></i></td>
                                <td nowrap>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</td>
                                <td class="text-center"><i class="fas fa-school ml-3"></i></td>
								<td>{{ Auth::user()->ville }}</td>
								<td rowspan="2" class="text-right align-middle"><a class="ml-4 btn btn-sm btn-light" href="{{ route('fiche-inscription-modifier_get') }}" data-toggle="tooltip" data-placement="top" title="modifier ces informations" role="button"><i class="fas fa-pen"></i></a></td>	
                            </tr>
                            <tr>
								<td class="text-center"><i class="fas fa-city"></i></td>
                                <td nowrap>{{ Auth::user()->etablissement }}</td>
                                <td class="text-center"><i class="fas fa-globe-americas ml-3"></i></td>
                                <td>{{ Auth::user()->pays }}</td>
                            </tr>	
                        </table>
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-md-10 offset-md-1">
                        <table class="table table-borderless table-sm text-muted" style="width:0">
                            <tr>
                                <td nowrap>Nombre d'élèves qui suivront la JFRL en visioconférence</td>
                                <td>:</td>
                                <td class="text-success text-monospace font-weight-bold" nowrap>{{ Auth::user()->nb_visio }}</td>
								<td rowspan="4" class="text-right align-middle"><a class="ml-4 btn btn-sm btn-light" href="{{ route('fiche-inscription-modifier_get') }}" data-toggle="tooltip" data-placement="top" title="modifier ces informations" role="button"><i class="fas fa-pen"></i></a></td>
                            </tr>
                            <tr>
								<td nowrap>Nombre d'élèves qui feront une présentation en distanciel</td>
								<td>:</td>
                                <td class="text-success text-monospace font-weight-bold" nowrap>{{ Auth::user()->nb_distanciel }}</td>
                            </tr>

                            <tr>
								<td nowrap>Nombre d'élèves qui feront une présentation en présentiel</td>
								<td>:</td>
								<td class="text-success text-monospace font-weight-bold" nowrap>{{ Auth::user()->nb_presentiel }}</td>
							</tr>	
                        </table>


    				</div>
    			</div>

				<div class="row mb-5">
                    <div class="col-md-12">
						@if($presentations->isNotEmpty())

							<div class="text-center text-monospace">
								<a class="btn btn-dark btn-sm" href="/console/presentation-deposer" role="button"><i class="fas fa-file-download"></i> déposer une autre présentation</a>
							</div>

							@foreach($presentations as $presentation)

								<div class="mt-4 border rounded p-3 text-monospace bg-white">

									<!-- delete -->
									<div class="text-right" style="float:right">
										<button id="presentation_delete_button_{{ $loop->iteration }}" onclick="showConfirm('presentation_delete_button_{{ $loop->iteration }}', 'presentation_delete_confirm_{{ $loop->iteration }}')" class="btn btn-light btn-sm text-dark" type="button" data-toggle="tooltip" data-placement="left" title="supprimer cette présentation"><i class="fas fa-trash fa-sm"></i></button>
										<span id="presentation_delete_confirm_{{ $loop->iteration }}" style="display:none">
											<a href="/console/presentation-supprimer/{{ Crypt::encryptString($presentation->id) }}" class="btn btn-danger btn-sm text-white" role="button">confirmer</a>
											<button id="presentation_delete_cancel_{{ $loop->iteration }}" onclick="hideConfirm('presentation_delete_button_{{ $loop->iteration }}', 'presentation_delete_confirm_{{ $loop->iteration }}')" class="btn btn-light btn-sm text-dark" type="button" data-toggle="tooltip" data-placement="top" title="annuler"><i class="fa-solid fa-xmark"></i></button>
											<span class="pl-2 pr-2"><i class="fas fa-chevron-left"></i></span>
										</span>
									</div>

									<div class="font-weight-bold text-uppercase text-primary">{{$presentation->title}}</div>
									<div class="mt-1"><b>Type</b>: {{$presentation->type}}</div>
									<div class="mt-1"><b>Format</b>: {{$presentation->format}}</div>
									<div class="mt-2"><b>Nombre d'intervenants</b>: {{$presentation->nb_intervenants}}</div>
									<div class="mt-1 font-weight-bold">Intervenants</div>
									<div>{{$presentation->intervenants}}</div>
									<div class="mt-1 font-weight-bold">Encadrants</div>
									<div>{{$presentation->encadrants}}</div>
									<div class="mt-1 font-weight-bold">Résumé</div>
									<div>{{$presentation->abstract}}</div>
									
									@php
										$directory = storage_path('app/public/presentations/'.str_pad(Auth::id(), 3, '0', STR_PAD_LEFT).'/'.$presentation->jeton);
										$documents = [];
										if (File::exists($directory)) {
											$documents = File::files($directory);
										}
									@endphp

									@if (!empty($documents))
									<!-- DOCUMENTS -->
									<div class="mt-3 font-weight-bold">Documents</div>
									<div class="list-group text-monospace mt-2 mb-2">
										@foreach($documents as $document)
											<li class="list-group-item p-1">
												<a class="pl-2 align-middle" href="{{asset('/storage/presentations/'.str_pad(Auth::id(), 3, '0', STR_PAD_LEFT).'/'.$presentation->jeton.'/'.$document->getFilename())}}" download>{{$document->getFilename()}}</a>
												<!-- delete document -->
												<div class="text-right" style="float:right;">
													<button id="delete_button_{{ $presentation->id}}_{{ $loop->iteration }}" onclick="showConfirm('delete_button_{{ $presentation->id}}_{{ $loop->iteration }}', 'delete_confirm_{{ $presentation->id}}_{{ $loop->iteration }}')" class="btn btn-light btn-sm text-dark" type="button" data-toggle="tooltip" data-placement="left" title="supprimer ce document"><i class="fas fa-trash fa-sm"></i></button>
													<span id="delete_confirm_{{ $presentation->id}}_{{ $loop->iteration }}" style="display:none">
														<a href="/console/document-supprimer/{{ Crypt::encryptString($directory.'/'.$document->getFilename()) }}" class="btn btn-danger btn-sm text-white" role="button">confirmer</a>
														<button id="delete_cancel_{{ $presentation->id}}_{{ $loop->iteration }}" onclick="hideConfirm('delete_button_{{ $presentation->id}}_{{ $loop->iteration }}', 'delete_confirm_{{ $presentation->id}}_{{ $loop->iteration }}')" class="btn btn-light btn-sm text-dark" type="button" data-toggle="tooltip" data-placement="top" title="annuler"><i class="fa-solid fa-xmark"></i></button>
														<span class="pl-2 pr-2"><i class="fas fa-chevron-left"></i></span>
													</span>
												</div>
											</li>
										@endforeach
									</div>  
									@endif 

									<div class="text-center mt-4">
										<a href="/console/presentation-modifier/{{ Crypt::encryptString($presentation->id) }}" class="btn btn-light btn-sm" role="button">modifier</a>
									</div>
								</div>

							@endforeach

						@else
							<div class="text-center text-monospace">
								<a class="btn btn-dark btn-sm" href="/console/presentation-deposer" role="button"><i class="fas fa-file-download"></i> déposer une présentation</a>
							</div>
						@endif
					</div>
    			</div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

	<script>
	function showConfirm(buttonId, confirmId) {
		// Cacher le bouton delete_button et afficher delete_confirm
		document.getElementById(buttonId).style.display = 'none';
		document.getElementById(confirmId).style.display = 'inline';
	}

	function hideConfirm(buttonId, confirmId) {
		// Cacher delete_confirm et réafficher delete_button
		document.getElementById(confirmId).style.display = 'none';
		document.getElementById(buttonId).style.display = 'inline';
	}
	</script>

</body>
</html>
