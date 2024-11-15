@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>JFRL | Inscription | Confirmation</title>
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
						<h1 class="text-center text-danger font-weight-bold m-0" style="font-size:2.8rem">JFRL 2024</h1>
						<div class="text-center text-secondary text-monospace small font-weight-bold">Tokyo | 13 décembre 2024</div>
						<div class="mt-2 text-center text-secondary text-monospace small">The University of Tokyo<br />Engineering Building 2, First floor, Room 211, Hongo 7-3-1<br />Bunkyo City, Tokyo 113-8654</div>
						<div class="mt-2 text-center text-monospace small font-weight-bold">~ inscription confirmée ~</div>
					</div>
				</div>

				<div class="text-center mb-5 mt-2">
                    Adresse fournie: <kbd>{{ Session::get('email_auditeur') }}</kbd>
                </div>

				<div class="text-center text-muted mb-5 mt-2">
                    En cas de problème, vous pouvez écrire à contact@jfrl.org
                </div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

</body>
</html>
