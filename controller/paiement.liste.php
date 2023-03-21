<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey'])){

$liste = $tresorerie->getPaiementByUserIdJoin();
while($dats = $liste->fetch()){

    $datLgts = $logement->getLogementById($dats['lgts_id'])->fetch();
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
    $numbs = '<br><small>'.$dats['dial_phone'] .' '.$dats['phone'].'</small>';
    $action = '<a href="'.$domaine.'/facture/'.$dats['ref_paiement'].'" class="btn-voir"> <i class="fa fa-print"></i></a>';
    $arr_list['data'][] = array(
        date_fr($dats['date_tresorerie']),
        $numbs,
        html_entity_decode(stripslashes($dats["libelle_transac"])),
        $montant,
        $action

    );
}



}
echo json_encode($arr_list);