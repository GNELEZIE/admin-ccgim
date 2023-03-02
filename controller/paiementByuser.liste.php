<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

$liste = $tresorerie->getPaiementByUser($tes);
while($dats = $liste->fetch()){
    $test = 1;

    if($dats['type_transac'] == 1){
        $debit = $dats['debit_transac'];
        $credit = 0;
        $mont = $debit + $credit;
        $montant = '<span class="badge-green"><b> + '. number_format($mont,0,',',' ').'</b> </span>';
    }else{
        $debit = 0;
        $credit = $dats['credit_transac'];
        $mont = $debit + $credit;
        $montant = '<span class="badge-red"><b> - '. number_format($mont,0,',',' ').'</b> </span>';
    }
    $action = '<a href="'.$domaine.'/facture/'.$dats['ref_paiement'].'" class="btn-voir"> <i class="fa fa-print"></i> Imprimer</a>';
    $arr_list['data'][] = array(
        date_time_fr($dats['date_tresorerie']),
        $dats['phone'],
        html_entity_decode(stripslashes($dats["nom"])).' '.html_entity_decode(stripslashes($dats["prenom"])),
        html_entity_decode(stripslashes($dats["libelle_transac"])),
        $montant,
        $action

    );
}



}
echo json_encode($arr_list);