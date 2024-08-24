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
				<div class="text-monospace text-center">~ en construction ~</div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
