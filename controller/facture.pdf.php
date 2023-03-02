<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:connexion');
    exit();
}
if(isset($doc[1]) and !isset($doc[2])){

}else{
    header('location:'.$domaine.'/error');
    exit();
}
$footerInfo = "Information du footer";
include_once 'model.facture.php';


?>
