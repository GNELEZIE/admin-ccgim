<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['nom_lgt']) and isset($_POST['categorie']) and isset($_POST['superficie']) and isset($_POST['chambre']) and isset($_POST['salles_bain']) and isset($_POST['lit']) and isset($_POST['supplementaire']) and isset($_POST['descriptions'])  and isset($_SESSION['myformkey']) and isset($_POST['formkeyDesc']) and $_SESSION['myformkey'] == $_POST['formkeyDesc']){
    extract($_POST);
    $slug = create_slug($_POST['nom_lgt']);
    $nom_lgt = htmlentities(trim(addslashes(strip_tags($nom_lgt))));
    $categorie = htmlentities(trim(addslashes(strip_tags($categorie))));
    $superficie = htmlentities(trim(addslashes(strip_tags($superficie))));
    $chambre = htmlentities(trim(addslashes(strip_tags($chambre))));
    $salles_bain = htmlentities(trim(addslashes(strip_tags($salles_bain))));
    $lit = htmlentities(trim(addslashes(strip_tags($lit))));
    $descriptions = htmlentities(trim(addslashes(strip_tags($descriptions))));
    $supplementaire = htmlentities(trim(addslashes(strip_tags($supplementaire))));
    $superficie = v_p($superficie);
    $propriety = 'nom_lgt';
    $verifSlug = $logement->verifLogement($propriety,$nom_lgt);
    $rsSlug = $verifSlug->fetch();
    $nbSlug =$verifSlug->rowCount();
    if($nbSlug > 0 ){
        $slug = $slug.'-'.$nbSlug;
    }

    $save = $logement->addDescription($dateGmt,$nom_lgt,$slug,$categorie,$superficie,$chambre,$lit,$salles_bain ,$descriptions,$supplementaire,$_SESSION['_ccgim_201']['id_utilisateur']);
    if($save > 0){
        header('location:' . $domaine . '/annonce/localisation/'.$slug);
    }
}
