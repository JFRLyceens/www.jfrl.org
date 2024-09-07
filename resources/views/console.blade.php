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

				<div class="row mb-5">
                    <div class="col-md-12">
                        <table class="table table-borderless table-sm text-muted" style="width:0" align="center">
                            <tr>
                                <td class="text-center"><i class="fas fa-address-card"></i></td>
                                <td nowrap>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</td>
                                <td class="text-center"><i class="fas fa-school ml-5"></i></td>
								<td>{{ Auth::user()->ville }}</td>
								<td></td>
                            </tr>
                            <tr>
								<td class="text-center"><i class="fas fa-city"></i></td>
                                <td nowrap>{{ Auth::user()->etablissement }}</td>
                                <td class="text-center"><i class="fas fa-globe-americas ml-5"></i></td>
                                <td>{{ Auth::user()->pays }}</td>
								<td></td>
                            </tr>

                            <tr>
								<td class="text-center pt-3">
									@if (Auth::user()->nb_visio > 0)
										<i class="far fa-check-square fa-lg"></i>
									@else
										<i class="far fa-square fa-lg"></i>
									@endif
								</td>
								<td colspan="3" class="pt-3">
									suivi de la JFRL en visioconférence
									@if (Auth::user()->nb_visio > 0)
										<span class="text-monospace text-muted small ml-2 font-italic">[{{Auth::user()->nb_visio}} élèves]</span>
									@endif
								</td>
								<td>
									<a class="ml-5 btn btn-sm btn-dark" href="{{ route('fiche-inscription-modifier_get') }}" data-toggle="tooltip" data-placement="top" title="modifier ces informations" role="button"><i class="fas fa-pen"></i></a>
								</td>
							</tr>
                            <tr>
								<td class="text-center">
									@if (Auth::user()->nb_distanciel > 0)
										<i class="far fa-check-square fa-lg"></i>
									@else
										<i class="far fa-square fa-lg"></i>
									@endif
								</td>
								<td colspan="3">
									présentation en distanciel
									@if (Auth::user()->nb_distanciel > 0)
										<span class="text-monospace text-muted small ml-2 font-italic">[{{Auth::user()->nb_distanciel}} élèves]</span>
									@endif
								</td>
								<td></td>
							</tr>
							<tr>
								<td class="text-center">
									@if (Auth::user()->nb_presentiel > 0)
										<i class="far fa-check-square fa-lg"></i>
									@else
										<i class="far fa-square fa-lg"></i>
									@endif
								</td>
								<td colspan="3">
									présentation en présentiel
									@if (Auth::user()->nb_presentiel > 0)
										<span class="text-monospace text-muted small ml-2 font-italic">[{{Auth::user()->nb_presentiel}} élèves]</span>
									@endif
								</td>
								<td></td>
							</tr>		
                        </table>
    				</div>
    			</div>


				<div class="row pt-5 mb-5">
                    <div class="col-md-12">
						@if($presentations->isNotEmpty())

							<div class="text-center text-monospace">
								<a class="btn btn-dark btn-sm" href="/console/presentation-deposer" role="button"><i class="fas fa-file-download"></i> déposer une autre présentation</a>
							</div>

							@foreach($presentations as $presentation)

								<div class="mt-4 border rounded p-3 text-monospace bg-white">
									<div class="font-weight-bold text-uppercase text-primary">{{$presentation->title}}</div>
									<div class="mt-2"><b>Nombre d'intervenants</b>: {{$presentation->nb_intervenants}}</div>
									<div class="mt-1"><b>Type</b>: {{$presentation->type}}</div>
									<div class="mt-1"><b>Format</b>: {{$presentation->format}}</div>
									<div class="mt-1 font-weight-bold">Résumé</div>
									<div>{{$presentation->abstract}}</div>
									<div class="mt-3 font-weight-bold">Documents</div>
									<ul>
									@foreach(json_decode($presentation->documents) as $document)
										<li><a href="/storage/presentations/{{str_pad(Auth::id(), 3, '0', STR_PAD_LEFT)}}/{{$document}}" download>{{$document}}</a></li>
									@endforeach
									</ul>

									<div class="text-right mt-2" style="float:right;">
										<button class="btn btn-dark btn-sm text-light" type="button" data-toggle="collapse" data-target="#collapse_delete_{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse_delete_{{ $loop->iteration }}">supprimer</button>
										<div class="collapse" id="collapse_delete_{{ $loop->iteration }}" style="">
											<a href="/console/presentation-supprimer/{{ Crypt::encryptString($presentation->id) }}" class="mt-2 btn btn-danger btn-sm text-white" role="button">confirmer</a>
											<a class="mt-2 btn btn-light btn-sm text-dark" data-toggle="collapse" href="#collapse_delete_{{ $loop->iteration }}" role="button" aria-expanded="true" aria-controls="collapse_delete_{{ $loop->iteration }}"><i class="fa-solid fa-xmark"></i></a>
										</div>
									</div>
									<br  style="clear:both;"/>

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

</body>
</html>
