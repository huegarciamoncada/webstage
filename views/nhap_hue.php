<?php 
session_start(); // Starting Session
?>
<!DOCTYPE HTML>
<html>
  <head>
	  <meta charset="utf-8">
	  <meta content="IE=edge" http-equiv=X-UA-Compatible>
	  <meta content="width=device-width,initial-scale=1" name=viewport>

	  <title><?=$title?></title>
	  <!-- Css -->
	  <!--<link rel="stylesheet" type="text/css" href="../views/css/bootstrap.css">-->
	  
	  <link rel="stylesheet" type="text/css" href="views/css/style.css"> 
	  <link rel="stylesheet" type="text/css" href="../views/css/style.css"> 
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


  </head>
  <body>
<div class="site-header">
  <header class="container ">
    <div class="row">
        <div class="col-md-12" id="notice">
        	<!--Menu -->
			<h5><i> Ce site est un site de démonstration de mes compétences de développeuse avec des fausses annonces</i></h5>
			<h5><i> veuillez créer un compte comme une candidat ou un recruteur pour suivre</i></h5>
        </div>
    </div>
	<br>
    <div class="row">
        <div class="col-md-4">
        	<!--Logo -->
        	<a href="/webstage/index.php"><img src="http://college-soustons.fr/wp-content/uploads/2018/01/stage.png" alt="logo offres de stages" width="150" height="100"></a>
        </div>
        <div class="col-md-8" id ="search">
        	<!--Menu -->
			<?php if(isset($_SESSION['userlogin'])){?>
				
				<a class="btn btn-primary pull-right" href="/webstage/index.php/login" role="button">Déconnexion</a>
				
			<?php} 
			else { ?>
				
        	<a class="btn btn-primary pull-right" href="/webstage/index.php/login" role="button">Connexion</a>&nbsp;
        	<a class="btn btn-primary pull-right" href="/webstage/index.php/registration" role="button">Inscription</a>
		
			<?php }?>
		</div>
    </div>
	<br>
    <div class="row">
        <div class="col-md-12">
        	<form name="form1" method="post" action="/webstage/index.php/searchStage">					  
					<div class="form-row">
						<div class="col">
							<input type="textbox" class="form-control" id="" name="parmot" placeholder="Mots-clé: entreprise,métier">
						</div>
						<div class="col">
							<input type="textbox" class="form-control" id="" name="parlieu" placeholder="Lieu: ville, code postal, région">
						</div>
                	</div>
					<br>
					<div class="form-row">
						<button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
					   
			</form>
        </div>
    </div>
</header>
</div>
<div class="site-content"><?=$content?></div>
<footer>
<a href="http://huegarciamoncada.fr/webstage/index.php">Offre stage créé par Hue Thi Thanh GARCIA MONCADA</a>
</footer>
 <!-- Bibliothéque -->
 <!-- <script src="views/js/jquery-3.3.1.min.js"></script>
  <script src="views/js/bootstrap.js"></script>  -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
  </body>
</html>