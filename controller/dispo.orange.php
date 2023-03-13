<?php
$omdispo_solde ='';
if(isset($_SESSION['_ccgim_201']) and isset($_POST['rsid']) and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

    extract($_POST);
    $rsid = htmlentities(trim(addslashes(strip_tags($rsid))));
    $montant = $money->getSoldeDispoByIdResau($rsid)->fetch();
    $omdispo_solde .=number_format($montant['solde'],0 ,' ',' ').' <small>FCFA</small>';


}
$output = array(
    'omdispo_solde' => $omdispo_solde
);
echo json_encode($output);