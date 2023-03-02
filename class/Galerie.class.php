<?php
class Galerie {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate
    public function addGalerie($logementId,$dateLgt,$nomPhoto){
        $query = "INSERT INTO galerie(logement_id,date_galerie,photo)
        VALUES (:logementId,:dateLgt, :nomPhoto)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "logementId" => $logementId,
            "dateLgt" => $dateLgt,
            "nomPhoto" => $nomPhoto
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    //Read

    public function getGalerieById($id){
        $query = "SELECT * FROM galerie
        WHERE id_galerie = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getGalerieByLgtId($lgtId){
        $query = "SELECT * FROM galerie
        WHERE logement_id = :lgtId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "lgtId" => $lgtId
        ));
        return $rs;
    }

    public function getGalerieByBoutikId($boutikId){
        $query = "SELECT * FROM galerie
        INNER JOIN  produit ON id_produit = produit_id
        WHERE boutik_id = :boutikId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "boutikId" => $boutikId
        ));

        return $rs;
    }

    // Delete
    public function deleteGalerie($id){
        $query = "DELETE  FROM galerie WHERE id_galerie = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        $nb = $rs->rowCount();
        return $nb;
    }



    // Autre

}

// Instance

$galerie = new Galerie();