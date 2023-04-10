<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

$liste = $money->getMoneyByReseau(1);

while($dats = $liste->fetch()){



    $sldAp = '<span class="badge-green">'.number_format($dats["solde_ap"],0,',',' ').'</span>';


    $arr_list['data'][] = array(
        date_time_fr($dats['date_money']),
        html_entity_decode(stripslashes($dats["client"])),
        html_entity_decode(stripslashes($dats["contact"])),
        number_format($dats["solde_av"],0,',',' '),
        number_format($dats["credit_transac"],0,',',' '),
        number_format($dats["debit_transac"],0,',',' '),
        $sldAp


    );

}



}
echo json_encode($arr_list);