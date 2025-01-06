@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>JFRL | Inscription</title>
</head>
<body>

	<div class="container mt-4 mb-5">
		<div class="row">

            <div class="col-md-1 mb-5">
				<a class="btn btn-light btn-sm" href="/" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-11">

				<div class="row mb-5">
					<div class="col-md-12">
						<h1 class="text-center text-danger font-weight-bold m-0" style="font-size:2.8rem">JFRL 2025</h1>
						<div class="text-center text-secondary text-monospace small font-weight-bold">Tokyo | décembre 2025</div>
						<div class="mt-2 text-center text-monospace small font-weight-bold">~ inscription ~</div>
					</div>
				</div>

				<div class="row mb-5 mt-2">
					<div class="col-md-3 offset-md-3">
                        <a class="btn btn-primary btn-lg d-block" href="/auditeur" role="button">auditeur</a>
                        <div class="mt-1 text-monospace small text-justify">pour assister à la JFRL, sur place ou en visioconférence</div>
					</div>
                    <div class="col-md-3">
                        <a class="btn btn-primary btn-lg d-block" href="/register" role="button">compte enseignant</a>
                        <div class="mt-1 text-monospace small text-justify">pour inscrire des élèves comme intervenants ou auditeurs (en présentiel ou en distanciel).</div>
				    </div>
                </div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

</body>
</html>
