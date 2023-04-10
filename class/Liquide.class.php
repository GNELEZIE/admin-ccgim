<?php
class Liquide
{

    public function __construct()
    {
        $this->bdd = bdd();
    }

    //Create

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
$liquide = new Liquide();