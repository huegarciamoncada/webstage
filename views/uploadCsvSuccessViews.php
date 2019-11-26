<?php $title = "Importé fichier csv";?>
<?php ob_start();?>
<div class="container">
<div class="row">
    <div class="col-md-12">
<h1>Le csv fichier est bien importé/exporté<h1>
</div>
</div>
</div>
<?php $content = ob_get_clean();
include 'layout.php';?>