<?php
function connectDB(){
    $user ='student';
$pass = 'Mot_de_pass123';

$pdo = new PDO('mysql:host=localhost;dbname=Offre_stage;charset=utf8', $user, $pass);
return $pdo;

}

function getListStage(){
    $user ='student';
    $pass = 'Mot_de_pass123';

//$pdo = new PDO('mysql:host=huegarcisr328.mysql.db;dbname=huegarcisr328;charset=utf8', $user, $pass);
try {
    $pdo = new PDO('mysql:host=huegarcisr328.mysql.db;dbname=huegarcisr328;charset=utf8', $user, $pass);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

//preparation requete sql en texte
$sql= "SELECT Stage.id,Stage.titre, Stage.detail,Lieu.adresse,Stage.date_deposer,Entreprise.nom,Entreprise.description,Ville.nom AS nom_ville   
FROM Stage                                                       
INNER JOIN Lieu ON Lieu.id = Stage.idlieu
INNER JOIN Entreprise ON Entreprise.id = Lieu.id_entreprise
INNER JOIN Ville ON Lieu.id_ville = Ville.id";
//transformer en vrai requete preparer
$statement = $pdo->prepare($sql);
//bindvalue
//execution
$statement->execute();
//fetchall
$results = $statement->fetchAll();
//fermer la connexion
$pdo = null;
//renvoyer les donnees
return $results;
}
function getStagebyid($id){
	$databasehandler=connectDB();
	$sqlquery = "SELECT Stage.id,Stage.titre, Stage.idsecteur,Stage.idlieu, Stage.detail,Lieu.adresse,Stage.date_deposer,Entreprise.nom,Entreprise.description,Ville.nom AS nom_ville 
    FROM Stage                                                       
    INNER JOIN Lieu ON Lieu.id = Stage.idlieu
    INNER JOIN Entreprise ON Entreprise.id = Lieu.id_entreprise
    INNER JOIN Ville ON Lieu.id_ville = Ville.id
    WHERE Stage.id='".$id."'";
	$statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
    $results = $statement->fetchAll();
    return $results;
}
function getSecteur(){
    $databasehandler=connectDB();
    $sqlquery = "SELECT id, nom FROM Secteur";
    $statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
    $results = $statement->fetchAll();
    return $results;
    // fermer la connexion
    $databasehandler = null;  
}
function getLieu($idCompany){
    $databasehandler=connectDB();
    $sqlquery = "SELECT * FROM Lieu WHERE id_entreprise='".$idCompany."'";  
    $statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
    $results = $statement->fetchAll();
    return $results;
    // fermer la connexion
    $databasehandler = null;  
}

function insertStagetoDB($secteur,$titre,$detail,$date,$lieu){
   /* $databasehandler=connectDB();
    $sqlquery="INSERT INTO Stage(idsecteur,titre,detail,date_deposer,idlieu) 
    VALUES('".$secteur."','".$titre."','".$detail."','".$date."','".$lieu."')";
    $statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
    $results = $statement->fetchAll();
    return $results;
    // fermer la connexion
    $databasehandler = null;  */
    //se connecter à la bdd
    $pdo = connectDB();
    //preparer une requete insert au format texte
    $sql = "INSERT INTO Stage(idsecteur,titre,detail,date_deposer,idlieu) 
    VALUES (:secteur, :titre, :detail, :date_deposer,:idlieu); ";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':secteur', $secteur);
    $stm->bindValue(':titre', $titre);
    $stm->bindValue(':detail', $detail);
    $stm->bindValue(':date_deposer', $date);
    $stm->bindValue(':idlieu', $lieu);
    $stm->execute();
    //echo "goi ham insert";
}
function listStagebyCompany($idCompany){
	$databasehandler=connectDB();
	$sqlquery="SELECT Stage.id,Stage.titre, Stage.detail,Stage.date_deposer 
			   FROM Stage 
			   INNER JOIN Lieu  ON Stage.idlieu = Lieu.id
			   INNER JOIN Entreprise ON Entreprise.id = Lieu.id_entreprise			   
			   WHERE Entreprise.id = '".$idCompany."'";
	$statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
	$results = $statement->fetchAll();
    //echo $idCompany;
    $databasehandler=null;
    return $results;
}
function getStagebyidtoUpdate($id){
	/*$databasehandler=connectDB();
	$sqlquery = "SELECT *
				FROM Stage                                                     
				WHERE Stage.id='".$id."'";
	$statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
    return $statement->fetchAll();*/
    //connexion bdd
    $pdo = connectDB();
    //preparation requete sql en texte
    $sql = "SELECT * FROM Stage WHERE id=:id;";
    //transformer en vrai requete preparer
    $statement = $pdo->prepare($sql);
    //bindvalue
    $statement->bindValue(':id', $id, PDO::PARAM_INT); 
    //execution
    $statement->execute();
    //fetchall
    $result = $statement->fetch();
    //fermer la connexion 
    $pdo = null;
    //renvoyer les données
    return $result;
}
/*function updateStagetoDB($id,$idsecteur,$titre,$detail,$dateDeposer,$idlieu){
	$databasehandler=connectDB(); 
	$sqlquery= "UPDATE Stage 
			SET id ='".$id."',idsecteur='".$idsecteur."',titre='".$titre."',detail='".$detail."',date_deposer='".$dateDeposer."',idlieu ='".$idlieu."' 
			WHERE Stage.id='".$id."'";
	$statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
	//return $statement->fetchAll();
    

}*/
function updateStagetoDB($id,$idsecteur,$titre,$detail,$dateDeposer,$idlieu){
	$pdo=connectDB(); 
	$sql= "UPDATE Stage 
			SET id =:id,idsecteur = :idsecteur,titre=:titre,detail=:detail,date_deposer=:dateDeposer,idlieu =:idlieu
			WHERE Stage.id=:id";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':id', $id, PDO::PARAM_INT); 
    $stm->bindValue(':idsecteur', $idsecteur);// :lili pas besoin exactment comme le nom de la champ
    $stm->bindValue(':titre', $titre);
    $stm->bindValue(':detail', $detail);
    $stm->bindValue(':dateDeposer', $dateDeposer);
    $stm->bindValue(':idlieu', $idlieu);
    $stm->execute();

}
function returnDateMDY($dateYMD){
	$date = new DateTime($dateYMD);
	//$date->format('Y-m-d');
	return $date->format('Y-m-d');

}
function deleteStagebyid($id){
	$databasehandler=connectDB(); 
	$sqlquery= "DELETE FROM Stage WHERE Stage.id='".$id."'";
	$statement = $databasehandler->prepare($sqlquery);	                                        
    $statement->execute();
    
}
function getCandidate($email,$password){
    $pdo = connectDB();
    //preparation requete sql en texte
    $sql = "SELECT * FROM Candidat WHERE email=:mail AND password= :pass;";
    //transformer en vrai requete preparer
    $statement = $pdo->prepare($sql);
    //bindvalue
    $statement->bindValue(':mail', $email); 
    $statement->bindValue(':pass', $password); 
    //execution
    $statement->execute();
    //fetchall
    $result = $statement->fetch();
    //fermer la connexion 
    $pdo = null;
    //renvoyer les données
    return $result;

}
function insertCvToDB($idCandidate,$pathCV){
    $pdo = connectDB();
    $sql = "UPDATE Candidat
            SET cv = :cv
            WHERE id = :id";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':id', $idCandidate, PDO::PARAM_INT); 
    $stm->bindValue(':cv', $pathCV);
    $stm->execute();
    
}
function insertCandidatetoDB($resultat){
	$databasehandler=connectDB();
	//$sqlquery="INSERT INTO Candidat(cv,nom,prenom,email,password) VALUES('-','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['email']."','".$_POST['password']."')";
	$sqlquery="INSERT INTO Candidat(cv,nom,prenom,email,password) 
    VALUES('-','".$resultat['nom']."','".$resultat['prenom']."','".$resultat['email']."','".$resultat['password']."')";
	$statement = $databasehandler->prepare($sqlquery);	                                        
    $statement->execute();
    
	//return $statement->fetchAll();
	//echo $resultat['nom']." ".$resultat['prenom']." ".$resultat['email']." ".$resultat['password'];
 
}
function insertCompanytoDB($resultat){
    /*$databasehandler=connectDB();
    $sqlquery="INSERT INTO Entreprise(idsecteur,nom,description,siteweb,fondee) 
    VALUES('".$resultat['sector']."','".$resultat['nameCompany']."','".$resultat['discription']."','".$resultat['website']."','-')";
     $sqlquery = "INSERT INTO Lieu(nom,prenom,adresse,id_ville,id_entreprise,email,password) 
    VALUES('-','-','".$resultat['adresse']."','-','".LAST_INSERT_ID()."','".$resultat['email']."','".$resultat['password']."')";
    
    $sqlquery="INSERT INTO Entreprise(idsecteur,nom,description,siteweb,fondee) 
    VALUES('".$resultat['sector']."','".$resultat['nameCompany']."','".$resultat['discription']."','".$resultat['website']."','-');
    INSERT INTO Lieu(nom,prenom,adresse,id_ville,id_entreprise,email,password) 
    VALUES('-','-','".$resultat['adresse']."',2,8,'".$resultat['email']."','".$resultat['password']."');";
   /* echo $resultat['adresse'];
    echo $resultat['email'];
    echo $resultat['password'];*/
	/*$statement = $databasehandler->prepare($sqlquery);	                                        
    $statement->execute();  */
    $pdo = connectDB();   
    $sql = "INSERT INTO Entreprise(idsecteur,nom,description,siteweb,fondee) 
    VALUES (:secteur, :nom, :description, :siteweb,:fondee); ";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':secteur', $resultat['sector']);
    $stm->bindValue(':nom', $resultat['nameCompany']);
    $stm->bindValue(':description', $resultat['discription']);
    $stm->bindValue(':siteweb', $resultat['website']);
    $stm->bindValue(':fondee', null);
    $stm->execute();
    $insertId = $pdo->lastInsertId();

    //$stm->execute();
    //$pdo = connectDB();   
    $sql = "INSERT INTO Lieu(nom,prenom,adresse,id_ville,id_entreprise,email,password) 
    VALUES (:nom, :prenom, :adresse, :id_ville, :id_entreprise,:email,:password); ";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':nom', null);
    $stm->bindValue(':prenom', null);
    $stm->bindValue(':adresse', $resultat['adresse']);
    $stm->bindValue(':id_ville', 2);
    $stm->bindValue(':id_entreprise', $insertId);
    $stm->bindValue(':email', $resultat['email']);
    $stm->bindValue(':password', $resultat['password']);
    $stm->execute();
}
function getCandidatebyid($id){
    $pdo = connectDB();
    //preparation requete sql en texte
    $sql = "SELECT * FROM Candidat WHERE id=:id;";
    //transformer en vrai requete preparer
    $statement = $pdo->prepare($sql);
    //bindvalue
    $statement->bindValue(':id', $id, PDO::PARAM_INT); 
    //execution
    $statement->execute();
    //fetchall
    $result = $statement->fetch();
    //fermer la connexion 
    $pdo = null;
    //renvoyer les données
    return $result;

}
function updateCandidateAction($id,$nom,$prenom,$email,$password){
    $pdo = connectDB();
    $sql = "UPDATE Candidat
            SET nom=:nom, prenom=:prenom,email=:email,password = :password
            WHERE id = :id";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':id', $id, PDO::PARAM_INT); 
    $stm->bindValue(':nom', $nom);
    $stm->bindValue(':prenom', $prenom);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':password', $password);
    $stm->execute();

}
function deleteCandidatbyid($id){
    $databasehandler=connectDB(); 
	$sqlquery= "DELETE FROM Candidat WHERE id='".$id."'";
	$statement = $databasehandler->prepare($sqlquery);	                                        
    $statement->execute();

}
function getCompany($email,$password){
    $pdo = connectDB();
    //preparation requete sql en texte
    $sql = "SELECT * FROM Lieu WHERE email=:mail AND password= :pass LIMIT 1;";
    //transformer en vrai requete preparer
    $statement = $pdo->prepare($sql);
    //bindvalue
    $statement->bindValue(':mail', $email); 
    $statement->bindValue(':pass', $password); 
    //execution
    $statement->execute();
    //fetchall
    $result = $statement->fetch();
    //fermer la connexion 
    $pdo = null;
    //renvoyer les données
    return $result;

}
function resultSearchByKeyword(){
	$databasehandler=connectDB();
	$sqlquery= 
			"	SELECT Stage.id,Stage.titre, Stage.detail,Lieu.adresse,Stage.date_deposer,Entreprise.nom,Entreprise.description,Ville.nom AS nom_ville  
				FROM Secteur 
			   INNER JOIN Stage ON Secteur.id = Stage.idsecteur
			   INNER JOIN Lieu  ON Stage.idlieu = Lieu.id
			   INNER JOIN Ville ON Lieu.id_ville = Ville.id
			   INNER JOIN Entreprise ON Entreprise.id = Lieu.id_entreprise
			   WHERE Entreprise.nom LIKE'%".$_POST['parmot']."%' OR Secteur.nom LIKE '%".$_POST['parmot']."%' OR Stage.titre LIKE '%".$_POST['parmot']."%'";
	$statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
	return $statement->fetchAll();	   
	
}
function resultSearchByPlace(){
	$databasehandler=connectDB();
	$sqlquery="SELECT Stage.id,Stage.titre, Stage.detail,Lieu.adresse,Stage.date_deposer,Entreprise.nom,Entreprise.description,Ville.nom AS 	  nom_ville   
			   FROM Stage 
			   INNER JOIN Lieu  ON Stage.idlieu = Lieu.id
			   INNER JOIN Entreprise ON Entreprise.id = Lieu.id_entreprise
			   INNER JOIN Ville ON Lieu.id_ville = Ville.id
			   INNER JOIN  Departement ON Ville.id_departement = Departement.id
			   INNER JOIN Region ON Departement.id_region = Region.id
			   WHERE Ville.nom LIKE'%".$_POST['parlieu']."%' OR Departement.nom LIKE'%".$_POST['parlieu']."%' OR Departement.code LIKE '%".$_POST['parlieu']."%' OR Region.nom LIKE'%".$_POST['parlieu']."%'";
	$statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
	return $statement->fetchAll();	   
	
}
function resultSearchByKeywordPlace(){
	$databasehandler=connectDB();
	$sqlquery="SELECT Stage.id,Stage.titre, Stage.detail,Lieu.adresse,Stage.date_deposer,Entreprise.nom,Entreprise.description,Ville.nom AS 		nom_ville   
			   FROM Stage 
			   INNER JOIN Lieu  ON Stage.idlieu = Lieu.id
			   INNER JOIN Entreprise ON Entreprise.id = Lieu.id_entreprise
			   INNER JOIN Ville ON Lieu.id_ville = Ville.id
			   INNER JOIN  Departement ON Ville.id_departement = Departement.id
			   INNER JOIN Region ON Departement.id_region = Region.id
			   INNER JOIN Secteur ON Secteur.id = Stage.idsecteur
			   WHERE (Ville.nom LIKE'%".$_POST['parlieu']."%' OR Departement.nom LIKE'%".$_POST['parlieu']."%' OR Departement.code LIKE '%".$_POST['parlieu']."%' OR Region.nom LIKE'%".$_POST['parlieu']."%') AND (Entreprise.nom LIKE'%".$_POST['parmot']."%' OR Secteur.nom LIKE '%".$_POST['parmot']."%' OR Stage.titre LIKE '%".$_POST['parmot']."%')";
	$statement = $databasehandler->prepare($sqlquery);	                                        
	$statement->execute();
	return $statement->fetchAll();	 
}



?>
