<?php $title = "Résultat Recherche";?>
<?php ob_start();?>
<div class="container">
	<div class="row"> <!--Section Titre-->
                <div class="col-md-12"> 

                    <?php foreach ($results as $result){?>
                        <div class="row">
                            <div class="col-md-8"><a href="/webstage/index.php/detail?id=<?php echo $result['id'] ?>"><?php echo $result['titre'];?></a></div>
                            <div class="col-md-4">
                                <?php $date = $result['date_deposer'];
                                    $date =substr($date,8,2).'-'.substr($date,5,2).'-'.substr($date,0,4);echo $date;?></div>                 
                        </div>
                        <div class="row">
                            <div class="col-md-8"><?php echo $result['adresse']." ".$result['nom_ville'];;?></div> <div class="col-md-4"><?php echo $result['nom'];?></div>           
                        </div>    
                        <div class="row">
                            <div class="col-md-8"><?php echo substr($result['description'],0,100);?></div><div class="col-md-4"><a href="/webstage/index.php/detail?id=<?php echo $result['id'] ?>">voir Anonce</a></div>                 
                        </div> 
                        <br>                       
                            <?php } ?>
                </div>
    </div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>
