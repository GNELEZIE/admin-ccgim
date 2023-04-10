<?php
$total_liquide ='';
if(isset($_SESSION['_ccgim_201']) and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){


    $mont = $money->getLiquide()->fetch();
    $montant = $mont['solde'];
    $total_liquide .=number_format($montant,0 ,' ',' ').' <small>FCFA</small>';


}
$output = array(
    'total_liquide' => $total_liquide
);
echo json_encode($output);