<nav class="navbar navbar-expand-md navbar-light">
	<div class="container mt-4">
		<div>
			<div class="text-monospace small" style="color:#c5c7c9;margin-top:-2px;">console</div>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto"></ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item dropdown">

					<a id="navbarDropdown" class="nav-link dropdown-toggle small" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->prenom }} {{ Auth::user()->nom }}<span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="navbarDropdown">
						<table class="mr-2 mb-2 text-monospace small text-muted">
							<tr>
								<td class="text-center pr-2 align-top pt-1"><i class="fas fa-school"></i></td>
								<td class="pt-1">{{ Auth::user()->etablissement }}</td>
							</tr>
							<tr>
								<td class="text-center pr-2 align-top pt-1"><i class="fas fa-at"></i></td>
								<td class="pt-1">{{ Auth::user()->email }}</td>
							</tr>
						</table>

						<a class="dropdown-item btn btn-light text-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="small text-muted">se déconnecter</span></a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>

			</ul>
		</div>
	</div>
</nav>
