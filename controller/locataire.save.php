<?php

if(isset($_SESSION['_ccgim_201']) and isset($_POST['lgt']) and isset($_POST['noms']) and isset($_POST['prenom']) and isset($_POST['phone']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $slug = create_slug($_POST['noms']);

    $lgt = htmlentities(trim(addslashes(strip_tags($lgt))));
    $noms = htmlentities(trim(addslashes(strip_tags($noms))));
    $prenom = htmlentities(trim(addslashes(strip_tags($prenom))));
    $phone = htmlentities(trim(addslashes(strip_tags($phone))));
    $isoPhone = htmlentities(trim(addslashes(strip_tags($isoPhone))));
    $dialPhone = htmlentities(trim(addslashes(strip_tags($dialPhone))));

    $propriety = 'nom';

    $verifSlug = $utilisateur->verifUtilisateur($propriety,$noms);

    $rsSlug = $verifSlug->fetch();
    $nbSlug =$verifSlug->rowCount();
    $typeCompte = 1;
    $password = $phone;
    $email = 'locataire@cabinet-ccgim.com';
    $options = ['cost' => 12];
    $mdpCript = password_hash($password, PASSWORD_BCRYPT, $options);

    if($nbSlug > 0 ){
        $slug = $slug.'-'.$nbSlug;
    }
    $save = $utilisateur->addLocataire($dateGmt,$email,$slug,$noms,$prenom,$isoPhone,$dialPhone,$phone,$mdpCript,$typeCompte);
    if($save > 0){
        $savaLaction = $location->addLocation($dateGmt,$save,$lgt);
        echo 'ok';
    }


}
