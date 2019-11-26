<?php $title = "Mise à jour Stage";?>
<?php ob_start();?>
<?php foreach ($results as $result){
	//$date =substr($date,6,4).'/'.substr($date,0,2).'/'.substr($date,3,2);
    $dateDeposer = returnDateMDY($result['date_deposer']);
    //echo "ngay thang".$result['date_deposer'];
	//echo $dateDeposer;	
?>
<div class="container">
  		<div class="row">
  			<div class="col-md-12">
                    <div class="row">
                		<div class="col-md-12">
                			<!--<a href="listStagebyCompany.php">Retour</a>-->
                		</div>
                	</div>
		  		<form name="formUpdateStage" method="post" action="/webstage/index.php/updateStagetoDB">				  	  
                  <div class="form-group">                 
							<input type="hidden" class="form-control" id="" value="<?php echo $result['id'];?>" name="id" >
						</div>
						<div class="form-group">                 
							<input type="hidden" class="form-control" id="" value="<?php echo $result['idsecteur'];?>" name="idsecteur" >
						</div>
						<div class="form-group">                 
							<input type="hidden" class="form-control" id="" value="<?php echo $result['idlieu'];?>" name="idlieu" >
						</div>			
					  <div class="form-group">                   

					    <label for="sector">Titre de stage</label>
					    <input type="textbox" class="form-control" id="" value="<?php echo $result['titre'];?>" name="titre" placeholder="Titre de stage">
					  </div>
					  
					  <div class="form-group">
					    <label for="detailDeStage">Detail de stage</label>
					    <textarea class="form-control" id="detaildestage" name="detail" rows="15"><?php echo $result['detail'];?></textarea>
					  </div>
					  <div class="form-group">
					  		<label for="datedeposer">Date déposer</label>
					  		<input type="date"  class="form-control" id="" name="datedeposer"  value="<?php echo $dateDeposer;?>"/>
					</div>
                    <?php } ?>
                        
					  <!--<button type="submit" class="btn btn-primary">Enregistrer</button>-->
                      <input name="update" type="submit" id="update" value="Enregister">
				</form>
                
<!-- close balise 12, et container-->


  			</div>
  		</div>
  	</div>
		<?php $content = ob_get_clean();
include 'layout.php';?>
     