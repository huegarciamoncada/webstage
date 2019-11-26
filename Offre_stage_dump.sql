-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: Offre_stage
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idlogin_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin`
--

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;
INSERT INTO `Admin` VALUES (1,'jacques@hotmail.com','jacques',NULL,'ROUX','Jacques'),(2,'michael@gmail.com','michael',NULL,'BONNET','Michael');
/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Candidat`
--

DROP TABLE IF EXISTS `Candidat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Candidat` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `cv` longtext NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Candidat`
--

LOCK TABLES `Candidat` WRITE;
/*!40000 ALTER TABLE `Candidat` DISABLE KEYS */;
INSERT INTO `Candidat` VALUES (1,'assets/cv/cvAnna1.pdf','DUPONT','Anna','anna@gmail.com','anna',NULL),(2,'cv Marie','BONNET','Marie','marie@hotmail.com','marie',NULL),(3,'cv Jean','ROUX','Jean','jean@lapost.com','jean',NULL),(4,'cv Jacqueline','FAURE','Jacqueline','jacqueline@lapost.com','jacqueline',NULL),(5,'cvhue','hue','Nguyen','hue@gmail.com','hue',NULL),(6,'-','Legrand','','','martin',NULL),(7,'-','Legrand','Martin','Martin@gmail.com','martin',NULL),(8,'-','a','a','a@hotmail.com','a',NULL);
/*!40000 ALTER TABLE `Candidat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Departement`
--

DROP TABLE IF EXISTS `Departement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `code` varchar(45) NOT NULL,
  `id_region` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Departement_Region1_idx` (`id_region`),
  CONSTRAINT `fk_Departement_Region1` FOREIGN KEY (`id_region`) REFERENCES `Region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Departement`
--

LOCK TABLES `Departement` WRITE;
/*!40000 ALTER TABLE `Departement` DISABLE KEYS */;
INSERT INTO `Departement` VALUES (1,'Lot-et-Garonne','47',2),(2,'Gironde','33',2),(3,'Ardennes','8',1),(4,'Aube','10',1),(5,'Rhône','69',3),(6,'Ain','1',3);
/*!40000 ALTER TABLE `Departement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Entreprise`
--

DROP TABLE IF EXISTS `Entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Entreprise` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `idsecteur` smallint(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` longtext,
  `siteweb` mediumtext,
  `fondee` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Entreprise_Secteur1_idx` (`idsecteur`),
  CONSTRAINT `fk_Entreprise_Secteur1` FOREIGN KEY (`idsecteur`) REFERENCES `Secteur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entreprise`
--

LOCK TABLES `Entreprise` WRITE;
/*!40000 ALTER TABLE `Entreprise` DISABLE KEYS */;
INSERT INTO `Entreprise` VALUES (1,2,'ATOS','Atos SE (Société Européenne), est un leader de la transformation numérique. Fort d\'une base de clients mondiale, Atos est le n°1 européen du Big Data, de la Cybersécurité et de l\'environnement de travail connecté, et fournit des services Cloud, des solutions d\'infrastructure et gestion de données, des applications et plateformes métiers, ainsi que des services transactionnels par l\'intermédiaire de Worldline, le leader européen des services de paiement. Grâce à ses technologies de pointe et son expertise digitale & sectorielle, Atos accompagne la transformation numérique de ses clients dans les secteurs Défense, Services financiers, Santé, Industrie, Médias, Services aux collectivités, Secteur Public, Distribution, Télécoms, et Transports. Partenaire informatique mondial des Jeux Olympiques et Paralympiques, Atos est coté sur le marché Euronext Paris et exerce ses activités sous les marques Atos, Atos Consulting, Atos Worldgrid, Bull, Canopy, Unify et Worldline. ','https://jobs.atos.net',2010),(2,3,'SOGETI','SOGETI, est un leader de la transformation numérique. Fort d\'une base de clients mondiale, Atos est le n°1 européen du Big Data, de la Cybersécurité et de l\'environnement de travail connecté, et fournit des services Cloud, des solutions d\'infrastructure et gestion de données, des applications et plateformes métiers, ainsi que des services transactionnels par l\'intermédiaire de Worldline, le leader européen des services de paiement. Grâce à ses technologies de pointe et son expertise digitale & sectorielle, Atos accompagne la transformation numérique de ses clients dans les secteurs Défense, Services financiers, Santé, Industrie, Médias, Services aux collectivités, Secteur Public, Distribution, Télécoms, et Transports. Partenaire informatique mondial des Jeux Olympiques et Paralympiques, Atos est coté sur le marché Euronext Paris et exerce ses activités sous les marques Atos, Atos Consulting, Atos Worldgrid, Bull, Canopy, Unify et Worldline. ','https://jobs.sogeti.net',2005),(3,4,'Immobilier','Immobilier agence','immobilier.com',2014),(4,5,'Adamson','Adamson est un leader de la transformation numérique','www.adamson.com',2012),(5,3,'ATAN','ATAN est un leader de la transformation numérique','www.atan.com',2016);
/*!40000 ALTER TABLE `Entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lieu`
--

DROP TABLE IF EXISTS `Lieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lieu` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `adresse` mediumtext NOT NULL,
  `id_ville` bigint(20) NOT NULL,
  `id_entreprise` smallint(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_Lieu_Ville1_idx` (`id_ville`),
  KEY `fk_Lieu_Entreprise1_idx` (`id_entreprise`),
  CONSTRAINT `fk_Lieu_Entreprise1` FOREIGN KEY (`id_entreprise`) REFERENCES `Entreprise` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lieu_Ville1` FOREIGN KEY (`id_ville`) REFERENCES `Ville` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lieu`
--

LOCK TABLES `Lieu` WRITE;
/*!40000 ALTER TABLE `Lieu` DISABLE KEYS */;
INSERT INTO `Lieu` VALUES (1,'DUPONT','Daniel','12 rue Victor Hugo',2,1,'atos@gmail.com','atos',NULL),(2,'DUPONT','Julie','15 rue Michelle',5,3,'julie@hotmail.com','sogeti',NULL),(3,'CLAIRE','Marie','30 rue Saint-avold',4,2,'marie@gmail.com','marie',NULL),(4,'ROCHE','Vincent','28 rue Germain',3,4,'adamson@gmail.com','adamson',NULL),(5,'BLANDY','Jessica','109 rue Roncevaux',6,5,'atan@gmail.com','atan',NULL);
/*!40000 ALTER TABLE `Lieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lieu_Stage`
--

DROP TABLE IF EXISTS `Lieu_Stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lieu_Stage` (
  `idlieu` smallint(5) NOT NULL,
  `idstage` int(11) NOT NULL,
  PRIMARY KEY (`idlieu`,`idstage`),
  KEY `fk_Lieu_Stage_Lieu1_idx` (`idlieu`),
  KEY `fk_Lieu_Stage_Stage1_idx` (`idstage`),
  CONSTRAINT `fk_Lieu_Stage_Lieu1` FOREIGN KEY (`idlieu`) REFERENCES `Lieu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lieu_Stage_Stage1` FOREIGN KEY (`idstage`) REFERENCES `Stage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lieu_Stage`
--

LOCK TABLES `Lieu_Stage` WRITE;
/*!40000 ALTER TABLE `Lieu_Stage` DISABLE KEYS */;
INSERT INTO `Lieu_Stage` VALUES (1,1),(1,2),(2,4),(2,9),(3,3),(4,8),(5,7);
/*!40000 ALTER TABLE `Lieu_Stage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Region`
--

DROP TABLE IF EXISTS `Region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Region`
--

LOCK TABLES `Region` WRITE;
/*!40000 ALTER TABLE `Region` DISABLE KEYS */;
INSERT INTO `Region` VALUES (1,'Grand EST'),(2,'Nouvelle Aquitaine'),(3,'Auvergne Rhône-Alpes');
/*!40000 ALTER TABLE `Region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Secteur`
--

DROP TABLE IF EXISTS `Secteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Secteur` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `parent` smallint(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Secteur`
--

LOCK TABLES `Secteur` WRITE;
/*!40000 ALTER TABLE `Secteur` DISABLE KEYS */;
INSERT INTO `Secteur` VALUES (1,'Informatique',NULL),(2,'Réseaux',1),(3,'Logicielle',1),(4,'Immobilier',NULL),(5,'Finance',NULL);
/*!40000 ALTER TABLE `Secteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Secteur_Candidat`
--

DROP TABLE IF EXISTS `Secteur_Candidat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Secteur_Candidat` (
  `idsecteur` smallint(7) NOT NULL,
  `idcandidat` smallint(5) NOT NULL,
  KEY `fk_Secteur_Candidat_Secteur1_idx` (`idsecteur`),
  KEY `fk_Secteur_Candidat_Candidat1_idx` (`idcandidat`),
  CONSTRAINT `fk_Secteur_Candidat_Candidat1` FOREIGN KEY (`idcandidat`) REFERENCES `Candidat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Secteur_Candidat_Secteur1` FOREIGN KEY (`idsecteur`) REFERENCES `Secteur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Secteur_Candidat`
--

LOCK TABLES `Secteur_Candidat` WRITE;
/*!40000 ALTER TABLE `Secteur_Candidat` DISABLE KEYS */;
INSERT INTO `Secteur_Candidat` VALUES (2,2),(3,3),(2,4),(5,1),(1,1);
/*!40000 ALTER TABLE `Secteur_Candidat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Stage`
--

DROP TABLE IF EXISTS `Stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsecteur` smallint(7) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `detail` longtext NOT NULL,
  `date_deposer` datetime NOT NULL,
  `idlieu` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Stage_Secteur1_idx` (`idsecteur`),
  FULLTEXT KEY `detail` (`detail`),
  FULLTEXT KEY `detail_2` (`detail`),
  FULLTEXT KEY `ind_full_detail` (`detail`),
  CONSTRAINT `fk_Stage_Secteur1` FOREIGN KEY (`idsecteur`) REFERENCES `Secteur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stage`
--

LOCK TABLES `Stage` WRITE;
/*!40000 ALTER TABLE `Stage` DISABLE KEYS */;
INSERT INTO `Stage` VALUES (1,1,'Développeur(se) .Net','Editeur d’une suite CRM complète et Expert Retail Front Office alliant expertise métier et nouvelles technologies au service des enseignes de la distribution spécialisée en environnement multicanal, nous recherchons actuellement plusieurs développeurs .Net.\n\nPoste :\n\nAu sein d’un pôle de compétences techniques en développement .NET, vous prenez en charge des travaux à forte valeur ajoutée, et assurez notamment :\n\n    La conception, la modélisation et le développement des projets ou parties de projets techniques\n    La prise en charge de projets de R&D\n    La mise en œuvre de techniques et de technologies de développement innovantes\n    Le développement d’application dans un souci de qualité, de respect des délais, de stabilité et de pérennité\n\nProfil:\n\n    Bac +3/5 en informatique\n    Expérience d’au moins 2 ans dans le Développement C# .Net\n    Connaissances avancées dans l’utilisation de Visual Studio et du langage C#\n    La connaissance de Xamarin serait un plus\n    La maitrise des bases de données relationnelles (MySQL notamment) serait fortement appréciée\n    Une première expérience de projet en méthodologie Agile/Scrum serait un atout\n    Votre êtes reconnu pour votre sens du service client et du respect de la qualité de vos réalisations ainsi que de vos engagements\n    Bon relationnel, aptitudes à travailler en équipe et réel sens du service\n    Bonnes capacités d’analyse\n    Curiosité dans le domaine des nouvelles technologies\n\nType d\'emploi : CDI\n\nExpérience:\n\n    développement .Net: 1 an (Souhaitée))','2018-07-20 00:00:00',1),(2,1,'Technicien(ne) Systèmes et Réseaux H/F','Akkion Recruitment, acteur des Ressources Humaines spécialiste du recrutement dans les métiers à forte valeur ajoutée, recrute pour son client, un(e)\n\nTechnicien(ne) Systèmes et Réseaux H/F\n\nJustifiant d’une expérience convaincante et réussie en installation et en maintenance de matériels informatiques (postes de travail, serveurs, matériels en réseau) acquise idéalement en contexte multi-sites, vous démontrez vos compétences techniques et votre expertise pour l’installation et la mise en œuvre des systèmes et des équipements réseaux (switch, firewall…) en environnement multi-sites (Ile-de-France et Oise).\n\nGrâce à votre capacité d’organisation, à votre capacité d’analyse, associées à votre rigueur et à votre réactivité vous êtes parfaitement autonome et efficace dans vos principales missions et responsabilités :\n\n    Préparation et installation des postes de travail,\n    Installation, mise en service et maintenance des serveurs et des équipements mobiles,\n    Installation des imprimantes en réseau,\n    Gestion des sauvegardes et modification des paramètres,\n    Diagnostic et correction des dysfonctionnements,\n    Assistance aux utilisateurs et support de N1 et N2,\n    Suivi des incidents,\n    Rédaction des rapports d’intervention.\n\nDoté(e) d’excellentes qualité relationnelles, d’un réel sens du service et orienté(e) satisfaction client, vous garantissez la fiabilité, la cohérence, la sécurisation et la meilleure performance des systèmes et des équipements réseaux.\n\nDiplômé(e) BAC+2/BAC+3 en informatique (BTS Systèmes et Réseaux, BTS Services Informatiques aux Organisations, BTS Systèmes Numériques, DUT Informatique, DUT Réseaux et Télécommunications, Licence Professionnelle Sécurité des Réseaux et des Systèmes Informatiques…), vous justifiez d’une expérience similaire acquise idéalement en environnement multi-sites.\n\nVous possédez des connaissances des systèmes d’exploitation Microsoft (postes et serveurs), des systèmes de virtualisation VMWare et Hyper-V et des pare-feu (protocoles TCP/IP, VPN).\n\nIdéalement, vous connaissez Active Directory.\n\nMobile, vous vous déplacez fréquemment sur les différents sites (8 sites) en Ile-De-France et dans l’Oise.','2018-08-28 00:00:00',1),(3,5,'Finance & Accounting Controller','Au cœur des nouvelles technologies, CISA INFORMATIQUE, est une société de services experte dans l’informatique (ESN), positionné sur cinq métiers complémentaires : l’Edition de progiciels de gestion intégrée (ERP), l’Intégration de progiciels de gestion,le Conseil, l’Hébergement sur Data Centers et les Systèmes & Réseaux.\n\nAvec plus de 50 ans sd\'existance, CISA INFORMATIQUE développe des progiciels de gestion à forte valeur ajoutée : ERP - GPAO - Gestion Commerciale - Gestion Financière - RH\n\nNotre pérennité financière nous assure une expansion durable. Nous recrutons dans le cadre de notre développement.\n\nDescriptif du poste\n\nNous recherchons un(e) consultant(e) spécialisé(e) dans la Comptabilité et la Finance pour notre Solution, les logiciels SAGE et TALENTIA SOFTWARE. Le poste est basé sur BOURG EN BRESSE.\n\nSous la direction du responsable de service, vous serez en charge de la bonne conduite des projets :\n\n- Installation, analyse, paramétrage, formation et assistance.\n\n- Appuyer ponctuellement l\'équipe commerciale en Avant-Vente sur les problématiques financières\n\n- Etre en relation avec le service R&D pour échanger sur les développements Produit\n\nRémunération : Fixe + primes + intéressement + tickets restaurants\n\nDescription du profil\n\nDe formation supérieure (Bac+4/5) type MSTCF - bonnes connaissances en Comptabilité et Finance de préférence sur le logiciel TALENTIA FINANCE 2.0 ou SAGE 100 C - expérience réussie de 2 ans minimum - très bon relationnel, disponible, tenace et rapidement opérationnel.\n\nLa Connaissance de la gestion des Coopératives Agricoles sera un atout supplémentaire.','2018-05-02 00:00:00',3),(4,4,'Immobilier employee','Etre consultant megAgence, c’est accompagner vos clients sur une étape fondamentale de leur vie, l’achat ou la vente de leur logement . Intégrer megAgence c’est aussi l’opportunité d’évoluer et de se créer un parcours de carrière immobilière!','2018-02-01 00:00:00',2),(5,1,'Reseaux empoyee','Etre consultant megAgence, c’est accompagner vos clients sur une étape fondamentale de leur vie, l’achat ou la vente de leur logement . Intégrer megAgence c’est aussi l’opportunité d’évoluer et de se créer un parcours de carrière immobilière!','2018-07-01 00:00:00',NULL),(7,1,'Développeur PHP','Etre consultant megAgence, c’est accompagner vos clients sur une étape fondamentale de leur vie, l’achat ou la vente de leur logement . Intégrer megAgence c’est aussi l’opportunité d’évoluer et de se créer un parcours de carrière immobilière!','2018-03-10 00:00:00',5),(8,5,'Stage finance','stage finance Bac+2','2018-09-20 00:00:00',4),(9,5,'Stage finance','stage finance Bac+2','2018-09-20 00:00:00',2),(10,1,'Développeur Back-end H/F','Chez nous, nous réalisons le film de vos plus belles émotions à partir de vos photos et vidéos. Le concept de notre start-up est nouveau en France : il suffit d’envoyer vos images, puis notre équipe de monteurs réalise votre film en 72h seulement.\r\n\r\nAvec une clientèle issue de 3 marchés (tourisme, sports/loisirs, évènements familiaux), notre service s’adresse à toutes les situations propices à la prise d’images par des particuliers : un week-end entre amis, un voyage, un anniversaire, un mariage ou encore une sortie sportive.','2018-11-20 00:00:00',1),(11,1,'Développeur Front-end Homme Femme','Chez nous, nous réalisons le film de vos plus belles émotions à partir de vos photos et vidéos. Le concept de notre start-up est nouveau en France : il suffit d’envoyer vos images, puis notre équipe de monteurs réalise votre film en 72h seulement.\r\n\r\nAvec une clientèle issue de 3 marchés (tourisme, sports/loisirs, évènements familiaux), notre service s’adresse à toutes les situations propices à la prise d’images par des particuliers : un week-end entre amis, un voyage, un anniversaire, un mariage ou encore une sortie sportive.','2018-10-09 00:00:00',1),(14,1,'hiuiuo','jgjhjhgh','2018-11-06 00:00:00',1),(15,1,'hue test2_ update','dsqdfs','2018-11-01 00:00:00',1),(16,2,'Réseaux','Réseaux','2018-12-03 00:00:00',1),(17,1,'Hue update','Hue update','2018-12-01 00:00:00',1),(18,1,'Stage_CSV','Stage CSV','2018-12-28 00:00:00',1),(19,1,'Stage_CSV3','Stage CSV3','2018-12-28 00:00:00',1),(20,1,'Stage_CSV3','Stage CSV3','2018-12-28 00:00:00',1),(21,2,'Stage_CSV4','Stage_CSV4','2018-12-29 00:00:00',1),(22,1,'abcfh','abcfh','2019-01-02 00:00:00',1),(23,1,'hue 8 jan 2019','hue 8 jan 2019','2019-01-01 00:00:00',1),(24,1,'Stage_from_CSV7','Stage CSV3','2018-12-28 00:00:00',1),(25,2,'Stage_from_CSV6','Stage_CSV4','2018-12-29 00:00:00',1);
/*!40000 ALTER TABLE `Stage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Stage_Candidat`
--

DROP TABLE IF EXISTS `Stage_Candidat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Stage_Candidat` (
  `idstage` int(11) NOT NULL,
  `idcandidat` smallint(5) NOT NULL,
  PRIMARY KEY (`idstage`,`idcandidat`),
  KEY `fk_Stage_Candidat_Candidat1_idx` (`idcandidat`),
  KEY `fk_Stage_Candidat_Stage1_idx` (`idstage`),
  CONSTRAINT `fk_Stage_Candidat_Candidat1` FOREIGN KEY (`idcandidat`) REFERENCES `Candidat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Stage_Candidat_Stage1` FOREIGN KEY (`idstage`) REFERENCES `Stage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stage_Candidat`
--

LOCK TABLES `Stage_Candidat` WRITE;
/*!40000 ALTER TABLE `Stage_Candidat` DISABLE KEYS */;
INSERT INTO `Stage_Candidat` VALUES (1,1),(2,1),(3,1),(2,2),(1,3),(2,4);
/*!40000 ALTER TABLE `Stage_Candidat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ville`
--

DROP TABLE IF EXISTS `Ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ville` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code_postal` varchar(255) DEFAULT NULL,
  `nom` varchar(80) NOT NULL,
  `id_departement` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Ville_Departement1_idx` (`id_departement`),
  CONSTRAINT `fk_Ville_Departement1` FOREIGN KEY (`id_departement`) REFERENCES `Departement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ville`
--

LOCK TABLES `Ville` WRITE;
/*!40000 ALTER TABLE `Ville` DISABLE KEYS */;
INSERT INTO `Ville` VALUES (1,'69400','Arnas',5),(2,'6900','Lyon',5),(3,'69100','Villeurbanne',5),(4,'01130','Nantue',6),(5,'01800','Pérouge',6),(6,'01500','Ambronay',6);
/*!40000 ALTER TABLE `Ville` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-10  9:28:26
