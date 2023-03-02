<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

$liste = $locataire->getAllLocataire();
while($dats = $liste->fetch()){

    $toDay = date('Y-m');
    $payUser = $tresorerie->getLastPaiementByUser($dats['id_locataire']);

    if($payUserData = $payUser->fetch()){
        if(date_fr2($payUserData['date_tresorerie']) == $toDay){
            $stat = '<span class="badge-green">Déjà payé</span>';
            $action = '<a href="'.$domaine.'/logement/locataires/'.$dats['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a>';
        }else{
            $stat = '<span class="badge-jaune">En attente</span>';
            $action = '<div class="payBt" ><a href="#" class="btn-payer" data-toggle="modal"  data-id="'.$dats["id_locataire"].'" data-name="'.html_entity_decode(stripslashes($dats["nom"])).'" data-logt="'.html_entity_decode(stripslashes($dats["lgt_id"])).'" data-target="#payerModalCenter"> <i class="fa fa-money"></i> Payer</a></div>
               <div class="SeeBtn"><a href="'.$domaine.'/logement/locataires/'.$dats['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a></div>
                ';
        }
    }else{
        $stat = '<span class="badge-jaune">En attente</span>';
        $action = '<div class="payBt" ><a href="#" class="btn-payer" data-toggle="modal"  data-id="'.$dats["id_locataire"].'" data-name="'.html_entity_decode(stripslashes($dats["nom"])).'" data-logt="'.html_entity_decode(stripslashes($dats["lgt_id"])).'" data-target="#payerModalCenter"> <i class="fa fa-money"></i> Payer</a></div>
               <div class="SeeBtn"><a href="'.$domaine.'/logement/locataires/'.$dats['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a></div>
                ';
    }
    $locataireslist = '
    <div class="d-flex">
            <div class="w70">
            <p class="m-0"> <i class="fa fa-dashboard"></i> '.date_time_fr($dats['date_locataire']).'</p>
            <p class="m-0"> <i class="fa fa-phone"></i> '.$dats['phone'].'</p>
            <p class="m-0"> <i class="fa fa-user"></i> '.html_entity_decode(stripslashes($dats["nom"])).' '.html_entity_decode(stripslashes($dats["prenom"])).'</p>
            <p class="m-0">'.$stat.'</p>
            </div>
            <div class="w30">
            '.$action.'
            </div>
            </div>
    ';
$td = '';
    $arr_list['data'][] = array(
        $locataireslist,
        $td

    );

}



}
echo json_encode($arr_list);