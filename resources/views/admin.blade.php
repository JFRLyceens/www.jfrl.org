<?php
if (Auth::user()->is_admin != 1) {
    exit;
}
?>
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>JFR | TABLEAU DE BORD</title>
</head>
<body>

	<div class="container mt-5 mb-5">
		<div class="row">

            <div class="col-md-1">
                <a class="btn btn-light btn-sm mb-3" href="/console" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-11">
                <h1 class="m-0">TABLEAU DE BORD</h1>
            </div>

        </div><!-- /row -->

        <?php
        $etablissements = App\Models\User::where([['email_verified_at', '!=', NULL]])->get();
        $auditeurs = App\Models\Auditeur::all();
        $etablissements_sans_validation_email = App\Models\User::where([['is_admin', 0], ['nb_participants', '>', 0], ['email_verified_at', NULL], ['annulation', 0]])->get();
        ?>

        <div class="row pt-3">
            <div class="col-md-12 text-center small">
                <span style="font-weight:bold;color:#d35400">{{ App\Models\User::where([['is_orga', '!=', 1],['email_verified_at', '!=', NULL]])->count(); }}</span>
                <span class="text-monospace " style="color:silver"> enseignants inscrits</span>
                <span class="ml-3" style="font-weight:bold;color:#d35400">{{ App\Models\User::where([['is_orga', '!=', 1],['email_verified_at', '!=', NULL]])->distinct()->count('ville'); }}</span>
                <span class="text-monospace " style="color:silver"> villes</span>
                <span class="ml-3" style="font-weight:bold;color:#d35400">{{ App\Models\User::where([['is_orga', '!=', 1],['email_verified_at', '!=', NULL]])->distinct()->count('pays'); }}</span>
                <span class="text-monospace " style="color:silver"> pays</span>			
            </div>
        </div>

        <div class="row pb-5">
            <div class="col-md-12 text-center small">
                <span class="ml-3" style="font-weight:bold;color:#d35400">{{ App\Models\User::where([['is_orga', '!=', 1],['email_verified_at', '!=', NULL]])->sum('nb_visio'); }}</span>
                <span class="text-monospace " style="color:silver"> auditeurs en visio</span>
                <span class="ml-3" style="font-weight:bold;color:#d35400">{{ App\Models\User::where([['is_orga', '!=', 1],['email_verified_at', '!=', NULL]])->sum('nb_distanciel'); }}</span>
                <span class="text-monospace " style="color:silver"> intervenants en distanciel</span>
                <span class="ml-3" style="font-weight:bold;color:#d35400">{{ App\Models\User::where([['is_orga', '!=', 1],['email_verified_at', '!=', NULL]])->sum('nb_presentiel'); }}</span>
                <span class="text-monospace " style="color:silver"> intervenants en présentiel</span>
            </div>
        </div>

		<!--
        <div class="row">
            <div class="col-md-12">
                <a class="" data-toggle="collapse" href="#etablissements_sans_validation_email" role="button" aria-expanded="false" aria-controls="etablissements_sans_validation_email"><i class="fas fa-plus-square"></i></a> Enseignants sans validation d'email : {{$etablissements_sans_validation_email->count()}}
                <div class="p-3 mb-3 text-monospace small text-muted collapse" id="etablissements_sans_validation_email" style="background-color:white;border:1px silver solid;border-radius:4px;">
                    @php
                    foreach($etablissements_sans_validation_email AS $etablissement){
                        echo $etablissement->email . '; ';
                    }
                    @endphp
                </div>
            </div>
        </div>
		-->		
    
        <div class="row">
            <div class="col-md-12">
                <a class="" data-toggle="collapse" href="#etablissements_inscrits" role="button" aria-expanded="false" aria-controls="etablissements_inscrits"><i class="fas fa-plus-square"></i></a> Enseignants inscrits : {{ App\Models\User::where([['is_orga', '!=', 1],['email_verified_at', '!=', NULL]])->count(); }}
                <div class="col-md-12 p-3 text-monospace small text-muted collapse" id="etablissements_inscrits" style="background-color:white;border:1px silver solid;border-radius:4px;">
                    @php
                    foreach($etablissements AS $etablissement){
                        if ($etablissement->is_orga != 1){
                            echo $etablissement->email . '; ';
                        }
                    }
                    @endphp
                </div>
            </div>
        </div><!-- /row -->
	
		<div class="mt-5 text-monospace font-weight-bold">ADMINISTRATEURS DU SITE</div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-striped table-sm text-monospace text-muted" style="font-size:75%">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Id</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Établissement</th>
                                <th scope="col">Visio</th>
                                <th scope="col">Dist.</th>
                                <th scope="col">Prés.</th>
                                <th scope="col">Ac. / zone</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Courriel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etablissements AS $etablissement)
							@if ($etablissement->is_admin == 1)
                            <tr>
                                <td class="text-success">{{$loop->iteration}}</td>
                                <td>{{$etablissement->id}}</td>
                                <td>{{$etablissement->prenom}}</td>
                                <td>{{$etablissement->nom}}</td>
                                <td>{{$etablissement->etablissement}}</td>
                                <td>{{$etablissement->nb_visio}}</td>
                                <td>{{$etablissement->nb_distanciel}}</td>
                                <td>{{$etablissement->nb_presentiel}}</td>
                                <td>{{$etablissement->ac_zone}}</td>
                                <td>{{$etablissement->ville}}</td>
                                <td>{{$etablissement->pays}}</td>
                                <td>{{$etablissement->email}}</td>
                            </tr>
							@endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /row -->

		<div class="mt-4 text-monospace font-weight-bold">ENSEIGNANTS ENCADRANTS</div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-striped table-sm text-monospace text-muted" style="font-size:75%">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Id</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Établissement</th>
                                <th scope="col">Visio</th>
                                <th scope="col">Dist.</th>
                                <th scope="col">Prés.</th>
                                <th scope="col">Ac. / zone</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Courriel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etablissements AS $etablissement)
							@if ($etablissement->is_orga !== 1)
                            <tr>
                                <td class="text-success">{{$loop->iteration}}</td>
                                <td>{{$etablissement->id}}</td>
                                <td>{{$etablissement->prenom}}</td>
                                <td>{{$etablissement->nom}}</td>
                                <td>{{$etablissement->etablissement}}</td>
                                <td>{{$etablissement->nb_visio}}</td>
                                <td>{{$etablissement->nb_distanciel}}</td>
                                <td>{{$etablissement->nb_presentiel}}</td>
                                <td>{{$etablissement->ac_zone}}</td>
                                <td>{{$etablissement->ville}}</td>
                                <td>{{$etablissement->pays}}</td>
                                <td>{{$etablissement->email}}</td>
                            </tr>
							@endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /row -->

		<div class="mt-4 text-monospace font-weight-bold">AUDITEURS</div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-striped table-sm text-monospace text-muted" style="font-size:75%">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Id</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Affiliation</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Participation</th>
                                <th scope="col">Courriel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($auditeurs AS $auditeur)
                            <tr>
                                <td class="text-success">{{$loop->iteration}}</td>
                                <td>{{$auditeur->id}}</td>
                                <td>{{$auditeur->prenom}}</td>
                                <td>{{$auditeur->nom}}</td>
                                <td>{{$auditeur->affiliation}}</td>
                                <td>{{$auditeur->ville}}</td>
                                <td>{{$auditeur->pays}}</td>
                                <td>{{$auditeur->participation}}</td>
                                <td>{{$auditeur->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /row -->

        <div class="row">
            <div class="col-md-12 text-monospace">

                <div class="mt-4 font-weight-bold">PRÉSENTATIONS</div>

                @foreach($etablissements AS $etablissement)
				@if ($etablissement->is_orga !== 1)
				

                    @php
                        $presentations = App\Models\Presentation::where([['user_id', $etablissement->id]])->get();
                    @endphp

                    <div class="mt-3">{{$etablissement->prenom}} {{$etablissement->nom}} - {{$etablissement->etablissement}}</div>

                    @if($presentations->isNotEmpty())
                        
                        @foreach($presentations as $presentation)

                            <div class="mt-1 border rounded p-3 text-monospace bg-white small">
                                <div class="font-weight-bold text-uppercase text-primary">{{$presentation->title}}</div>
                                <div class="mt-1"><b>Nombre d'intervenants</b>: {{$presentation->nb_intervenants}}</div>
                                <div class="mt-1"><b>Type</b>: {{$presentation->type}}</div>
                                <div class="mt-1"><b>Format</b>: {{$presentation->format}}</div>
                                <div class="mt-1 font-weight-bold">Résumé</div>
                                <div>{{$presentation->abstract}}</div>
                                <div class="small text-muted mt-2">{{strlen($presentation->abstract)}} caractères</div>

                                <!-- ENCADRANTS -->
                                <div class="mt-3 font-weight-bold">Encadrants</div>
                                {!! nl2br($presentation->encadrants) !!}

                                <!-- INTERVENANTS -->
                                <div class="mt-3 font-weight-bold">Intervenants</div>
                                {!! nl2br($presentation->intervenants) !!}

                                @php
                                    $directory = storage_path('app/public/presentations/'.str_pad($etablissement->id, 3, '0', STR_PAD_LEFT).'/'.$presentation->jeton);
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
                                        </li>
                                    @endforeach
                                </div>  
                                @endif 

                            </div>                       

                        @endforeach
                    @else
                    <div class="mt-1 border rounded p-3 text-monospace bg-white small">pas de présentation déposée</div>
                    @endif
				
				@endif
                @endforeach
            </div>
        </div>

	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
