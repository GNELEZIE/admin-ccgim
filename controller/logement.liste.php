<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

    $liste = $logement->getAllLogement();
    while($dats = $liste->fetch()){

        if($dats['pub'] == 0){
            $stat = '<span class="badge-jaune">En attente</span>';
        }elseif($dats['pub'] == 1){
            $stat = '<span class="badge-green">En ligne</span>';

        }else{
            $stat = '<span class="badge-red">Hors ligne</span>';
        }

        $action = '<a href="'.$domaine.'/annonce/description/'.$dats['slug_lgt'].'" class="btn-payer"> <i class="fa fa-edit"></i> Modifier</a>
                        <a href="'.$domaine_sit.'/logements/'.$dats['slug_lgt'].'" class="btn-voir" target="_blank"> <i class="fa fa-eye"></i> Voir</a>';



        $arr_list['data'][] = array(
            date_fr($dats['date_lgt']),
            html_entity_decode(stripslashes($dats["nom_lgt"])),
            html_entity_decode(stripslashes($dats["ville_lgt"])),
            number_format($dats['tarif'],0,',',' '),
            $stat,
            $action

        );
    }



}
echo json_encode($arr_list);