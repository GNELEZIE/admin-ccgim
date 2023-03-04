<?php
class Location
{

    public function __construct()
    {
        $this->bdd = bdd();
    }

    //Create

    public function addLocation($userDate,$userId,$lgtId){
        $query = "INSERT INTO location(date_location,user_id,lgt_id)
            VALUES (:userDate,:userId,:lgtId)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userDate" => $userDate,
            "userId" => $userId,
            "lgtId" => $lgtId
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

//Read


    public function getLocationByAuthId(){
        $query = "SELECT * FROM location
                  INNER JOIN logement ON id_logement = lgt_id
                  ORDER BY id_location DESC";
        $rs = $this->bdd->query($query);
        return $rs;
    }



    public function getAllLocataire(){
        $query = "SELECT * FROM locataire
          WHERE statut = 0 ORDER BY id_locataire DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getLocationByLgts($userId){
        $query = "SELECT * FROM location
        INNER JOIN logement ON id_logement = lgt_id
          WHERE user_id =:userId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));
        return $rs;
    }
    public function getLocationById($userId){
        $query = "SELECT * FROM location
          WHERE user_id =:userId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));
        return $rs;
    }

//Count
    public function getNbLocataire(){
        $query = "SELECT COUNT(*) as nb FROM location";
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
$location = new Location();