<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Font Awesome -->
<!-- <script src="https://kit.fontawesome.com/692fbff6c4.js" crossorigin="anonymous"></script> -->
<link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Open Graph -->
<meta property="og:title" content="JFR des Lycéens" />
<meta property="og:type" content="website" />
<meta property="og:description" content="Journée Francophone de la Recherche des Lycéens" />
<meta property="og:url" content="https://www.jfrl.org" />
<meta property="og:image" content="{{ asset('img/open-graph.png') }}" />
<meta property="og:image:alt" content="JFR des Lycéens" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@jfrlyceens">
<meta name="twitter:creator" content="@jfrlyceens">
<meta name="twitter:title" content="JFR des Lycéens">
<meta name="twitter:description" content="Journée Francophone de la Recherche des Lycéens">
<meta name="twitter:image" content="{{ asset('img/open-graph.png') }}">