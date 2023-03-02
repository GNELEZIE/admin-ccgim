<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['ville']) and isset($_POST['id']) and isset($_POST['qrt']) and isset($_POST['nom']) and isset($_POST['phone']) and isset($_SESSION['myformkey']) and isset($_POST['formkeyLocalisation']) and $_SESSION['myformkey'] == $_POST['formkeyLocalisation']){
    extract($_POST);
    $id = my_decrypt($id);
    $ville = htmlentities(trim(addslashes(strip_tags($ville))));
    $qrt = htmlentities(trim(addslashes(strip_tags($qrt))));
    $nom = htmlentities(trim(addslashes(strip_tags($nom))));
    $phone = htmlentities(trim(addslashes(strip_tags($phone))));
    $isoPhone = htmlentities(trim(addslashes(strip_tags($isoPhone))));
    $dialPhone = htmlentities(trim(addslashes(strip_tags($dialPhone))));
    $propriety ='id_logement';
    $dataSlug = $logement->verifLogement($propriety,$id)->fetch();

    $nbUpd = $dataSlug['nb_upd'] + 1;
    $propriete1 = "ville_lgt";
    $propriete2 = "quartier_lgt";
    $propriete3 = "nom_agent";
    $propriete4 = "iso_phone_lgt";
    $propriete5 = "dial_phone_lgt";
    $propriete6 = "phone_lgt";
    $propriete7= "nb_upd";


    $update = $logement->updateData7($propriete1,$ville,$propriete2,$qrt,$propriete3,$nom,$propriete4,$isoPhone,$propriete5,$dialPhone,$propriete6,$phone,$propriete7,$nbUpd,$dataSlug['id_logement']);

    if($update > 0){
       header('location:' . $domaine . '/annonce/galerie/'.$dataSlug['slug_lgt']);
   }



}
