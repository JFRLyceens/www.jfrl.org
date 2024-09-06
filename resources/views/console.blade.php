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

            <div class="col-md-2 mb-5">

				<div>
					<a class=" btn btn-light btn-sm btn-block text-left" href="/console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
				</div>

				@if (Auth::user()->is_admin == 1)
					<div class="mt-3 text-right">
						<a class=" btn btn-danger btn-sm" href="/console/admin" role="button"><i class="fas fa-shield-alt"></i></a>
					</div>
				@endif

            </div>

			<div class="col-md-10">
	
				<?php
				$presentations = App\Models\Presentation::where('user_id', Auth::id())->get();
				?>

				@if($presentations->isNotEmpty())

					<div class="text-center text-monospace">
						<a class="btn btn-dark" href="/console/presentation-deposer" role="button"><i class="fas fa-file-download"></i> déposer une autre présentation</a>
					</div>

					@foreach($presentations as $presentation)

						<div class="mt-4 border rounded p-3 text-monospace bg-white">
							<div class="h3 text-uppercase">{{$presentation->title}}</div>
							<div class="mt-2"><b>Type</b>: {{$presentation->type}}</div>
							<div class="mt-2"><b>Format</b>: {{$presentation->format}}</div>
							<div class="mt-3 font-weight-bold">Résumé</div>
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
						<a class="btn btn-dark" href="/console/presentation-deposer" role="button"><i class="fas fa-file-download"></i> déposer une présentation</a>
					</div>
				@endif



            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
