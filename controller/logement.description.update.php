<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['nom_lgt']) and isset($_POST['id']) and isset($_POST['categorie']) and isset($_POST['superficie']) and isset($_POST['chambre']) and isset($_POST['salles_bain']) and isset($_POST['lit']) and isset($_POST['supplementaire']) and isset($_POST['descriptions'])  and isset($_SESSION['myformkey']) and isset($_POST['formkeyDesc']) and $_SESSION['myformkey'] == $_POST['formkeyDesc']){
    extract($_POST);
    $id = my_decrypt($id);
    $nom_lgt = htmlentities(trim(addslashes(strip_tags($nom_lgt))));
    $categorie = htmlentities(trim(addslashes(strip_tags($categorie))));
    $superficie = htmlentities(trim(addslashes(strip_tags($superficie))));
    $chambre = htmlentities(trim(addslashes(strip_tags($chambre))));
    $salles_bain = htmlentities(trim(addslashes(strip_tags($salles_bain))));
    $lit = htmlentities(trim(addslashes(strip_tags($lit))));
    $descriptions = htmlentities(trim(addslashes(strip_tags($descriptions))));
    $supplementaire = htmlentities(trim(addslashes(strip_tags($supplementaire))));
    $superficie = v_p($superficie);
    $propriety ='id_logement';
    $propriete1= "nom_lgt";
    $propriete2= "categorie";
    $propriete3= "superficie";
    $propriete4= "chambres";
    $propriete5= "bain";
    $propriete6= "lit";
    $propriete7= "description";
    $propriete8= "infos_sup";
    $propriete9= "nb_upd";

    $dataSlug = $logement->verifLogement($propriety,$id)->fetch();
    $nbUpd = $dataSlug['nb_upd'] + 1;

    $upd = $logement->updateData9($propriete1,$nom_lgt,$propriete2,$categorie,$propriete3,$superficie,$propriete4,$chambre,$propriete5,$salles_bain,$propriete6,$lit,$propriete7,$descriptions,$propriete8,$supplementaire,$propriete9,$nbUpd,$dataSlug['id_logement']);

    if($upd > 0) {
        header('location:' . $domaine . '/annonce/localisation/' . $dataSlug['slug_lgt']);
    }
}
