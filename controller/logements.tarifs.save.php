<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['id']) and isset($_POST['prix_regulier'])  and isset($_SESSION['myformkey']) and isset($_POST['formkeyTarifs']) and $_SESSION['myformkey'] == $_POST['formkeyTarifs']){
    extract($_POST);

    $id = my_decrypt($id);
    $prix_regulier = htmlentities(trim(addslashes(strip_tags($prix_regulier))));
    $prix_promo = htmlentities(trim(addslashes(strip_tags($prix_promo))));
    $prix_regulier = v_p($prix_regulier);
    $prix_promo = v_p($prix_promo);
    $propriety ='id_logement';
    $dataSlug = $logement->verifLogement($propriety, $id)->fetch();
    $nbUpd = $dataSlug['nb_upd'] + 1;
    $propriete1= 'tarif';
    $propriete2= "remise";
    $propriete3= "nb_upd";
    $update = $logement->updateData3($propriete1,$prix_regulier,$propriete2,$prix_promo,$propriete3,$nbUpd,$dataSlug['id_logement']);
    if($update > 0){
        header('location:' . $domaine . '/compte/succes');
    }
    $tab = array(
        'lgts' => $dataSlug['id_logement']
    );

    $_SESSION['finit'] = $tab;







}
