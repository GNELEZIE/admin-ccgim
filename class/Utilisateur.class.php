<?php
class Utilisateur
{

    public function __construct()
    {
        $this->bdd = bdd();
    }

    //Create
    public function addLocataire($userDate,$email,$slug,$nom,$prenom,$isophone,$dialPhone,$phone,$mot_de_passe,$typeCompte){
        $query = "INSERT INTO utilisateur(date_utilisateur,email,slug,nom,prenom,iso_phone,dial_phone,phone,mot_de_passe,type_compte)
            VALUES (:userDate,:email,:slug,:nom,:prenom,:isophone,:dialPhone,:phone,:mot_de_passe,:typeCompte)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userDate" => $userDate,
            "email" => $email,
            "slug" => $slug,
            "nom" => $nom,
            "prenom" => $prenom,
            "isophone" => $isophone,
            "dialPhone" => $dialPhone,
            "phone" => $phone,
            "mot_de_passe" => $mot_de_passe,
            "typeCompte" => $typeCompte
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    public function addUtilisateur($userDate,$email,$mot_de_passe,$typeCompte){
        $query = "INSERT INTO utilisateur(date_utilisateur,email,mot_de_passe,type_compte)
            VALUES (:userDate,:email,:mot_de_passe,:typeCompte)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userDate" => $userDate,
            "email" => $email,
            "mot_de_passe" => $mot_de_passe,
            "typeCompte" => $typeCompte
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    public function addUtilisateurByPhone($userDate,$phone,$isoPhone,$dialPhone,$code,$date_phone,$mot_de_passe){
        $query = "INSERT INTO utilisateur(date_utilisateur,phone,iso_phone,dial_phone,code,date_phone,mot_de_passe)
            VALUES (:userDate,:phone,:isoPhone,:dialPhone,:code,:date_phone,:mot_de_passe)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userDate" => $userDate,
            "phone" => $phone,
            "isoPhone" => $isoPhone,
            "dialPhone" => $dialPhone,
            "code" => $code,
            "date_phone" => $date_phone,
            "mot_de_passe" => $mot_de_passe
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

//Read


    public function getLocataireBySlug($slg){
        $query = "SELECT * FROM utilisateur
          WHERE  slug =:slg";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slg" => $slg
        ));
        return $rs;
    }
    public function getUtilisateurByEmail($email){

        $query = "SELECT * FROM utilisateur
        WHERE email = :email";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "email" => $email
        ));

        return $rs;
    }
    public function getUtilisateurById($id){
        $query = "SELECT * FROM utilisateur
        WHERE id_utilisateur = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }

    public function getUtilisateurByPhone($phone,$dialPhone){

        $query = "SELECT * FROM utilisateur
        WHERE phone = :phone AND dial_phone = :dialPhone";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "phone" => $phone,
            "dialPhone" => $dialPhone
        ));

        return $rs;
    }

    public function getUtilisateurByData2($proprio,$userId,$proprioCode,$code){
        $query = "SELECT * FROM utilisateur
        WHERE $proprio =:userId and $proprioCode = :code";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "code" => $code,
            "userId" => $userId
        ));

        return $rs;
    }

//Update

    // Update MP
    public function updatePassword($password,$id){
        $query = "UPDATE utilisateur
            SET mot_de_passe = :password WHERE id_utilisateur = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "password" => $password,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }
    public function updateData($propriete,$val,$id){
        $query = "UPDATE utilisateur
            SET $propriete = :val
            WHERE id_utilisateur = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }
    public function updateData2($propriete1,$val1,$propriete2,$val2,$id){
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1,$propriete2 = :val2
            WHERE id_utilisateur = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val1" => $val1,
            "val2" => $val2,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }
    public function updateData4($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$id){
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1,$propriete2 = :val2,$propriete3 = :val3,$propriete4 = :val4
            WHERE id_utilisateur = :id";
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
    public function updateUtilisateurPhoto($photo,$id){
        $query = "UPDATE utilisateur
            SET photo = :photo
            WHERE id_utilisateur = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "photo" => $photo,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

    public function updateData6($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$id){
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6
            WHERE id_utilisateur = :id";
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
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7
            WHERE id_utilisateur = :id";
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
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8
            WHERE id_utilisateur = :id";
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
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8, $propriete9 = :val9
            WHERE id_utilisateur = :id";
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
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8, $propriete9 = :val9, $propriete10 = :val10
            WHERE id_utilisateur = :id";
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
    public function updateData12($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$propriete7,$val7,$propriete8,$val8,$propriete9,$val9,$propriete10,$val10,$propriete11,$val11,$propriete12,$val12,$id){
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8, $propriete9 = :val9, $propriete10 = :val10, $propriete11 = :val11, $propriete12 = :val12
            WHERE id_utilisateur = :id";
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
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }
    public function updateData13($propriete1,$val1,$propriete2,$val2,$propriete3,$val3,$propriete4,$val4,$propriete5,$val5,$propriete6,$val6,$propriete7,$val7,$propriete8,$val8,$propriete9,$val9,$propriete10,$val10,$propriete11,$val11,$propriete12,$val12,$propriete13,$val13,$id){
        $query = "UPDATE utilisateur
            SET $propriete1 = :val1, $propriete2 = :val2, $propriete3 = :val3, $propriete4 = :val4, $propriete5 = :val5, $propriete6 = :val6, $propriete7 = :val7, $propriete8 = :val8, $propriete9 = :val9, $propriete10 = :val10, $propriete11 = :val11, $propriete12 = :val12, $propriete13 = :val13
            WHERE id_utilisateur = :id";
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
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }

    // Verification valeur existant
    public function verifUtilisateur($propriete,$val){

        $query = "SELECT * FROM utilisateur WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }
}

// Instance
$utilisateur = new Utilisateur();