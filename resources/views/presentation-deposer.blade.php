<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
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

                <form id="python_submit" method="POST" action="{{ route('presentation-deposer-post') }}" enctype="multipart/form-data">

					@csrf

                    <div class="form-group">
						<div for="title" class="text-info">TITRE <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">60 caractères maximum, sans caractères spéciaux</div>
						<input id="title" name="title" type="text" class="form-control" autofocus>
                        <div id="error_title" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>
					</div>

                    <!-- TYPE -->
                    <div class="form-group">
                        <div class="text-info">TYPE <sup class="text-danger">*</sup></div>
                        <div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="type" id="presentiel" value="presentiel">
                                <label class="custom-control-label" for="presentiel">Présentiel</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="type" id="distanciel" value="distanciel">
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
                                <input class="custom-control-input" type="radio" name="format" id="court" value="court">
                                <label class="custom-control-label" for="court">Court (5 minutes)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="format" id="long" value="long">
                                <label class="custom-control-label" for="long">Long (20 minutes) - 2 ou 3 intervenants</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="format" id="poster" value="poster">
                                <label class="custom-control-label" for="poster">Poster</label>
                            </div>
                        </div>
                        <div id="error_format" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>
                    </div> 

                    <!-- RESUME -->
                    <div class="form-group">
                        <div class="text-info">RESUMÉ <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">200 caractères minimum</div>
                        <textarea class="form-control" id="abstract" name="abstract" rows="8" required></textarea>
                        <div id="error_abstract" class="mt-1 text-danger text-monospace small" role="alert">&nbsp;</div>      
                    </div>          

                    <!-- DOCUMENTS -->
                    <div class="text-info">DOCUMENTS <sup class="text-danger">*</sup></div>
                    <div class="text-monospace text-muted small">Poster, présentation détaillée des travaux, transcription...</div>
                    <div class="text-monospace text-muted small mb-1">Quatre documents maximum de moins de 50 Mo chacun - Formats autorisés: pdf, odt, odp, svg</div>
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
                parallelUploads: 4, // use it with uploadMultiple
                maxFilesize: 50, // MB
                maxFiles: 4,
                addRemoveLinks: true,
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                acceptedFiles: ".pdf, .odt, .odp, .svg",
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

                    var regex = /^[a-zA-Z0-9\-_ ]+$/;

                    // initialisation messages erreur
                    document.getElementById('title').classList.remove('is-invalid');
                    document.getElementById('error_title').innerHTML = "&nbsp;";
                    document.getElementById('error_type').innerHTML = "&nbsp;";
                    document.getElementById('error_format').innerHTML = "&nbsp;";
                    document.getElementById('abstract').classList.remove('is-invalid');
                    document.getElementById('error_abstract').innerHTML = "&nbsp;";
                    document.getElementById('formdropzone').style.borderColor = '#2980b9';

                    if (document.getElementById('title').value.length < 3) {
                        document.getElementById('title').classList.add('is-invalid');
                        document.getElementById('error_title').innerHTML = "trois caratères minimum";
                    } else if (document.getElementById('title').value.length > 60) {
                        document.getElementById('error_title').innerHTML = "pas plus de 60 caratères";
                    } else if (regex.test(document.getElementById('title').value) == false) {
                        document.getElementById('error_title').innerHTML = "caratères autorisés: lettres, chiffres, -, _ et espaces";
                    } else if (!document.querySelector('input[name="type"]:checked')) {
                        document.getElementById('error_type').innerHTML = "faire un choix";
                    } else if (!document.querySelector('input[name="format"]:checked')) {
                        document.getElementById('error_format').innerHTML = "faire un choix"; 
                    } else if (document.getElementById('abstract').value.length < 200) {
                        document.getElementById('abstract').classList.add('is-invalid');
                        document.getElementById('error_abstract').innerHTML = "champ obligatoire (200 caractères minimum)";
                    } else if (document.getElementById('abstract').value.length > 2000) {
                        document.getElementById('abstract').classList.add('is-invalid');
                        document.getElementById('error_abstract').innerHTML = "champ obligatoire (2000 caractères maximum)";  
                    } else if (dz.files.length == 0) {
                        document.getElementById('formdropzone').style.borderColor = '#e3342f';
                        document.getElementById('error_files').innerHTML = "vous devez poser au moins un document";                         
                    } else {
                        dz.processQueue();
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
                    formData.append("type", document.querySelector('input[name="type"]:checked').value);
                    formData.append("format", document.querySelector('input[name="format"]:checked').value);
                    formData.append("abstract", document.getElementById("abstract").value);
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

</body>
</html>
