<?php $title = "Detail Stage";?>
<?php ob_start();?>
<?php foreach ($results as $result){?>
	<div class="container">
		<div class="row"> <!--Section Titre-->
                <div class="col-md-12"> 
                	
                	<div class="row">
                		<div class="col-md-12">
                			<?php echo $result['titre'];?>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-4">
                			<?php echo $result['nom'];?>
                		</div>
                		<div class="col-md-4">
                			<?php echo $result['adresse']." ".$result['nom_ville'];?>
                		</div>
                		<div class="col-md-4">
                			<?php $date = $result['date_deposer'];
                              $date =substr($date,8,2).'-'.substr($date,5,2).'-'.substr($date,0,4);echo $date;?>
                		</div>
                	</div>
                
                    
                </div>
            </div> <!--Fin Section Titre-->
            <div class="row"><!--section detail-->
                <div class="col-md-12">
                <?php echo $result['detail'];?>
                </div>
            </div>
             <?php } ?>
            
        </div>
	</div>
	<?php $content = ob_get_clean();
include 'layout.php';?>
    