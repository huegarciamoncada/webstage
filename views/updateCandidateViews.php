<?php $title = "Inscription Candidat";?>
<?php ob_start();
//foreach ($results as $result){?>
<div class="container">
  	<div class="row">
  		<div class="col-md-12">           
            <form name="inscritpion" method="post" action="/webstage/index.php/updateCandidatetoDB">
                <div class="form-group">                 
							<input type="hidden" class="form-control" id="" value="<?php echo $result['id'];?>" name="id" >
						</div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="nom"  value="<?php echo $result['nom'];?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="prenom"  value="<?php echo $result['prenom'];?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="email"  value="<?php echo $result['email'];?>">   
                    </div>           
                </div>
                <div class="form-row">
                    <div class="col">
                    <input type="password" class="form-control"  name="password"  value="<?php echo $result['password'];?>">
                    </div>           
                </div>
                
                <?php //} ?>
                <input name="update" type="submit" id="update" value="Enregister">   
            </form>
          
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>