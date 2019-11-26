<?php 
	/*use Monolog*/
	require 'vendor/autoload.php';
	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;/* ESSAI DE MONOLOG */
	//creer un logger
	$log = new Monolog\Logger('name');
	//creer un streamhandler
	$streamHandler = new StreamHandler('journal.log', Logger::WARNING);
	//associer handler et logger
	$log->pushHandler($streamHandler);//on est pret pour utiliser notre loger
	$log->warning('une entree de type warning');
	$log->error('une entree warning');
	$log->warning('fetchall'); // exemple log pour le fetchall
	
	/*********************************
	*  Front Controller              *
	*********************************/
	//charger autoload.php
	//initialiser librairies
	//gestion de la sécurité
	//vérifier si l'utilisateur est loggé ou pas
	//je prends connaissance le modele
	//include("model/model.php");

	include("controllers/controllers.php");
//ajoute session
session_start(); // Starting Session
if(!isset($_SESSION['is_logged'])){
	$_SESSION['is_logged'] = false;
}

	//ROUTAGE !
	$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	if($uri === "/webstage/index.php"){
		listStage();
		//include("controllers/listStageController.php");

    } else if ($uri === "/webstage/index.php/detail") {
		detailStage();
		//include("controllers/detailController.php");
	} else if ($uri === "/webstage/index.php/registration") {
		pageRegistration();
	} 
	else if ($uri === "/webstage/index.php/registrationCompany") {
		pageRegistrationCompany();
	}
	else if ($uri === "/webstage/index.php/registrationCompanyDetail") {
		pageRegistrationCompanyDetail();
	}else if ($uri === "/webstage/index.php/login") {
		login();

	}else if ($uri === "/webstage/index.php/logout") {
	logout();
	}
	else if ($uri === "/webstage/index.php/loginCandidate") {
		loginCandidate();

	}else if ($uri === "/webstage/index.php/openCandidateSession") {
		openCandidateSession();

	}else if ($uri === "/webstage/index.php/uploadCvProcess") {
		uploadCvProcess();

	}else if ($uri === "/webstage/index.php/registrationCandidate") {
		pageRegistrationCandidate();
	}else if ($uri === "/webstage/index.php/insertCandidate") {
		insertCandidate();
	}else if ($uri === "/webstage/index.php/updateCandidate") {
		updateCandidate();
	}else if ($uri === "/webstage/index.php/updateCandidatetoDB") {
		updateCandidatetoDB();
	}else if ($uri === "/webstage/index.php/deleteCandidate") {
		deleteCandidatebyid();
	}else if ($uri === "/webstage/index.php/loginCompany") {
		loginCompany();
	}else if ($uri === "/webstage/index.php/openCompanySession") {
		openCompanySession();
	}else if ($uri === "/webstage/index.php/ajouterStage") {
		addStage();
	}else if ($uri === "/webstage/index.php/insertStage") {
		insertStage();
	}else if ($uri === "/webstage/index.php/listStagebyCompany") {
		getStagebyCompany();
	}else if ($uri === "/webstage/index.php/updateStage") {
		updateStage();
	}else if ($uri === "/webstage/index.php/updateStagetoDB") {
		updateStageAction();
	}else if ($uri === "/webstage/index.php/deleteStage") {
		deleteStage();
	}else if ($uri === "/webstage/index.php/searchStage") {
		searchStage();
	}else if ($uri === "/webstage/index.php/uploadCsvProcess") {
		uploadCsvProcess();
	}else if ($uri === "/webstage/index.php/exportCsvProcess") {
		exportCsvProcess();
	}else {
		page404();
	}

?>