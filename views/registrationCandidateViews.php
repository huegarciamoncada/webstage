<?php $title = "Inscription Candidat";?>
<?php ob_start();?>
<div class="container">
  	<div class="row">
  		<div class="col-md-12">           
            <form name="inscritpion" method="post" action="/webstage/index.php/insertCandidate">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="nom" placeholder="Nom">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="email" placeholder="Adresse e-mail">   
                    </div>           
                </div>
                <div class="form-row">
                    <div class="col">
                    <input type="password" class="form-control"  name="password" placeholder="Mot de passe">
                    </div>           
                </div>
                <div class="form-row">
                    <div class="col">
                    <input type="password" class="form-control"  name="confirmpassword" placeholder="Confirmer le mot de passe">
                    </div>           
                </div>
                <button type="submit" class="btn btn-primary">S'enregistrer</button>    
            </form>
          
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>