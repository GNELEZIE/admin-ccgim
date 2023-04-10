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
  public function addOrange($moneyDate,$reseau,$typeTransac,$debit,$credit,$userId,$client,$contact,$soldeAv,$soldeAp){
        $query = "INSERT INTO money(date_money,reseau,type_transac,debit_transac,credit_transac,user_id,client,contact,solde_av,solde_ap)
            VALUES (:moneyDate,:reseau,:typeTransac,:debit,:credit,:userId,:client,:contact,:soldeAv,:soldeAp)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "moneyDate" => $moneyDate,
            "reseau" => $reseau,
            "typeTransac" => $typeTransac,
            "debit" => $debit,
            "credit" => $credit,
            "userId" => $userId,
            "client" => $client,
            "contact" => $contact,
            "soldeAv" => $soldeAv,
            "soldeAp" => $soldeAp
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
          WHERE reseau =:rseu ORDER BY id_money DESC";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "rseu" => $rseu
        ));
        return $rs;
    }


//Count

    public function getSoldeByIdResau($rsId){
        $query = "SELECT SUM(debit_transac) - SUM(credit_transac) as solde FROM money
        WHERE reseau = :rsId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "rsId" => $rsId
        ));

        return $rs;
    }

        public function getDebitSoldeByIdResau($rsId){
        $query = "SELECT SUM(debit_transac) as solde FROM money
        WHERE reseau = :rsId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "rsId" => $rsId
        ));

        return $rs;
    }
        public function getCreditSoldeByIdResau($rsId){
        $query = "SELECT SUM(credit_transac) as solde FROM money
        WHERE reseau = :rsId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "rsId" => $rsId
        ));

        return $rs;
    }
    public function getSoldeDispoByIdResau($rsId){
        $query = "SELECT SUM(debit_transac) - SUM(credit_transac) as solde FROM money
        WHERE reseau = :rsId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "rsId" => $rsId
        ));

        return $rs;
    }
    public function getSoldeTotal(){
        $query = "SELECT SUM(debit_transac) - SUM(credit_transac) as solde FROM money
        WHERE reseau = :rsId";
        $rs = $this->bdd->query($query);
        return $rs;
    }


    public function getGainTotal(){
        $query = "SELECT SUM(gain) as solde FROM money";
        $rs = $this->bdd->query($query);
        return $rs;

    }
  public function getGainTotalLiquide(){
        $query = "SELECT SUM(debit_transac) as solde FROM money";
        $rs = $this->bdd->query($query);
        return $rs;

    }
    public function getGainTotals(){
        $query = "SELECT SUM(debit_transac) - SUM(credit_transac) as solde FROM money";
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



    //Liquide table

    public function addLiq($liqDate,$debitTransac,$creditTransac){
        $query = "INSERT INTO liquide(date_liquide,debit_transac,credit_transac)
            VALUES (:liqDate,:debitTransac,:creditTransac)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "liqDate" => $liqDate,
            "debitTransac" => $debitTransac,
            "creditTransac" => $creditTransac
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


//Count

    public function getLiquide(){
        $query = "SELECT SUM(debit_transac) - SUM(credit_transac) as solde FROM liquide";
        $rs = $this->bdd->query($query);
        return $rs;

    }









}

// Instance
$money = new Money();