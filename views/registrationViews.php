<?php $title = "Inscription";?>
<?php ob_start();?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	

            <div class="row"> <!--Section Titre-->
                <div class="col-md-12"> 
                	<h2>Créer un Compte</h2>
                </div>
            </div> <!--Fin Section Titre-->
            <div class="row"><!--section detail-->
                <div class="col-md-12">
                    _______________________________________________________________________
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <p>Choisir le type de compte:</p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <a class="btn btn-primary" href="/webstage/index.php/registrationCandidate" role="button">Candidat</a>
        	

                </div>
                <div class="col-md-6">
                <a class="btn btn-primary" href="/webstage/index.php/registrationCompany" role="button">Recruteur</a>
        	

                </div>
            </div>




        </div>
    </div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>
