<?php
class Locataire
{

    public function __construct()
    {
        $this->bdd = bdd();
    }

    //Create



//Read
    public function getAllLocataire(){
        $query = "SELECT * FROM locataire
          WHERE statut = 0 ORDER BY id_locataire DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getLocataireBySlug($slg){
        $query = "SELECT * FROM locataire
          WHERE statut = 0 AND slug =:slg";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slg" => $slg
        ));
        return $rs;
    }

//Count
    public function getNbLocataire(){
        $query = "SELECT COUNT(*) as nb FROM locataire
          WHERE statut != 1";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    // Verification valeur existant
    public function verifLocataire($propriete,$val){
        $query = "SELECT * FROM locataire WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));
        return $rs;
    }









}

// Instance
$locataire = new Locataire();