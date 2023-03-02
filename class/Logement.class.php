<?php
class Logement{
    public function __construct() {
        $this->bdd = bdd();
    }


// Create

    public function addDescription($date_lgt,$nom_lgt,$slug_lgt,$categorie,$superficie,$chambre,$lit,$bain ,$description,$infos_sup,$utilisateur_id){
        $query = "INSERT INTO logement(date_lgt,nom_lgt,slug_lgt,categorie,superficie,chambres,lit,bain,description,infos_sup, utilisateur_id)
            VALUES (:date_lgt,:nom_lgt,:slug_lgt,:categorie,:superficie,:chambre,:lit,:bain ,:description,:infos_sup,:utilisateur_id)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "date_lgt" => $date_lgt,
            "nom_lgt" => $nom_lgt,
            "slug_lgt" => $slug_lgt,
            "categorie" => $categorie,
            "superficie" => $superficie,
            "chambre" => $chambre,
            "lit" => $lit,
            "bain" => $bain ,
            "description" => $description,
            "infos_sup" => $infos_sup,
            "utilisateur_id" => $utilisateur_id
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }




    //Read

    public function getLogementByUserId($idUsr){
        $query = "SELECT * FROM logement
        WHERE utilisateur_id = :idUsr";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "idUsr" => $idUsr
        ));
        return $rs;
    }





    public function getLogementById($idLogt){
        $query = "SELECT * FROM logement
        WHERE id_logement = :idLogt";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "idLogt" => $idLogt
        ));
        return $rs;
    }




    public function getLogementByIdAndUser($utilisateur_id,$id_logement){
        $query = "SELECT * FROM logement
        WHERE utilisateur_id  = :utilisateur_id AND id_logement = :id_logement";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id_logement" => $id_logement,
            "utilisateur_id" => $utilisateur_id
        ));
        return $rs;
    }




    public function getLogementByUser($utilisateur_id,$debut, $fin){
        $query = "SELECT * FROM logement
        WHERE utilisateur_id  = :utilisateur_id ORDER BY id_logement DESC LIMIT $debut, $fin";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "utilisateur_id" => $utilisateur_id
        ));
        return $rs;
    }
    public function getAllLogements($debut, $fin){
        $query = "SELECT * FROM logement
        WHERE statut != 1 ORDER BY id_logement DESC LIMIT $debut, $fin";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getAllLgts(){
        $query = "SELECT * FROM logement
          WHERE statut = 0 ORDER BY id_logement DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getAllVille(){
        $query = "SELECT DISTINCT ville_lgt FROM logement
         ORDER BY id_logement DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getAllQuartier(){
        $query = "SELECT DISTINCT quartier_lgt FROM logement
         ORDER BY id_logement DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getLgtsSlug($slg){
        $query = "SELECT * FROM logement
           WHERE slug_lgt =:slg";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slg" => $slg
        ));
        return $rs;
    }
    public function getLgtsSlugAndUser($userId,$slg){
        $query = "SELECT * FROM logement
           WHERE utilisateur_id =:userId and slug_lgt =:slg";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId,
            "slg" => $slg
        ));
        return $rs;
    }

    // Search

    public function getLgtsBySearch($villeLgt,$communeLgt){
        $query = "SELECT * FROM logement
        WHERE ville_lgt LIKE '%$villeLgt%' OR quartier_lgt  LIKE '%$communeLgt%' ORDER BY id_logement DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }


    //Count


    public function getNblogementsByUser($userId){
        $query = "SELECT COUNT(*) as nb FROM logement
          WHERE utilisateur_id =:userId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));
        return $rs;
    }
    public function getNblogements(){
        $query = "SELECT COUNT(*) as nb FROM logement
          WHERE statut != 1";
        $rs = $this->bdd->query($query);
        return $rs;
    }



    //Update

    public function updateData3($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }
    public function updateData4($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "val4" => $val4,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }
    public function updateData6($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "val4" => $val4,
            "val5" => $val5,
            "val6" => $val6,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }
    public function updateData7($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$propriete7,$val7,$id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "val4" => $val4,
            "val5" => $val5,
            "val6" => $val6,
            "val7" => $val7,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }

    public function updateData8($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$propriete7,$val7,$propriete8,$val8,$id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "val4" => $val4,
            "val5" => $val5,
            "val6" => $val6,
            "val7" => $val7,
            "val8" => $val8,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }
    public function updateData9($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$propriete7,$val7,$propriete8,$val8,$propriete9,$val9,$id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8, $propriete9 = :val9
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "val4" => $val4,
            "val5" => $val5,
            "val6" => $val6,
            "val7" => $val7,
            "val8" => $val8,
            "val9" => $val9,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }
    public function updateData10($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$propriete7,$val7,$propriete8,$val8,$propriete9,$val9,$propriete10,$val10,$id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8, $propriete9 = :val9, $propriete10 = :val10
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "val4" => $val4,
            "val5" => $val5,
            "val6" => $val6,
            "val7" => $val7,
            "val8" => $val8,
            "val9" => $val9,
            "val10" => $val10,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }

    public function updateData11($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$propriete7,$val7,$propriete8,$val8,$propriete9,$val9,$propriete10,$val10,$propriete11,$val11,$id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8, $propriete9 = :val9, $propriete10 = :val10, $propriete11 = :val11
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "val4" => $val4,
            "val5" => $val5,
            "val6" => $val6,
            "val7" => $val7,
            "val8" => $val8,
            "val9" => $val9,
            "val10" => $val10,
            "val11" => $val11,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }



    public function updateData32($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$propriete7,$val7,
                                 $propriete8,$val8,$propriete9,$val9,$propriete10,$val10,$propriete11,$val11,$propriete12,$val12,$propriete13,$val13,
                                 $propriete14,$val14,$propriete15,$val15,$propriete16,$val16,$propriete17,$val17,$propriete18,$val18,$propriete19,$val19,$propriete20,$val20,
                                 $propriete21,$val21,$propriete22,$val22,$propriete23,$val23,$propriete24,$val24,$propriete25,$val25,$propriete26,$val26,
                                 $propriete27,$val27,$propriete28,$val28,$propriete29,$val29,$propriete30,$val30, $id){
        $query = "UPDATE logement
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6,
             $propriete7 = :val7, $propriete8 = :val8, $propriete9 = :val9, $propriete10 = :val10, $propriete11 = :val11, $propriete12 = :val12,
             $propriete13 = :val13, $propriete14 = :val14,$propriete15 = :val15,$propriete16 = :val16,$propriete17 = :val17,$propriete18 = :val18,
             $propriete19 = :val19, $propriete20 = :val20,$propriete21 = :val21,$propriete22 = :val22,$propriete23 = :val23,$propriete24 = :val24,
             $propriete25 = :val25, $propriete26 = :val26,$propriete27 = :val27,$propriete28 = :val28,$propriete29 = :val29,$propriete30 = :val30
            WHERE id_logement = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "val3" => $val3,
            "val4" => $val4,
            "val5" => $val5,
            "val6" => $val6,
            "val7" => $val7,
            "val8" => $val8,
            "val9" => $val9,
            "val10" => $val10,
            "val11" => $val11,
            "val12" => $val12,
            "val13" => $val13,
            "val14" => $val14,
            "val15" => $val15,
            "val16" => $val16,
            "val17" => $val17,
            "val18" => $val18,
            "val19" => $val19,
            "val20" => $val20,
            "val21" => $val21,
            "val22" => $val22,
            "val23" => $val23,
            "val24" => $val24,
            "val25" => $val25,
            "val26" => $val26,
            "val27" => $val27,
            "val28" => $val28,
            "val29" => $val29,
            "val30" => $val30,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }

    // Verification valeur existant
    public function verifLogement($propriete,$val){
        $query = "SELECT * FROM logement WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }




}

$logement = new Logement();