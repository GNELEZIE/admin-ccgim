<?php
$total_solde ='';
if(isset($_SESSION['_ccgim_201']) and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

    $montant = $money->getSoldeTotal()->fetch();
    $total_solde .=number_format($montant['solde'],0 ,' ',' ').' <small>FCFA</small>';


}
$output = array(
    'total_solde' => $total_solde
);
echo json_encode($output);