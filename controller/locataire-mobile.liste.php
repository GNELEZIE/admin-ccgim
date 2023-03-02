<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

$liste = $location->getLocationByAuthId($_SESSION['_ccgim_201']['id_utilisateur']);

while($dats = $liste->fetch()){

    $toDay = date('Y-m');
    $payUser = $tresorerie->getPaiementByUserId($dats['user_id']);
    $lsiteUsers = $utilisateur->getUtilisateurById($dats['user_id'])->fetch();

    if($payUserData = $payUser->fetch()){
        if(date_fr2($payUserData['date_tresorerie']) == $toDay){
            $stat = '<span class="badge-green">Déjà payé</span>';
            $action = '<a href="'.$domaine.'/logement/locataires/'.$lsiteUsers['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a>';
        }else{
            $stat = '<span class="badge-jaune">En attente</span>';
            $action = '<div class="payBt" ><a href="#" class="btn-payer" data-toggle="modal"  data-id="'.$dats["user_id"].'" data-name="'.html_entity_decode(stripslashes($lsiteUsers["nom"])).'" data-logt="'.html_entity_decode(stripslashes($dats["lgt_id"])).'" data-target="#payerModalCenter"> <i class="fa fa-money"></i> Payer</a></div>
               <div class="SeeBtn"><a href="'.$domaine.'/logement/locataires/'.$lsiteUsers['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a></div>
                ';
        }
    }else{
        $stat = '<span class="badge-jaune">En attente</span>';
        $action = '<div class="payBt" ><a href="#" class="btn-payer" data-toggle="modal"  data-id="'.$dats["user_id"].'" data-name="'.html_entity_decode(stripslashes($lsiteUsers["nom"])).'" data-logt="'.html_entity_decode(stripslashes($dats["lgt_id"])).'" data-target="#payerModalCenter"> <i class="fa fa-money"></i> Payer</a></div>
               <div class="SeeBtn"><a href="'.$domaine.'/logement/locataires/'.$lsiteUsers['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a></div>
                ';
    }
    $locataireslist = '
    <div class="d-flex">
            <div class="w70">
            <p class="m-0"> <i class="fa fa-dashboard"></i> '.date_time_fr($dats['date_location']).'</p>
            <p class="m-0"> <i class="fa fa-phone"></i> '.$lsiteUsers['phone'].'</p>
            <p class="m-0"> <i class="fa fa-user"></i> '.html_entity_decode(stripslashes($lsiteUsers["nom"])).' '.html_entity_decode(stripslashes($lsiteUsers["prenom"])).'</p>
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