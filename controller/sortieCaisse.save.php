<?php

if(isset($_SESSION['_ccgim_201'])  and isset($_POST['libelle']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $libelle = htmlentities(trim(addslashes(strip_tags($libelle))));

    $lgt_id = 1;
    $locataire = 1;
    $type_transac = 2;
    $debit = 0;
    $type_transac = 1;
    $credit = $montant;
    $solde = $gain->getGainTotal()->fetch();

    if($montant <= $solde['solde']){
        $save = $tresorerie->RetraitOperation($dateGmt,$_SESSION['_ccgim_201']['id_utilisateur'],$lgt_id,$type_transac,$libelle,$debit,$credit);
        if($save > 0){
            $payGain = $gain->addGain($dateGmt,$lgt_id,$credit,$type_transac);
            echo 'ok';
        }
    }else{
        echo 'solde';
    }

}