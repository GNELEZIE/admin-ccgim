<?php

if(isset($_SESSION['_ccgim_201']) and isset($_POST['reseau']) and isset($_POST['montant']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){

    extract($_POST);

    $reseau = htmlentities(trim(addslashes(strip_tags($reseau))));
    $montant = htmlentities(trim(addslashes(strip_tags($montant))));
    $type_transac = 1;
    $creditTransac = 0;
    $client = 'CCGIM';
    $contact = '0707856528';
    $slodeDispo = $money->getSoldeDispoByIdResau($reseau)->fetch();
    $slod_disp = $slodeDispo['solde'];
    if($slod_disp == ''  ){
        $slod_dispo = 0;
    }else{
        $slod_dispo = $slodeDispo['solde'];
    }
    if(is_numeric($montant)) {
        $soldeAp = $slod_dispo+$montant;
        $save = $money->addOrange($dateGmt,$reseau,$type_transac,$montant,$creditTransac,$_SESSION['_ccgim_201']['id_utilisateur'],$client,$contact,$slod_dispo,$soldeAp);
       if($save > 0){
           echo 'ok';
       }
    }




}