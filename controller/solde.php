<?php
$my_solde ='';
if(isset($_SESSION['_ccgim_201']) and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

       $montant = $tresorerie->getSoldeTotal()->fetch();
       $my_solde .=number_format($montant['solde'],0 ,' ',' ').' FCFA';


}
$output = array(
    'my_solde' => $my_solde
);
echo json_encode($output);