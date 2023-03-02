<?php

if(isset($_SESSION['_ccgim_201']) and isset($_POST['type_transac']) and isset($_POST['maison']) and isset($_POST['libelle']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $type_transac = htmlentities(trim(addslashes(strip_tags($type_transac))));
    $libelle = htmlentities(trim(addslashes(strip_tags($libelle))));
    $maison = htmlentities(trim(addslashes(strip_tags($maison))));
    $list = $logement->getLogementById($maison);
    if($dat = $list->fetch()){
        $montant = $dat['tarif'];
    }else{
        $montant = '';
    }
    if(is_numeric($montant)){
        if($type_transac == 1){
            $debit = $montant;
            $credit = 0;
            $save = $tresorerie->addOperation($dateGmt,$_SESSION['_ccgim_201']['id_utilisateur'],$maison,$type_transac,$libelle,$debit,$credit);
            if($save > 0){
                echo 'ok';
            }
        }
        elseif($type_transac == 2){
            $debit = 0;
            $credit = $montant;
            $solde = $tresorerie->getSoldeTotal()->fetch();

            if($montant <= $solde['solde']){
                $save = $tresorerie->addOperation($dateGmt,$_SESSION['_ccgim_201']['id_utilisateur'],$maison,$type_transac,$libelle,$debit,$credit);
                if($save > 0){
                    echo 'ok';
                }
            }else{
                echo 'solde';
            }
        }
    }
}