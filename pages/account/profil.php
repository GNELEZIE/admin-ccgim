<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();
}
if($data['phone'] != ''){
  $isoPhone = $data['iso_phone'];
  $dialPhone = $data['dial_phone'];
}else{
    $isoPhone = 'ci';
    $dialPhone = '225';
}


require_once $controller.'/profil.update.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
include_once $layout.'/auth/header2.php'?>

    <div class="container-fluid py-5 bg-gray-color pd-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="compte-box bg-white-color radius-6">
                        <img src="<?=$cdn_domaine?>/media/users/<?php if($data['photo'] != ''){echo $data['photo'];}else{echo 'avatar.png';}?>" class="img-profil" id="imguser"  alt="<?=html_entity_decode(stripslashes($data['nom']))?>">
                       <div class="btn-a text-center py-5">
                           <a href="javascript:void(0);" class="user-inscription" id="btn-img"> <i class="fa fa-edit"></i> Modifier ma photo</a>
                         <div class="dash">
                             <a href="<?=$domaine?>/compte/dashboard" class="user-inscription"> <i class="fa fa-arrow-circle-o-left"></i> Tableau de bord</a>
                         </div>
                       </div>
                    </div>
                    <form method="post" enctype="multipart/form-data" id="userImgForm">
                        <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                        <input type="file" name="userImg" id="userImg" style="display: none"/>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="header-box">
                       Mon profil
                    </div>
                    <div class="bg-white-color">
                        <form class="cd-form  bg-white-color" id="updForm" method="post">
                            <?php if(!empty($success)){ ?>
                                <div class="alert alert-success" style="font-size: 14px" role="alert">
                                    <?php foreach($success as $succ){ ?>
                                        <?php echo $succ ?>
                                    <?php }?>
                                </div>
                            <?php }?>
                            <?php if(!empty($errors)){ ?>
                                <div class="alert alert-danger alert-pd" style="font-size: 13px" role="alert">
                                    <?php foreach($errors as $error){ ?>
                                        <?php echo $error ?>
                                    <?php }?>
                                </div>
                            <?php }?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="nom">Nom <i class="required"></i></label>
                                        <input class="full-width has-padding has-border" name="nom" id="nom" type="text" value="<?=html_entity_decode(stripslashes($data['nom']))?>" placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="prenom">Prénom <i class="required"></i></label>
                                        <input class="full-width has-padding has-border" name="prenom" id="prenom" type="text" value="<?=html_entity_decode(stripslashes($data['prenom']))?>" placeholder="Prénom" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="email">E-mail <i class="required"></i></label>
                                        <input class="full-width has-padding has-border" name="email" id="email" type="email" value="<?=html_entity_decode(stripslashes($data['email']))?>" placeholder="E-mail" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="ville">Ville <i class="required"></i></label>
                                        <input class="full-width has-padding has-border" name="ville" id="ville" type="text" value="<?=html_entity_decode(stripslashes($data['ville']))?>" placeholder="Ville" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="phone">Téléphone <i class="required"></i></label>
                                        <input type="tel" class="full-width has-padding has-border" name="phone" id="phone" value="<?=$data['phone']?>" style="padding: 7px 15px 7px 45px !important;"  required>
                                        <input type="hidden"  name="isoPhone" id="isoPhone" value="<?=$isoPhone?>">
                                        <input type="hidden"  name="dialPhone" id="dialPhone" value="<?=$dialPhone?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="postale">Boîte postale</label>
                                        <input class="full-width has-padding has-border" name="postale" id="postale" type="text" value="<?=html_entity_decode(stripslashes($data['postale']))?>" placeholder="Boîte postale">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="banque">Banque et N° de compte</label>
                                        <input class="full-width has-padding has-border" name="banque" id="banque" type="text" value="<?=html_entity_decode(stripslashes($data['banque']))?>" placeholder="Banque et N° de compte">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="contribuable">N° compte contribuable</label>
                                        <input class="full-width has-padding has-border" name="contribuable" id="contribuable" type="text" value="<?=html_entity_decode(stripslashes($data['contribuable']))?>" placeholder="N° compte contribuable">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mecano">MECANO</label>
                                        <input class="full-width has-padding has-border" name="mecano" id="mecano" type="text" value="<?=html_entity_decode(stripslashes($data['mecano']))?>" placeholder="MECANO">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="service">Service ou affectation</label>
                                        <input class="full-width has-padding has-border" name="service" id="service" type="text" value="<?=html_entity_decode(stripslashes($data['service']))?>" placeholder="Service ou affectation">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 offset-4 pt15">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                                        <button class="full-width has-padding user-inscription"> <span class="loaderBtn"> Modifier</span>  </button>
                                    </div>
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

    $(document).ready(function(){
        $("#updForm").submit(function(){
            $('.loaderBtn').html('Envoi en cours...');
        });
    });



    $("#phone").keyup(function (event) {
        if (/\D/g.test(this.value)) {
            //Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });

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


    $('#btn-img').click(function(e){
        e.preventDefault();
        $('#userImg').trigger('click');
    });

    //fonction vue image télécharger
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imguser').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#userImg').change(function(e){
        e.preventDefault();
        readURL(this);
        var value = document.getElementById('userImgForm');
        var form = new FormData(value);

        $.ajax({
            method: 'post',
            url: '<?=$domaine?>/controle/photo.save',
            data: form,
            contentType:false,
            cache:false,
            processData:false,
            dataType: 'json',
            success: function(data){
                if(data.data_info == "ok"){
                    $('#imguser').attr('src', data.data_photo);
                }else {
                    swal("Action Impossible !", "Une erreur s\'est produite lors du traitement des données !", "error");
                }
            }
        });

    });

</script>