<?php
if(isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/compte/dashboard');
    exit();

}
require_once $controller.'/user.inscription.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;

include_once $layout.'/auth/header2.php'
?>


<div class="container-fluid py-5 bg-gray-color pd-section register-page">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-3">
                <form class="cd-form  bg-white-color" method="post" id="formRegister">
                    <div class="text-center pb-5">
                        <a href="<?=$domaine?>">
                            <img src="<?=$cdn_domaine?>/media/log01.png" class="myLogoAuth" alt="Logo" />
                        </a>
                    </div>
                    <h2 class="text-center m-0"> <i class="fa fa-user"></i> Inscription</h2>
                    <?php if(!empty($errors)){ ?>
                        <div class="alert alert-danger alert-pd" style="font-size: 13px" role="alert">
                            <?php foreach($errors as $error){ ?>
                                <?php echo $error ?>
                            <?php }?>
                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label class="" for="email">E-mail <i class="required"></i></label>
                        <input class="full-width has-padding has-border" name="email" id="email" type="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-content">
                        <div class="form-group p-0">
                            <label for="typ_compte" class="pb7">Type de compte</label>
                            <select class="wide no-nice-select-search-box full-width has-border" name="typ_compte" id="typ_compte">
                                <option value="" selected>Choisir un type de compte</option>
                                <option value="1">Locataire</option>
                                <option value="2">Propriétaire</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group position-relative">
                        <label  for="password" class="pt13">Mot de passe <i class="required"></i></label>
                        <input class="full-width has-padding has-border" name="password" id="password" type="password"  placeholder="Mot de passe" required>
                        <a href="javascript:void(0);" class="hide-password"> <i class="fa fa-eye-slash"></i></a>
                    </div>

                    <div class="form-group position-relative">
                        <label for="cpassword">Confirmer mot de passe <i class="required"></i></label>
                        <input class="full-width has-padding has-border" name="cpassword" id="cpassword" type="password"  placeholder="Confirmer mot de passe" required>
                        <a href="javascript:void(0);" class="hide-password"> <i class="fa fa-eye-slash"></i></a>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="accept-terms" required>
                        <label for="accept-terms font-7" style="font-size: 11px !important;">Acceptez les conditions d'utilisation  <a href="#">conditions d'utilisation</a></label>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                        <button class="full-width has-padding user-inscription"> <i class="loaderRegister"></i> Inscription </button>
                        <p class="text-center pt20">Vous avez déja un compte ? Alors<a href="<?=$domaine?>/connexion" class="text-gr"> connectez-vous</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once $layout.'/auth/footer.php'?>
<script>
    $(document).ready(function(){
        $('#typ_compte').niceSelect();
        $("#formRegister").submit(function(){
            $(".loaderRegister").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        });
    });
</script>
