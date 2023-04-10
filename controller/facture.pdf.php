<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:connexion');
    exit();
}
if(isset($doc[1]) and !isset($doc[2])){
    $dat = $tresorerie->getPaiementByRef($doc[1]);
    if($datas = $dat->fetch()){
        $users = $utilisateur->getUtilisateurById($datas['user_id'])->fetch();
    }else{
        header('location:'.$domaine.'/error');
        exit();
    }
}else{
    header('location:'.$domaine.'/error');
    exit();
}
$footerInfo = 'CABINET CONSEIL ET DE GESTION IMMOBILIERE (CCGIM)
SARL UNIPERSONNEL – CAPITAL SOCIAL : 7 200 000 F CFA – N° de Dépôt CEPICI : 31268 du 07/12/2016
RCCM : N° CI-ABJ-2016-B-30580 du 07/12/2016 au Tribunal du Commerce d’Abidjan
Dépôt au greffe : N° 25762 du 07/12/2016 – N°CC : 1657798M – Régime d’Imposition : IS – N° CNPS : 301719
IDU : CI-2016-0000498X
GERANT :  BAGAYOGO AMADOU
SIEGE SOCIAL : ABIDJAN – YOPOUGON ATTIE 9ième tranche (OFFOUMOU YAPO)
IMMEUBLE HADJA SIDIBE KADIATOU – APPARTEMENT N° A01
ADRESSE : 01 BP 3269 ABIDJAN 01
BUREAU : 23 46 93 65 - MOBILES : 03 32 59 24 – 07 85 65 28 – 04 92 79 51
E-mail : amadasta@yahoo.fr
';
include_once 'model.facture.php';


?>
