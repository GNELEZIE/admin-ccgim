<?php

$arr_list = array('data' => array());
if(isset($_SESSION['_ccgim_201'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){

$liste = $utilisateur->getAllInscrits($_SESSION['_ccgim_201']['id_utilisateur']);
while($dats = $liste->fetch()){



        if($dats['type_compte'] == 1){
            $typ = '<span class="badge-blue">Locataire</span>';
        }else{
            $typ = '<span class="badge-jaune">Propriétaire</span>';
        }
        if($dats['bloquer'] == 0){
            $stat = '<span class="badge-green">Active</span>';
        }else{
            $stat = '<span class="badge-red">Bloqué</span>';
        }

        $action = '<i class="fa fa-eye"></i> Voir';


    $numbers = $dats['dial_phone'].' '.$dats['phone'];
    $user =   html_entity_decode(stripslashes($dats["nom"])).'<br><small>'.$numbers.'</small>';

    $arr_list['data'][] = array(
        date_time_fr($dats['date_utilisateur']),
        $user,
        html_entity_decode(stripslashes($dats["email"])),
        $typ,
        $stat,


    );
}


}
echo json_encode($arr_list);