<?php
$reseau = 2;
$type_transac = 1;
$debitTransac = 15000;
$creditTransac = 0;
$client = 'CCGIM mtn';
$contact = '00101010101';
$slodeDispo = $money->getSoldeDispoByIdResau($reseau)->fetch();
$slod_disp = $slodeDispo['solde'];
if($slod_disp == ''  ){
    $slod_dispo = 0;
}else{
    $slod_dispo = $slodeDispo['solde'];
}
$soldeAp = $debitTransac+$slod_dispo;
$save = $money->addOrange($dateGmt,$reseau,$type_transac,$debitTransac,$creditTransac,$_SESSION['_ccgim_201']['id_utilisateur'],$client,$contact,$slod_dispo,$soldeAp);

echo $save;


