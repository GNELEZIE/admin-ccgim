<?php

if(isset($_SESSION['_ccgim_201']) and isset($_POST['type_transac']) and isset($_POST['libelle']) and isset($_POST['montant']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $type_transac = htmlentities(trim(addslashes(strip_tags($type_transac))));
    $libelle = htmlentities(trim(addslashes(strip_tags($libelle))));
    $locataire = htmlentities(trim(addslashes(strip_tags($locataire))));
    $montant = htmlentities(trim(addslashes(strip_tags($montant))));
    $dts = htmlentities(trim(addslashes(strip_tags($dts))));

    if(is_numeric($montant)){

        if($type_transac == 1){
            $debit = $montant;
            $credit = 0;
            $save = $tresorerie->addOperation($dts,$locataire,$type_transac,$libelle,$debit,$credit);
            if($save > 0){
                echo 'ok';
            }
        }
        elseif($type_transac == 2){
            $locataire = 1;
            $debit = 0;
            $credit = $montant;
            $solde = $tresorerie->getSoldeTotal()->fetch();

            if($montant <= $solde['solde']){
                $save = $tresorerie->addOperation($dts,$locataire,$type_transac,$libelle,$debit,$credit);
                if($save > 0){
                    echo 'ok';
                }
            }else{
                echo 'solde';
            }
        }
    }
}