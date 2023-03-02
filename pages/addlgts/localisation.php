<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();

}
if(isset($doc[2]) and !isset($doc[3])){
    $lgts = $logement->getLgtsSlugAndUser($_SESSION['_ccgim_201']['id_utilisateur'],$doc[2]);
    if($lgtDataLocal = $lgts->fetch()){
        if($lgtDataLocal['phone_lgt'] != ''){
            $isoPhone = $lgtDataLocal['iso_phone_lgt'];
            $dialPhone = $lgtDataLocal['dial_phone_lgt'];
            $phone = $lgtDataLocal['phone_lgt'];
        }else{
            if($data['phone'] != ''){
                $isoPhone = $data['iso_phone'];
                $dialPhone = $data['dial_phone'];
                $phone =  $data['phone'];
            }else{
                $isoPhone = 'ci';
                $dialPhone = '225';
                $phone = '';
            }

        }
        if($lgtDataLocal['nom_agent'] != ''){
            $nom_agent = html_entity_decode(stripslashes($lgtDataLocal['nom_agent']));
        }else{
            if($data['nom'] != ''){
                $nom_agent = html_entity_decode(stripslashes($data['nom']));
            }else{
                $nom_agent = '';
            }

        }
    }else{
        header('location:'.$domaine.'/error');
    }

}else{
    header('location:'.$domaine.'/error');
}

require_once $controller.'/logement.localisation.update.php';
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
            <li  class="active" id="localissation"><strong>Localisation</strong></li>
            <li id="galerie"><strong>Galerie</strong></li>
            <li id="tarifs"><strong>Tarifs</strong></li>
        </ul>
        <div class="form-card box-form  box-shadow-none" style="background: none">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fs-title">Localisation</h2>
            </div>
        </div>
        <form id="logtDescForm" method="post" style="text-align: left !important;">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ville">Ville <i class="required"></i> </label>
                    <input type="text" name="ville" id="ville" class="form-control input-style input-height" placeholder="Ville" value="<?=html_entity_decode(stripslashes($lgtDataLocal['ville_lgt']))?>"  required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="qrt">Quartier <i class="required"></i> </label>
                    <input type="text" name="qrt" id="qrt" class="form-control input-style input-height" placeholder="Quartier" value="<?=html_entity_decode(stripslashes($lgtDataLocal['quartier_lgt']))?>" required>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <h5 class="">Personne à contacter en cas d’urgence avec contacts</h5>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nom_lgt"><i class="required"></i> Nom </label>
                    <input type="text" name="nom" id="nom" class="form-control input-style input-height" value="<?=$nom_agent?>" placeholder="Nom"  required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="" for="phone">Téléphone <i class="required"></i></label>
                    <input type="tel" class="full-width has-padding has-border" name="phone" id="phone" value="<?=$phone?>" style="padding: 7px 15px 7px 45px !important;"  required>
                    <input type="hidden"  name="isoPhone" id="isoPhone" value="<?=$isoPhone?>">
                    <input type="hidden"  name="dialPhone" id="dialPhone" value="<?=$dialPhone?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center pt-5">
                <input type="hidden" name="id" id="id" value="<?=my_encrypt($lgtDataLocal['id_logement'])?>">
                <input type="hidden" class="form-control" name="formkeyLocalisation" value="<?=$token?>">
                <a href="<?=$domaine?>/annonce/description/<?=$lgtDataLocal['slug_lgt']?>" class="previous  mybtn-prev btn-next mt-3 mr-3 btn-next"><i class="fa fa-angle-double-left"></i> Précedent </a>
                <button  class="next mybtn-next btn-next mt-3 border-none" id="description-btn"> <i class="load"></i> Suivant <i class="fa fa-angle-double-right"></i></button>
            </div>
        </div>
        </form>
        </div>
        </div>
        </div>
    </div>
</div>






<?php include_once $layout.'/auth/footer.php'?>
<script>
    var inputPhone = document.querySelector("#phone");
    window.intlTelInput(inputPhone, {
        initialCountry: '<?=$isoPhone?>',
        utilsScript: "<?=$cdn_domaine?>/assets/libs/intltelinput/js/utils.js"
    });
    var iti = window.intlTelInputGlobals.getInstance(inputPhone);
    var countryData = iti.getSelectedCountryData();
    $('#isoPhone').val(countryData["iso2"]);
    $('#dialPhone').val(countryData["dialCode"]);
    inputPhone.addEventListener("countrychange", function() {
        var iti = window.intlTelInputGlobals.getInstance(inputPhone);
        var countryData = iti.getSelectedCountryData();
        $('#isoPhone').val(countryData["iso2"]);
        $('#dialPhone').val(countryData["dialCode"]);
    });

</script>