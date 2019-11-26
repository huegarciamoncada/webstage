<?php $title = "List Stage";?>
<?php ob_start();?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2>Liste de stages par Entreprise</h2>
                </div>
            </div>
                <?php            
               
                    foreach ($results as $result){?>
                <div class="row">
                    <div class="col-md-3"><a href="/webstage/index.php/updateStage?id=<?php echo $result['id'] ?>"><?php echo $result['titre'];?></a></div>
                    <div class="col-md-3">
                        <?php $date = $result['date_deposer'];
                              $date =substr($date,8,2).'-'.substr($date,5,2).'-'.substr($date,0,4);echo $date;?>
                    </div>
                    <div class="col-md-3"><a class="btn btn-primary" href="/webstage/index.php/updateStage?id=<?php echo $result['id']?>" role="button">Mise à jour</a></div>
                    <div class="col-md-3"><a class="btn btn-primary" href="/webstage/index.php/deleteStage?id=<?php echo $result['id']?>" name="delete"  onclick="return confirm('Vous voulez supprimer?');" role="button">Supprimer</a></div>  
                                
                </div>
                <br>
                                
                    <?php } ?>
                    
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>
