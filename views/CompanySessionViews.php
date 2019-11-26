<?php $title = "Entreprise";?>
<?php ob_start();?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
       

                    <div class="row"> <!--Section Titre-->
                        <div class="col-md-12"> 
                            <h2>Bienvenue dans espace de recruteur</h2>
                        </div>
                    </div> <!--Fin Section Titre-->
                    <div class="row"><!--section detail-->
                        <div class="col-md-12">
                            <form method ="post" action="/webstage/index.php/uploadCsvProcess" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Ajouter Stage from CSV</label>
                                <input type="file" class="form-control" name="csv" placeholder="CSV">
                                <input type="hidden" class="form-control" name="idlieu" value=<?=$results['id']?>>  

                            </div>
                            <input type="submit" name="importcsv" value="Importer">

                            </form>
                            
                       
                        </div>
                    </div>
                    <br>                    
                    <div class="row">
                        <div class="col-md-6">
                        <a class="btn btn-primary" href="/webstage/index.php/exportCsvProcess" role="button">Exporter Stage -> .csv</a>
                
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-6">
                        <a class="btn btn-primary" href="/webstage/index.php/ajouterStage?id=<?php echo $results['id_entreprise'] ?>" role="button">Ajouter Stage</a>       	
                        </div>
                        <div class="col-md-6">
                        <a class="btn btn-primary" href="/webstage/index.php/listStagebyCompany?id=<?php echo $results['id_entreprise'] ?>" role="button">List Stage</a>
                
                        </div>
                    </div>

             


        </div>
    </div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>