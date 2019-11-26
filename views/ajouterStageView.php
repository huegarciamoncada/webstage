<?php $title = "Candidate";?>
<?php ob_start();?>

  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
		  		<form name="form1" method="post" action="/webstage/index.php/insertStage">
					  <div class="form-group">
					    <label for="metier">Métier</label>				   				                             
	    					        

					    <select class="form-control" id="sector" name="sector">
					    	<?php foreach ($results1 as $result1){ ?>      
					      <option value="<?php echo $result1['id']?>"><?php echo $result1['nom'];}?></option>
					     
					    </select>
					  </div>
					  <div class="form-group">
					    <label>Lieu</label>				   				                             
	    					        

					    <select class="form-control" id="lieu" name="lieu">
					    	<?php foreach ($results2 as $result2){ ?>      
					      <option value="<?php echo $result2['id']?>"><?php echo $result2['adresse'];}?></option>
					     
					    </select>
					  </div>

					  
					  <div class="form-group">

					    <label for="sector">Titre de stage</label>
					    <input type="textbox" class="form-control" id="" name="titre" placeholder="Titre de stage">
					  </div>
					  
					  <div class="form-group">
					    <label for="detailDeStage">Detail de stage</label>
					    <textarea class="form-control" id="detaildestage" name="detail"rows="15"></textarea>
					  </div>
					  <div class="form-group">
					  		<label for="datedeposer">Date déposer</label>
					  		<input type="date"  class="form-control" id="" name="datedeposer" />
								<input type="hidden" class="form-control" id="" name="idCompany" value="<?=$idCompany?>">
					</div>
					  <button type="submit" class="btn btn-primary">Envoyer</button>
				</form>


<!-- close balise 12, et container-->

  			</div>
  		</div>
  	</div>
		<?php $content = ob_get_clean();
include 'layout.php';?>












