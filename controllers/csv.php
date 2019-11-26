<?php
class csv extends mysqli{
    private $state_csv = false;
   /* public function __construct(){
        parent::construct("localhost","student","Mot_de_pass123","Offre_stage");
    }*/
    public function import($file){
        include("model/model.php");
        $file = fopen($file,'r');
        while ($row = fgetcsv($file)){
           /* print "<pre>";
            print_r($row);
            print "</pre>";*/
            /*$value = "'".implode("','",$row)."'";
            $sql = "INSERT INTO Stage(idsecteur,titre,detail,date_deposer,idlieu)
                    VALUES (".$value.")";*/
            $secteur = $row[0];        
            $titre = $row[1];
            $detail = $row[2];
            $date = $row[3];
            $lieu = $row[4];
            //echo $titre." </br>";
            
            insertStagetoDB($secteur,$titre,$detail,$date,$lieu);
            /* if($this->query($sql){
                $this->state_csv = true;
            }else {
                $this->state_csv = false;
               
            }*/
        }
    }
    public function export(){
        include("model/model.php");
        $results = getListStage();
        if($results){
        $fn = "csv_".uniqid().".csv";
        $file = fopen("assets/files/".$fn,"w");
        foreach ($results as $result){
        fputcsv($file,$result);
        }  

        }else {
            echo "error";

        }

    }
   
}


?>