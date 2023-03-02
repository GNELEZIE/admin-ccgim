<?php
class Tresorerie
{

    public function __construct()
    {
        $this->bdd = bdd();
    }

    //Create

    public function addOperation($dateOperation,$idUser,$lgtsId,$typeOp,$libelle,$debit,$credit){
        $query = "INSERT INTO tresorerie(date_tresorerie,user_id ,lgts_id,type_transac,libelle_transac,debit_transac,credit_transac,ref_paiement)
            VALUES (:dateOperation,:idUser,:lgtsId,:typeOp,:libelle,:debit,:credit,:refPaiement)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateOperation" => $dateOperation,
            "idUser" => $idUser,
            "lgtsId" => $lgtsId,
            "typeOp" => $typeOp,
            "libelle" => $libelle,
            "debit" => $debit,
            "credit" => $credit,
            "refPaiement" => $this->refPaiement()
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    public function RetraitOperation($dateOperation,$idUser,$lgtsId,$typeOp,$libelle,$debit,$credit){
        $query = "INSERT INTO tresorerie(date_tresorerie,user_id ,lgts_id,type_transac,libelle_transac,debit_transac,credit_transac,ref_paiement)
            VALUES (:dateOperation,:idUser,:lgtsId,:typeOp,:libelle,:debit,:credit,:refPaiement)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateOperation" => $dateOperation,
            "idUser" => $idUser,
            "lgtsId" => $lgtsId,
            "typeOp" => $typeOp,
            "libelle" => $libelle,
            "debit" => $debit,
            "credit" => $credit,
            "refPaiement" => $this->refPaiement()
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


//Read
    public function getPaiementHistoByUser($userId){
        $query = "SELECT * FROM tresorerie
        WHERE user_id =:userId
        ORDER BY id_tresorerie DESC";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));

        return $rs;
    }

    public function getCinqPayByUserId($userId){
        $query = "SELECT * FROM tresorerie
                  INNER JOIN logement ON id_logement = lgts_id
                  WHERE  utilisateur_id =:userId ORDER BY id_tresorerie DESC LIMIT 5";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));

        return $rs;
    }


    public function getCinqPaiementByUserId($userId){
        $query = "SELECT * FROM tresorerie
        WHERE user_id  =:userId  ORDER BY id_tresorerie DESC LIMIT 5";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));

        return $rs;
    }

    public function getPaiementByUserIdJoin(){
        $query = "SELECT * FROM tresorerie
         INNER JOIN utilisateur ON id_utilisateur = user_id
         ORDER BY id_tresorerie DESC";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getPaiementByUserId($userId){
        $query = "SELECT * FROM tresorerie
        WHERE user_id  =:userId  ORDER BY id_tresorerie DESC";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));

        return $rs;
    }





    public function getCinqPaiement(){
        $query = "SELECT * FROM tresorerie
        INNER JOIN  utilisateur ON id_utilisateur  = user_id
        WHERE type_transac = 1 ORDER BY id_tresorerie DESC LIMIT 5";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getAllPaiement(){
        $query = "SELECT * FROM tresorerie
        INNER JOIN  locataire ON id_locataire  = user_id
        ORDER BY id_tresorerie DESC";
        $rs = $this->bdd->query($query);
        return $rs;
    }
  public function getPaiementByUser($userId){
        $query = "SELECT * FROM tresorerie
        INNER JOIN  utilisateur ON id_utilisateur  = user_id
        WHERE user_id =:userId
        ORDER BY id_tresorerie DESC";
      $rs = $this->bdd->prepare($query);
      $rs->execute(array(
          "userId" => $userId
      ));

      return $rs;
    }
    public function getLastPaiementByUser($userId){
        $query = "SELECT * FROM tresorerie
        INNER JOIN  locataire ON id_locataire  = user_id
        WHERE user_id =:userId
        ORDER BY id_tresorerie DESC LIMIT 1";
      $rs = $this->bdd->prepare($query);
      $rs->execute(array(
          "userId" => $userId
      ));

      return $rs;
    }


//Count
    public function getSoldeTotalByProprietaire($propId){
        $query = "SELECT SUM(debit_transac) - SUM(credit_transac) as solde FROM tresorerie
                   INNER JOIN logement ON id_logement = lgts_id
                  WHERE utilisateur_id =:propId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "propId" => $propId
        ));

        return $rs;
    }


    public function getAllCreditByProprietaire($propId){
        $query = "SELECT SUM(credit_transac) as solde FROM tresorerie
                  INNER JOIN logement ON id_logement = lgts_id
                  WHERE utilisateur_id =:propId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "propId" => $propId
        ));

        return $rs;
    }





    public function getSoldeTotal(){
        $query = "SELECT SUM(debit_transac) - SUM(credit_transac) as solde FROM tresorerie";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    // Autre

    public function getPaiementMontByMonth($annee,$mois){
        $query = "SELECT SUM(debit_transac) as solde FROM tresorerie
        WHERE YEAR (STR_TO_DATE(date_tresorerie, '%Y-%m-%d'))= :annee AND MONTH (STR_TO_DATE(date_tresorerie, '%Y-%m-%d'))= :mois";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "annee" => $annee,
            "mois" => $mois
        ));

        return $rs;
    }
    public function getRetraitMontByMonth($annee,$mois){
        $query = "SELECT SUM(credit_transac) as solde FROM tresorerie
        WHERE YEAR (STR_TO_DATE(date_tresorerie, '%Y-%m-%d'))= :annee AND MONTH (STR_TO_DATE(date_tresorerie, '%Y-%m-%d'))= :mois";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "annee" => $annee,
            "mois" => $mois
        ));

        return $rs;
    }



    public function getAllCredit(){
        $query = "SELECT SUM(credit_transac) as solde FROM tresorerie";
        $rs = $this->bdd->query($query);
        return $rs;
    }




    public function refPaiement(){
        $annee = date('Y');
        $query = "SELECT ref_paiement FROM tresorerie
        WHERE YEAR (STR_TO_DATE(date_tresorerie, '%Y-%m-%d'))= $annee
        ORDER BY id_tresorerie  DESC";
        $format = 'Ref'.date('my').'000000';
        if($rs = $this->bdd->query($query)->fetch()){
            $numero = intval(substr($rs['ref_paiement'],7)) + 1;
            if(date('m') == '01'){
                if($numero > 1000){
                    $num = substr_replace($format,1, -strlen(1));
                }else {
                    $num = substr_replace($format,$numero, -strlen($numero));
                }
            }else{
                $num = substr_replace($format,$numero, -strlen($numero));
            }
        }else{
            $num = substr_replace($format,1, -strlen(1));
        }
        return $num;
    }




}

// Instance
$tresorerie = new Tresorerie();