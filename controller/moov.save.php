<?php

if(isset($_SESSION['_ccgim_201']) and isset($_POST['type_transac']) and isset($_POST['montant']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);


    $type_transac = htmlentities(trim(addslashes(strip_tags($type_transac))));
    $montant = htmlentities(trim(addslashes(strip_tags($montant))));
    $client = htmlentities(trim(addslashes(strip_tags($client))));
    $contact = htmlentities(trim(addslashes(strip_tags($contact))));
    $reseau = 3;
    $slodeDispo = $money->getSoldeDispoByIdResau($reseau)->fetch();
    $slod_disp = $slodeDispo['solde'];
    $monts = $money->getLiquide()->fetch();

    if($slod_disp == ''  ){
        $slod_dispo = 0;
    }else{
        $slod_dispo = $slodeDispo['solde'];
    }
    if(is_numeric($montant)) {

        if($type_transac == 1){
            $debitTransac = $montant;
            $creditTransac = 0;
            $mc = $monts['solde']-$montant;
            if($mc > 0){
                $soldeAp = $slod_dispo+$montant;
                $save = $money->addOrange($dateGmt,$reseau,$type_transac,$debitTransac,$creditTransac,$_SESSION['_ccgim_201']['id_utilisateur'],$client,$contact,$slod_dispo,$soldeAp);
                if($save > 0){
                    $liq = $money->addLiq($dateGmt,$creditTransac,$montant);
                    echo 'ok';
                    exit;
                }
            }else{
                echo 'solde';
            }

        }elseif($type_transac == 2){
            $debitTransac = 0;
            $creditTransac = $montant;
            $solde = $money->getSoldeByIdResau(1)->fetch();

            if($montant <= $solde['solde']){
                $liq = $money->addLiq($dateGmt,$montant,$debitTransac);
                $soldeAp = $slod_dispo-$montant;
                $save = $money->addOrange($dateGmt,$reseau,$type_transac,$debitTransac,$creditTransac,$_SESSION['_ccgim_201']['id_utilisateur'],$client,$contact,$slod_dispo,$soldeAp);
                if($save > 0){
                    echo 'ok';
                }
            }else{
                echo 'solde';
            }
        }
    }





}