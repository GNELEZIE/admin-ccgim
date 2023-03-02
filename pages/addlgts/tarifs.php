<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();

}
if(isset($doc[2]) and !isset($doc[3])){
    $lg = $logement->getLgtsSlugAndUser($_SESSION['_ccgim_201']['id_utilisateur'],$doc[2]);
    if($lgtDataTarifs = $lg->fetch()){
    }else{
        header('location:'.$domaine.'/error');
    }

}else{
    header('location:'.$domaine.'/error');
}
require_once $controller.'/logements.tarifs.save.php';
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
include_once $layout.'/auth/header.php'?>

<div class="container-fluid py-5 bg-gray-color pd-section">
    <div class="container py-5">
        <div class="header-box">
            Publiez votre logement en 4 étapes
        </div>
        <div class="bg-white-color pd25 mes-addlgts">
            <div id="msform">
                <ul id="progressbar">
                    <li class="active" id="description"><strong>Description</strong></li>
                    <li class="active" id="localissation"><strong>Localisation</strong></li>
                    <li class="active" id="galerie"><strong>Galerie</strong></li>
                    <li class="active" id="tarifs"><strong>Tarifs</strong></li>
                </ul>
                <div class="form-card box-form  box-shadow-none" style="background: none">
                    <form id="logtDescForm" method="post" style="text-align: left !important;">
                        <div class="row">
                            <div class="col-md-6 offset-3">
                                <h2 class="fs-title">Tarif</h2>
                                <div class="form-group" style="position: relative !important;">
                                    <label for="prix_regulier">Tarif régulier <i class="required"></i> </label>
                                    <input type="number" name="prix_regulier" id="prix_regulier" class="form-control input-style input-height" placeholder="Tarif régulier" value="<?=$lgtDataTarifs['tarif']?>" required style="padding-right: 33px;" step="any">
                                    <span class="bg-white icon-m">CFA</span>
                                </div>
                                <div class="form-group" style="position: relative !important;">
                                    <label for="prix_promo">Tarif pourcentage de réduction </label>
                                    <input type="number" name="prix_promo" id="prix_promo" class="form-control input-style input-height" placeholder="Tarif promo" min="1" max="100" value="<?=$lgtDataTarifs['remise']?>" style="padding-right: 33px;" step="any">
                                    <span class="bg-white icon-m">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center pt-5">
                                <input type="hidden" name="id" id="id" value="<?=my_encrypt($lgtDataTarifs['id_logement'])?>">
                                <input type="hidden" class="form-control" name="formkeyTarifs" value="<?=$token?>">
                                <a href="<?=$domaine?>/annonce/galerie/<?=$lgtDataTarifs['slug_lgt']?>" class="previous  mybtn-prev btn-next mt-3 mr-3 btn-next"><i class="fa fa-angle-double-left"></i> Précedent </a>
                                <button  class="next mybtn-next btn-next mt-3 border-none" id="description-btn"> <i class="load"></i> Terminer <i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include_once $layout.'/auth/footer.php'?>
