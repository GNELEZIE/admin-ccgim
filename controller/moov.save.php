<?php

if(isset($_SESSION['_ccgim_201']) and isset($_POST['type_transac']) and isset($_POST['libelle']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $type_transac = htmlentities(trim(addslashes(strip_tags($type_transac))));
    $libelle = htmlentities(trim(addslashes(strip_tags($libelle))));
    $montant = htmlentities(trim(addslashes(strip_tags($montant))));
    $reseau = 3;
    if(is_numeric($montant)) {

        if($type_transac == 1){
            $debitTransac = $montant;
            $creditTransac = 0;

            $save = $money->addOrange($dateGmt,$reseau,$libelle,$type_transac,$debitTransac,$creditTransac,$_SESSION['_ccgim_201']['id_utilisateur']);

            if($save > 0){
                echo 'ok';
            }
        }elseif($type_transac == 2){
            $debitTransac = 0;
            $creditTransac = $montant;

            $solde = $money->getSoldeByIdResau(1)->fetch();

            if($montant <= $solde['solde']){
                $save = $money->addOrange($dateGmt,$reseau,$libelle,$type_transac,$debitTransac,$creditTransac,$_SESSION['_ccgim_201']['id_utilisateur']);
                if($save > 0){
                    echo 'ok';
                }
            }else{
                echo 'solde';
            }
        }
    }




}