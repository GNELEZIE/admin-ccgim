<?php
$my_prix ='';
if(isset($_SESSION['_ccgim_201']) and isset($_SESSION['myformkey']) and isset($_POST['token']) and isset($_POST['lgt'])  and $_SESSION['myformkey'] == $_POST['token']){
 extract($_POST);
      $list = $logement->getLogementById($_POST['lgt']);
    if($dat = $list->fetch()){
        $my_prix .= number_format($dat['tarif'],0 ,' ',' ').' CFA';
    }else{
        $my_prix = '';
    }



}
$output = array(
    'my_prix' => $my_prix
);
echo json_encode($output);