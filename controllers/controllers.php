<?php 
 
function listStage(){
    //$_SESSION['is_logged'] = false;  
include ("model/model.php");
//2. Analyse la requete de l'utilisateur
//si besoin analyser les param NTU

//3. Demander au model les données nécessaire
// (si il en faut) et les stocker dans des variables
$results = getListStage();
//4 Appeler la bonne vue, le bon template
include("views/listeStagesViews.php");
}

function detailStage(){
    
    //2. Analyse de l'url filtrage NTU
    //3. récupérer les données nécessaire auprès du model
    if(isset($_GET['id'])&& !empty($_GET['id'])){
        $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
        include ("model/model.php");
        $results = getStagebyid($id);
        include("views/detailStageView.php");
    }
    else
    {
        header("Location: /webstage/index.php");
    }
    //4. Demander au model les données nécessaire
    
    
     
}
function page404(){
header('HTTP/1.1 404 Not Found');
include("views/404.php");

}
function pageRegistration(){
    include("views/registrationViews.php");
}
function pageRegistrationCompany(){
    include ("model/model.php");
    $results = getSecteur();
    include("views/registrationCompanyViews.php");

}
function pageRegistrationCompanyDetail(){
    $options = array(
        'sector' => FILTER_VALIDATE_INT,
        
        'nameCompany' => FILTER_SANITIZE_STRING,
    
        'discription' => FILTER_SANITIZE_STRING,//Enlever les balises.
    
        'website' => FILTER_SANITIZE_STRING,
        'email'=> FILTER_VALIDATE_EMAIL,        
        'password'=> FILTER_SANITIZE_STRING,
        'adresse' => FILTER_SANITIZE_STRING);
    
        
    $resultat = filter_input_array(INPUT_POST, $options);
    if($resultat != null) { //Si le formulaire a bien été posté.
        //Enregistrer des messages d'erreur perso.
        $messageErreur = array(
            'sector'=> 'nom de metier n\'est pas valide',
            'nameCompany' => 'nom de l\'entreprise n\'est pas valide',
            'discription' => 'Description n\'est pas valide.',
            'website' => 'Nom de site web n\'est pas valide',
            'email' => 'L\'adresse email n\'est pas valide.',
            'password' => 'Password n\'est pas valide',
            'adresse' => 'Adresse n\'est pas valide'
        );
        
        $nbrErreurs = 0;
    
        foreach($options as $cle => $valeur) { //Parcourir tous les champs voulus.
            if(empty($_POST[$cle])) { //Si le champ est vide.
                echo 'Veuillez remplir le champ ' . $cle . '.<br/>';
                $nbrErreurs++;
            }
            elseif($resultat[$cle] === false) { //S'il n'est pas valide.
                echo $messageErreur[$cle] . '<br/>';
                $nbrErreurs++;
            }
        }
    
        if($nbrErreurs == 0) {
            // Inserer dans la base de donnée
            include ("model/model.php");
            insertCompanytoDB($resultat);
            //echo "insert du lieu".$resultat['nom'].$resultat['prenom'].$resultat['email'];
            //TODO If success then turn to page mon compte else echo "error"
        }
    }
    else {
        echo 'Vous n\'avez rien posté.';
    }
    /*if(isset($_POST['sector'])&& !empty($_POST['namecompany'])&& !empty($_POST['detail'])&& !empty($_POST['datedeposer'])){
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
        $detail = filter_var($_POST['detail'],FILTER_SANITIZE_STRING);
        $datedeposer = $_POST['datedeposer']; 
        $id =$_POST['id'];
       // $idsecteur = $result['idsecteur']
        include ("model/model.php");
        updateStagetoDB($id,$_POST['idsecteur'],$titre,$detail,$datedeposer,$_POST['idlieu']);
        include("views/updateStageSuccessViews.php");        
    }
     else {
        header("Location: /webstage/index.php/updateStage?id=".$_POST['id']);
    }
    $resultat = array("sector" => $_POST['sector'], "namecompany" => $_POST['nameCompany'], "discription" => $_POST['discription'],"website" => $_POST['website']);
    include ("model/model.php");
    insertCompanytoDB($resultat);*/
}
function login(){
    include("views/loginViews.php");     
}
function loginCandidate(){
    include("views/loginCandidateViews.php");   
}
function openCandidateSession(){
    if(isset($_POST['email'])&& !empty($_POST['email'])&&isset($_POST['password'])&& !empty($_POST['password'])){
        //$email = filter_var($_POST['email'],FILTER_VALIDATE_INT);
       //echo "hue1";
       //echo filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
      /*if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){*/
        $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
            //$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
            
            $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);            
            include ("model/model.php");
            $results = getCandidate($email,$password);
            if($results){
                $_SESSION['is_logged'] = true;            
                //if(mysql_nums_row($results) ==0){
                //echo "<p>Identifiant inconnu!</p>";
                //echo $results['nom']." ".$results['prenom'].$email.$password;
                include("views/candidateSessionViews.php");  
                //header("Location: /webstage/index.php/loginCandidate");
                
            }
            else{
               // echo "trung pass";
                //  
                header("Location: /webstage/index.php/loginCandidate");           
            }
        /*}
        else{
            echo "email ko hop le";
            //header("Location: /webstage/index.php/loginCandidate");
        }    */
    }
    else
    {
        echo "<p>Email, Password ne sont pas valide!</p>";
        //header("Location: /webstage/index.php/loginCandidate");
    }


}
function uploadCvProcess(){
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0){
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['cv']['size'] <= 1000000)
        {
          // Testons si l'extension est autorisée    
          $infosfichier = pathinfo($_FILES['cv']['name']);    
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png','pdf','docx');
          if (in_array($extension_upload, $extensions_autorisees))
          {
            // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['cv']['tmp_name'], 'assets/cv/' . basename($_FILES['cv']['name']));
            $pathCV = 'assets/cv/' . basename($_FILES['cv']['name']);
            include ("model/model.php");
            insertCvToDB($_POST['idCandidate'],$pathCV);
            //include("views/uploadCvViews.php");  
            echo "le CV est bien transmit";
          }
          else { echo "Le fichier est type pdf, doc, jpg, jpeg, gif";}
        }
        else{ echo "Le fichier est trop gros";}
    }
    else {
        echo "Erreur lors du transfert";
    }
}
function pageRegistrationCandidate(){
    include("views/registrationCandidateViews.php");    
}
function insertCandidate(){
    
    $options = array(
        'nom' => FILTER_SANITIZE_STRING,
    
        'prenom' => FILTER_SANITIZE_STRING, //Enlever les balises.
    
        'email' => FILTER_VALIDATE_EMAIL, //Valider l'adresse de messagerie.
        'password' => FILTER_SANITIZE_STRING
        
    );
    
        
    $resultat = filter_input_array(INPUT_POST, $options);
    if($resultat != null) { //Si le formulaire a bien été posté.
        //Enregistrer des messages d'erreur perso.
        $messageErreur = array(
            'nom' => 'nom n\'est pas valide',
            'prenom' => 'prenom n\'est pas valide',
            'email' => 'L\'adresse email n\'est pas valide.',
            'password' => 'Password n\'est pas valide'
            
        );
        
        $nbrErreurs = 0;
    
        foreach($options as $cle => $valeur) { //Parcourir tous les champs voulus.
            if(empty($_POST[$cle])) { //Si le champ est vide.
                echo 'Veuillez remplir le champ ' . $cle . '.<br/>';
                $nbrErreurs++;
            }
            elseif($resultat[$cle] === false) { //S'il n'est pas valide.
                echo $messageErreur[$cle] . '<br/>';
                $nbrErreurs++;
            }
        }
    
        if($nbrErreurs == 0) {
            // Inserer dans la base de donnée
            include ("model/model.php");
            insertCandidatetoDB($resultat);
            //echo "insert du lieu".$resultat['nom'].$resultat['prenom'].$resultat['email'];
            //TODO If success then turn to page mon compte else echo "error"
        }
    }
    else {
        echo 'Vous n\'avez rien posté.';
    }
}
function updateCandidate(){
    $id = $_GET['id'];
    include ("model/model.php");
    $result= getCandidatebyid($id);
    include("views/updateCandidateViews.php");   

}
function updateCandidatetoDB(){   
    
    if(isset($_POST['update'])){
        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($_POST['prenom'],FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $id =$_POST['id'];
       // $idsecteur = $result['idsecteur']
       include ("model/model.php");
        updateCandidateAction($id,$nom,$prenom,$email,$password);
        include("views/updateCandidateSuccessViews.php");  
       
    } else {
        header("Location: /webstage/index.php/updateCandidate");  
    } 
    
    

}
function deleteCandidatebyid(){    
    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        include ("model/model.php");
        deleteCandidatbyid($id);
        include("views/deleteCandidateSuccessViews.php");
       
    } else {
        header("Location: /webstage/index.php/openCandidateSession");  
    }    
       

}
function loginCompany(){
    include("views/loginCompanyViews.php");   
}
//hue is doing with thi function
function openCompanySession(){
    if(isset($_POST['email'])&& !empty($_POST['email'])&&isset($_POST['password'])&& !empty($_POST['password'])){
        
        $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);                       
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);            
        include ("model/model.php");
        $results = getCompany($email,$password);
        if($results){
            $_SESSION['is_logged'] = true;               
                include("views/CompanySessionViews.php");  
                //header("Location: /webstage/index.php/loginCandidate");                
            }
            else{  
                           
                header("Location: /webstage/index.php/loginCompany");           
            }        
    }
    else
    {
        echo "<p>Email, Password ne sont pas valide!</p>";
        //header("Location: /webstage/index.php/loginCandidate");
    }

}
function addStage(){
$idCompany = $_GET['id'];
include ("model/model.php");
$results1 = getSecteur();
$results2 = getLieu($idCompany);
include("views/ajouterStageView.php");
}
function insertStage(){
    if (!empty($_POST['titre']) && !empty($_POST['detail']) ){
        $date = $_POST['datedeposer'];
        $secteur = $_POST['sector'];
        $titre = filter_var($_POST['titre'],FILTER_SANITIZE_STRING);
        $detail = filter_var($_POST['detail'],FILTER_SANITIZE_STRING);
        $lieu = $_POST['lieu'];  
        include ("model/model.php");
        insertStagetoDB($secteur,$titre,$detail,$date,$lieu);
        include ("views/insertStageSuccess.php");
        
    }
    //NTU 
    // if isset($_POST['titre']) && !empty($_POST['titre'])
        //filter_var, cho tung bien truoc khi insert vao Database
    else{
        header("Location: /webstage/index.php/ajouterStage?id=".$_POST['idCompany']);
        }
    
}
function getStagebyCompany(){
$idCompany = $_GET['id'];
include ("model/model.php");
$results = listStagebyCompany($idCompany);
include("views/listStagebyCompanyViews.php");
}
function updateStage(){
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        include ("model/model.php");
        $results = getStagebyid($id);
        include("views/updateStageViews.php");
    } else {
        header("Location: /webstage/index.php/updateStage?id=".$_POST['id']);
    }
       
}
function updateStageAction(){
    if(isset($_POST['update'])&& !empty($_POST['titre'])&& !empty($_POST['detail'])&& !empty($_POST['datedeposer'])){
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
        $detail = filter_var($_POST['detail'],FILTER_SANITIZE_STRING);
        $datedeposer = $_POST['datedeposer']; 
        $id =$_POST['id'];
       // $idsecteur = $result['idsecteur']
        include ("model/model.php");
        updateStagetoDB($id,$_POST['idsecteur'],$titre,$detail,$datedeposer,$_POST['idlieu']);
        include("views/updateStageSuccessViews.php");        
    }
     else {
        header("Location: /webstage/index.php/updateStage?id=".$_POST['id']);
    }
} 
function deleteStage(){
    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        include ("model/model.php");
        deleteStagebyid($id);
        include("views/deleteStageSuccessViews.php");       
    } else {
        header("Location: /webstage/index.php/listStagebyCompany?id=".$_POST['idCompany']);
    }   
       
    
}
function searchStage(){
    if(!empty($_POST['parmot']) && empty($_POST['parlieu'])){
        // chercher mot clef métier et entreprise, titre de stage
        include ("model/model.php");
       $results= resultSearchByKeyword();
       include("views/searchResultViews.php"); 
       }
       
    if(!empty($_POST['parlieu']) && empty($_POST['parmot'])){
            // chercher stage par Ville, Departement, region
        include ("model/model.php");
       $results = resultSearchByPlace();
       include("views/searchResultViews.php"); 		
       }
    if(!empty($_POST['parlieu']) && !empty($_POST['parmot'])){
        // chercher stage par Ville, Departement, region, par mot clé
        include ("model/model.php");        
       $results =resultSearchByKeywordPlace();
       include("views/searchResultViews.php"); 
       }
    if (empty($_POST['parlieu']) && empty($_POST['parmot'])) {
        header("Location: /webstage/index.php");

    }
} 
function uploadCsvProcess(){
    include("csv.php");
    $csv = new csv();
    if (isset($_POST['importcsv'])){
        $csv->import($_FILES['csv']['tmp_name']);
        include("views/uploadCsvSuccessViews.php"); 
    }
    else echo "error";
}
function exportCsvProcess(){
    include("csv.php");
    $csv = new csv();
    $csv->export();
    include("views/uploadCsvSuccessViews.php"); 


}    
function logout(){
    $_SESSION['is_logged'] = false;
    header("Location: /webstage/index.php");    
}    
    


?>