<?php
class Gain
{

    public function __construct()
    {
        $this->bdd = bdd();
    }

    //Create

    public function addGain($gainDate,$lgtId,$montant,$typeTransac){
        $query = "INSERT INTO gain(date_gain,lg_id,gain,type_transac)
            VALUES (:gainDate,:lgtId,:montant,:typeTransac)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "gainDate" => $gainDate,
            "lgtId" => $lgtId,
            "montant" => $montant,
            "typeTransac" => $typeTransac
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


//Count


    public function getGainTotal()
    {
        $query = "SELECT SUM(gain) as solde FROM gain
                  WHERE type_transac = 0";
        $rs = $this->bdd->query($query);
        return $rs;

    }
    public function getDepenseTotal()
    {
        $query = "SELECT SUM(gain) as solde FROM gain
                  WHERE type_transac = 1";
        $rs = $this->bdd->query($query);
        return $rs;

    }

        public function getNbLocataire(){
        $query = "SELECT COUNT(*) as nb FROM gain";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    // Verification valeur existant
    public function verifLocataire($propriete,$val){
        $query = "SELECT * FROM gain WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));
        return $rs;
    }









}

// Instance
$gain = new Gain();