<?php

if(isset($_SESSION['_ccgim_201']) and isset($_POST['userId']) and isset($_POST['libelle']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $libelle = htmlentities(trim(addslashes(strip_tags($libelle))));
    $userId = htmlentities(trim(addslashes(strip_tags($userId))));
    $lgt_id = htmlentities(trim(addslashes(strip_tags($lgt_id))));
    $taux = htmlentities(trim(addslashes(strip_tags($taux))));
    $mont = htmlentities(trim(addslashes(strip_tags($mont))));

    $type_transac  = 1;
    $lgt = $logement->getLogementById($lgt_id);
    if($lgtDat = $lgt->fetch()){
        $debit = $mont;
        $credit = 0;
        $save = $tresorerie->addOperation($dateGmt,$userId,$lgt_id,$type_transac,$libelle,$debit,$credit);
        if($save > 0){
            $type_transac = 0;
            $mygain = gain($debit,$taux);
            $payGain = $gain->addGain($dateGmt,$lgt_id,$mygain,$type_transac,$taux);
            echo 'ok';
        }
    }
}