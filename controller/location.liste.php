<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

    $liste = $location->getAllLocataire();
    while($dats = $liste->fetch()){

        $toDay = date('Y-m');
        $payUser = $tresorerie->getPaiementByUserId($dats['user_id']);
        $datUser = $utilisateur->getUtilisateurById($dats['user_id'])->fetch();
        $datLgts = $logement->getLogementById($dats['lgt_id'])->fetch();

        if($payUserData = $payUser->fetch()){
            if(date_fr2($payUserData['date_tresorerie']) == $toDay){
                $stat = '<span class="badge-green">Déjà payé</span>';
                $action = '<a href="'.$domaine.'/logement/locataires/'.$lsiteUsers['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a>';
            }else{
                $stat = '<span class="badge-jaune">En attente</span>';
                $action = '<a href="#" class="btn-payer" data-toggle="modal"  data-id="'.$dats["user_id"].'" data-name="'.html_entity_decode(stripslashes($lsiteUsers["nom"])).'" data-logt="'.html_entity_decode(stripslashes($dats["lgt_id"])).'"  data-montant="'.$tarif.'" data-target="#payerModalCenter"> <i class="fa fa-money"></i> Payer</a>
                <a href="'.$domaine.'/logement/locataires/'.$lsiteUsers['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a>';
            }
        }else{
            $stat = '<span class="badge-jaune">En attente</span>';
            $action = '<a href="#" class="btn-payer" data-toggle="modal"  data-id="'.$dats["user_id"].'" data-name="'.html_entity_decode(stripslashes($lsiteUsers["nom"])).'" data-logt="'.html_entity_decode(stripslashes($dats["lgt_id"])).'" data-montant="'.$tarif.'" data-target="#payerModalCenter"> <i class="fa fa-money"></i> Payer</a>
                <a href="'.$domaine.'/logement/locataires/'.$lsiteUsers['slug'].'" class="btn-voir"> <i class="fa fa-eye"></i> Voir</a>';
        }




        $arr_list['data'][] = array(
            date_time_fr($dats['date_location']),
            html_entity_decode(stripslashes($datLgts["nom_lgt"])),
            $stat,
            $action

        );
    }



}
echo json_encode($arr_list);