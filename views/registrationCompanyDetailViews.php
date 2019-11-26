<?php $title = "Inscription ENtreprise";?>
<?php ob_start();?>
<div class="container">
  		<div class="row">
  			<div class="col-md-12">
		  		<form name="form1" method="post" action="/webstage/index.php/registrationCompanyDetail">
					  <div class="form-group">
					    <label for="metier">Métier</label>		    	                             
	    					        
					    <select class="form-control" id="sector" name="sector">
					    	<?php foreach ($results as $result){ ?>      
					      <option value="<?php echo $result['id']?>"><?php echo $result['nom'];}?></option>
					     
					    </select>
					  </div>
					  <div class="form-group">
					    <label>Nom</label>
					    <input type="textbox" class="form-control" id="" name="nameCompany" placeholder="Nom d'entreprise">
					  </div>			  
					  					  
					  <div class="form-group">
					    <label for="description">Description</label>
					    <textarea class="form-control" id="" name="discription"rows="15"></textarea>
					  </div>
                      <div class="form-group">
					    <label for="siteweb">Website</label>
					    <input type="textbox" class="form-control" id="" name="website" placeholder="Website">
					  </div>
					  
					  <button type="submit" class="btn btn-primary">Envoyer</button>
				</form>


<!-- close balise 12, et container-->

  			</div>
  		</div>
  	</div>

<?php $content = ob_get_clean();
include 'layout.php';?>