<?php
$my_gain ='';
if(isset($_SESSION['_ccgim_201']) and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

    $montant = $gain->getGainTotal()->fetch();
    $my_gain .=number_format($montant['solde'],0 ,' ',' ').' FCFA';


}
$output = array(
    'my_gain' => $my_gain
);
echo json_encode($output);