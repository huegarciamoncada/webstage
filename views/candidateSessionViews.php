<?php $title = "Candidate";?>
<?php ob_start();?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
       

                    <div class="row"> <!--Section Titre-->
                        <div class="col-md-12"> 
                            <h2>Bienvenue <?php echo " ".$results['prenom']." ".$results['nom'];?> </h2>
                        </div>
                    </div> <!--Fin Section Titre-->
                    <div class="row"><!--section detail-->
                        <div class="col-md-12">
                            <form method ="post" action="/webstage/index.php/uploadCvProcess" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Votre CV</label>
                                <input type="file" class="form-control" name="cv" placeholder="CV">
                                <input type="hidden" class="form-control" name="idCandidate" value=<?=$results['id']?>>  

                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>

                            </form>
                            
                       
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                        <a class="btn btn-primary" href="/webstage/index.php/updateCandidate?id=<?php echo $results['id'] ?>" role="button">Modifier votre Compte</a>       	
                        </div>
                        <div class="col-md-6">
                        <a class="btn btn-primary" href="/webstage/index.php/deleteCandidate?id=<?php echo $results['id'] ?>" role="button"  onclick="return confirm('Vous voulez supprimer votre compte?');">Supprimer votre Compte</a>
                
                        </div>
                    </div>

             


        </div>
    </div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>