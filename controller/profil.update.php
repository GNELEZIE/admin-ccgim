<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['ville']) and isset($_POST['phone']) and isset($_POST['contribuable'])  and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']) {
    extract($_POST);
    $nom = htmlentities(trim(addslashes(strip_tags($nom))));
    $prenom = htmlentities(trim(addslashes(strip_tags($prenom))));
    $email = htmlentities(trim(addslashes(strip_tags($email))));
    $ville = htmlentities(trim(addslashes(strip_tags($ville))));
    $phone = htmlentities(trim(addslashes(strip_tags($phone))));
    $isoPhone = htmlentities(trim(addslashes(strip_tags($isoPhone))));
    $dialPhone = htmlentities(trim(addslashes(strip_tags($dialPhone))));
    $postale = htmlentities(trim(addslashes(strip_tags($postale))));
    $banque = htmlentities(trim(addslashes(strip_tags($banque))));
    $contribuable = htmlentities(trim(addslashes(strip_tags($contribuable))));
    $mecano = htmlentities(trim(addslashes(strip_tags($mecano))));
    $service = htmlentities(trim(addslashes(strip_tags($service))));

    $propriete1 = 'nom';
    $propriete2 = 'prenom';
    $propriete3 = 'email';
    $propriete4 = 'ville';
    $propriete5 = 'phone';
    $propriete6 = 'iso_phone';
    $propriete7 = 'dial_phone';
    $propriete8 = 'postale';
    $propriete9 = 'banque';
    $propriete10 = 'contribuable';
    $propriete11 = 'mecano';
    $propriete12 = 'service';
    $propriete13 = 'slug';

    $slug = create_slug($_POST['prenom']);
    $verifSlug = $utilisateur->verifUtilisateur($propriete2,$prenom);
    $rsSlug = $verifSlug->fetch();
    $nbSlug =$verifSlug->rowCount();

    if($nbSlug > 0 AND $rsSlug['id_utilisateur'] != $_SESSION['_ccgim_201']['id_utilisateur']){
        $slug = $slug.'-'.$nbSlug;
    }
    $dat = $utilisateur->getUtilisateurById($_SESSION['_ccgim_201']['id_utilisateur'])->fetch();
    if($dat['email'] != '' and $dat['email'] != $email){
        $errors['upd'] = 'Votre adresse email existe déjà';
    }else{
        $upds = $utilisateur->updateData13($propriete1,$nom,$propriete2,$prenom,$propriete3,$email,$propriete4,$ville,$propriete5,$phone,$propriete6,$isoPhone,$propriete7,$dialPhone,$propriete8,$postale,$propriete9,$banque,$propriete10,$contribuable,$propriete11,$mecano,$propriete12,$service,$propriete13,$slug,$_SESSION['_ccgim_201']['id_utilisateur']);
        if($upds > 0){
            $data = $utilisateur->getUtilisateurById($_SESSION['_ccgim_201']['id_utilisateur'])->fetch();
            $success['message'] = 'Votre profil a été mis à jour !!!';
        }
    }

}