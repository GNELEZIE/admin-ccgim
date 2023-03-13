<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

$liste = $money->getMoneyByReseau(1);

while($dats = $liste->fetch()){

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


    $arr_list['data'][] = array(
        date_time_fr($dats['date_money']),
        html_entity_decode(stripslashes($dats["libelle"])),
        $montant

    );

}



}
echo json_encode($arr_list);