<?php
class Money
{

    public function __construct()
    {
        $this->bdd = bdd();
    }

    //Create

    public function addMoney($gainDate,$lgtId,$montant){
        $query = "INSERT INTO money(date_gain,lg_id,gain)
            VALUES (:gainDate,:lgtId,:montant)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "gainDate" => $gainDate,
            "lgtId" => $lgtId,
            "montant" => $montant
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    // Read

    public function getAllMoney(){
        $query = "SELECT * FROM money ORDER BY id_money  DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getMoneyByReseau($rseu){
        $query = "SELECT * FROM money
          WHERE reseau =:rseu";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "rseu" => $rseu
        ));
        return $rs;
    }


//Count


    public function getGainTotal()
    {
        $query = "SELECT SUM(gain) as solde FROM money";
        $rs = $this->bdd->query($query);
        return $rs;

    }

    public function getNbLocataire(){
        $query = "SELECT COUNT(*) as nb FROM money";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    // Verification valeur existant
    public function verifLocataire($propriete,$val){
        $query = "SELECT * FROM money WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));
        return $rs;
    }









}

// Instance
$money = new Money();