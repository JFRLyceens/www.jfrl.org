<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (isset($presentation_id)){
$presentation = App\Models\Presentation::where([['user_id', Auth::id()], ['id', Crypt::decryptString($presentation_id)]])->first();
}
?>
@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <link href="{{ asset('css/dropzone-basic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <title>Dépôt présentation</title>
</head>
<body>

	<div class="container pt-5 mb-5">
		<div class="row">

            <div class="col-md-2">
                <a class="btn btn-light btn-sm mb-4" href="/console" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-10">

                <h1 class="mt-0">PRÉSENTATION</h1>

                <form id="presentation_form" method="POST" action="{{ route('presentation-deposer-post') }}" enctype="multipart/form-data">

					@csrf

                    <!-- TITRE -->
                    <div class="form-group">
						<div for="title" class="text-info">TITRE <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">160 caractères maximum, sans caractères spéciaux</div>
						<input id="title" name="title" type="text" class="form-control" @if(isset($presentation)) value="{{$presentation->title}}" @endif autofocus>
                        <div id="error_title" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>
					</div>


                    <!-- TYPE -->
                    <div class="form-group">
                        <div class="text-info">TYPE <sup class="text-danger">*</sup></div>
                        <div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="type" id="presentiel" value="presentiel" @if(isset($presentation) AND $presentation->type == 'presentiel') checked @endif>
                                <label class="custom-control-label" for="presentiel">Présentiel</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="type" id="distanciel" value="distanciel" @if(isset($presentation) AND $presentation->type == 'distanciel') checked @endif>
                                <label class="custom-control-label" for="distanciel">Distanciel</label>
                            </div>
                        </div>
                        <div id="error_type" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>
                    </div> 


                    <!-- FORMAT -->
                    <div class="form-group">
                        <div class="text-info">FORMAT <sup class="text-danger">*</sup></div>
                        <div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="format" id="court" value="court" @if(isset($presentation) AND $presentation->format == 'court') checked @endif>
                                <label class="custom-control-label" for="court">Court (5 minutes de présentation + 5 minutes de questions)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="format" id="long" value="long" @if(isset($presentation) AND $presentation->format == 'long') checked @endif>
                                <label class="custom-control-label" for="long">Long (20 minutes de présentation + 10 minutes de questions) - 2 intervenants ou plus</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="format" id="poster" value="poster" @if(isset($presentation) AND $presentation->format == 'poster') checked @endif>
                                <label class="custom-control-label" for="poster">Poster</label>
                            </div>
                        </div>
                        <div id="error_format" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>
                    </div> 


                    <!-- NB INTERVENANTS -->
                    <div class="form-group">
						<div for="nb_intervenants" class="text-info">NOMBRE D'INTERVENANTS <sup class="text-danger">*</sup></div>
                        <select id="nb_intervenants" name="nb_intervenants" class="custom-select" style="width:80px">
                            @for ($n = 1; $n <= 8; $n++) {
                                <option value="{{$n}}" @if(isset($presentation) AND $presentation->nb_intervenants == $n) selected @endif>{{$n}}</option>
                            @endfor
                        </select>
                        <div>&nbsp;</div>
					</div>  

                    <!-- INTERVENANTS -->
                    <div class="form-group">
                        <div class="text-info">INTERVENANTS <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small">Par ligne: Nom, Prénom, Age, Niveau (seconde, première ou terminale)</div>
                        <div class="text-monospace text-success small mb-1">Pour chaque intervenant mineur, déposer une "Autorisation parentale d'enregistrement et d'utilisation
                        de l'image/la voix'.</div>
                        <textarea class="form-control" id="intervenants" name="intervenants" rows="4" required>@if(isset($presentation)){{$presentation->intervenants}}@endif</textarea>
                        <div id="error_intervenants" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>      
                    </div> 


                    <!-- ENCADRANTS -->
                    <div class="form-group">
                        <div class="text-info">ENCADRANTS <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">Par ligne: Nom, Prénom, Matière, Courriel</div>
                        <textarea class="form-control" id="encadrants" name="encadrants" rows="4" required>@if(isset($presentation)){{$presentation->encadrants}}@endif</textarea>
                        <div id="error_encadrants" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>      
                    </div> 

                    <!-- RESUME -->
                    <div class="form-group">
                        <div class="text-info">RESUMÉ <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">500 ~ 2500 caractères</div>
                        <textarea class="form-control" id="abstract" name="abstract" rows="10" required>@if(isset($presentation)) {{$presentation->abstract}} @endif</textarea>
                        <div id="error_abstract" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>      
                    </div>          

                    <!-- DOCUMENTS -->
                    <div class="text-info">DOCUMENTS</div>
                    @if(!isset($presentation))
                    <div class="text-monospace text-muted small font-italic">Vous pouvez ajouter des documents plus tard</div>
                    @endif
                    <div class="text-monospace text-muted small">Poster, présentation détaillée des travaux, transcription, autorisation parentale d'enregistrement et d'utilisation de l'image/la voix...</div>
                    <div class="text-monospace text-muted small mb-1">Douze documents maximum de moins de 20 Mo chacun - Formats autorisés: pdf, odt, docx, svg, png, jpg, jpeg</div>
                    
                    @if(isset($presentation))

                        @php
                            $directory = storage_path('app/public/presentations/'.str_pad(Auth::id(), 3, '0', STR_PAD_LEFT).'/'.$presentation->jeton);
                            $documents = [];
                            $nb_documents = 0;
                            if (File::exists($directory)) {
                                $documents = File::files($directory);
                                $nb_documents = count($documents);
                            }
                        @endphp

                        @if (!empty($documents))
                        <!-- DOCUMENTS -->
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
                            <div class="mt-2 text-monospace text-muted small">Déposer d'autres documents.</div>
                        </div>  
                        @endif  
                        
                        <input id="presentation_id" type="hidden" name="presentation_id" value="{{Crypt::encryptString($presentation->id)}}" />

                    @endif

                    <div id="formdropzone" class="dropzone"></div>
                    <div id="error_files" class="mt-1 text-danger text-monospace small">&nbsp;</div>

					<button type="submit" id="submit_request" class="btn btn-primary mt-2 pl-4 pr-4"><i class="fas fa-check"></i></button>

				</form>

			</div>

		</div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')
    <script src="{{ asset('js/dropzone.js') }}"></script>

    <script>
        // disable auto discover
        Dropzone.autoDiscover = false;
        // init dropzone on id (form or div)
        document.addEventListener("DOMContentLoaded", function() {
            var formdropzone = new Dropzone("#formdropzone", {
                url: "{{ route('presentation-deposer-post') }}",
                paramName: "documents",
                autoProcessQueue: false,
                uploadMultiple: true, // uplaod files in a single request
                parallelUploads: 12, // use it with uploadMultiple
                maxFilesize: 20, // MB
                maxFiles: @if(isset($presentation)) {{12-$nb_documents}} @else 12 @endif,
                addRemoveLinks: true,
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                acceptedFiles: ".pdf, .odt, .docx, .svg, .png, .jpg, .jpeg",
                // Language Strings
                dictFileTooBig: "Ce fichier est trop lourd. 10 Mo max.",
                dictInvalidFileType: "format non valide",
                dictCancelUpload: "annuler",
                dictRemoveFile: "supprimer",
                dictMaxFilesExceeded: "quatre documents au maximum",
                dictDefaultMessage: "glisser-déposer ici ou <span class='btn btn-outline-dark btn-sm'>parcourir</span>",
            });
        });
        Dropzone.options.formdropzone = {
            // The setting up of the dropzone
            init: function() {
                dz = this; // Makes sure that 'this' is understood inside the functions below.

                // for Dropzone to process the queue (instead of default form behavior):
                document.getElementById("submit_request").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();

                    //var regex = /^[\p{L}0-9\s\-_.,!?()@#&%$'"]+$/u;

                    // initialisation messages erreur
                    document.getElementById('title').classList.remove('is-invalid');
                    document.getElementById('error_title').innerHTML = "&nbsp;";
                    document.getElementById('error_type').innerHTML = "&nbsp;";
                    document.getElementById('error_format').innerHTML = "&nbsp;";
                    document.getElementById('error_intervenants').innerHTML = "&nbsp;";
                    document.getElementById('error_encadrants').innerHTML = "&nbsp;";
                    document.getElementById('error_abstract').innerHTML = "&nbsp;";
                    document.getElementById('intervenants').classList.remove('is-invalid');
                    document.getElementById('encadrants').classList.remove('is-invalid');
                    document.getElementById('abstract').classList.remove('is-invalid');

                    document.getElementById('formdropzone').style.borderColor = '#2980b9';

                    if (document.getElementById('title').value.length < 3) {
                        document.getElementById('title').classList.add('is-invalid');
                        document.getElementById('error_title').innerHTML = "trois caratères minimum";
                    } else if (document.getElementById('title').value.length > 160) {
                        document.getElementById('error_title').innerHTML = "pas plus de 160 caratères";
                    //} else if (regex.test(document.getElementById('title').value) == false) {
                    //    document.getElementById('error_title').innerHTML = "caratères spéciaux non autorisés";
                    } else if (!document.querySelector('input[name="type"]:checked')) {
                        document.getElementById('error_type').innerHTML = "faire un choix";
                    } else if (!document.querySelector('input[name="format"]:checked')) {
                        document.getElementById('error_format').innerHTML = "faire un choix"; 
                    } else if (document.getElementById('intervenants').value.length < 1) {
                        document.getElementById('intervenants').classList.add('is-invalid');
                        document.getElementById('error_intervenants').innerHTML = "champ obligatoire)";
                    } else if (document.getElementById('encadrants').value.length < 1) {
                        document.getElementById('encadrants').classList.add('is-invalid');
                        document.getElementById('error_encadrants').innerHTML = "champ obligatoire";
                    } else if (document.getElementById('abstract').value.length < 500) {
                        document.getElementById('abstract').classList.add('is-invalid');
                        document.getElementById('error_abstract').innerHTML = document.getElementById('abstract').value.length + " caractères (500 minimum)";
                    } else if (document.getElementById('abstract').value.length > 2500) {
                        document.getElementById('abstract').classList.add('is-invalid');
                        document.getElementById('error_abstract').innerHTML = document.getElementById('abstract').value.length + " caractères  (2500 maximum)";                         
                    } else {
                        // Si aucun fichier dans Dropzone
                        if (dz.files.length === 0) {
                            // No files added, submit the form data without files
                            document.getElementById('presentation_form').submit();
                        } else {
                            // Si des fichiers sont présents, uploader avec Dropzone
                            dz.processQueue();
                        }
                    }
                });

                this.on("removedfile", function(file) {
                    document.getElementById('error_files').innerHTML = '&nbsp;';
                });

                this.on("addedfile", function(file) {
                    document.getElementById('error_files').innerHTML = '&nbsp;';
                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {
                    formData.append("title", document.getElementById("title").value);
                    formData.append("nb_intervenants", document.getElementById("nb_intervenants").value);
                    formData.append("type", document.querySelector('input[name="type"]:checked').value);
                    formData.append("format", document.querySelector('input[name="format"]:checked').value);
                    formData.append("intervenants", document.getElementById("intervenants").value);
                    formData.append("encadrants", document.getElementById("encadrants").value);
                    formData.append("abstract", document.getElementById("abstract").value);
                    @if(isset($presentation)) formData.append("presentation_id", document.getElementById("presentation_id").value); @endif
                });
                this.on("successmultiple", function(files, response) {
                    console.log('success sending');
                    console.log('success: '+JSON.stringify(response));
                    window.location = "/console";
                });
                this.on("errormultiple", function(files, response) {
                    console.log('error sending');
                    console.log('error: '+JSON.stringify(response));
                });

            }
        };
    </script>

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
