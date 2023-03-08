<?php
if(isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/compte/dashboard');
    exit();

}
require_once $controller.'/user.connexion.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
include_once $layout.'/auth/header2.php'
?>
<div class="container-fluid py-5 bg-gray-color pd-section">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-3">
                <form class="cd-form  bg-white-color" method="post" id="loginForm">
                    <div class="text-center pb-5">
                        <a href="<?=$domaine?>">
                            <img src="<?=$cdn_domaine?>/media/log01.png" class="myLogoAuth" alt="Logo" />
                        </a>
                    </div>
                    <h2 class="text-center m-0"> <i class="fa fa-user"></i> Connexion </h2>
                    <?php if(!empty($errors)){ ?>
                        <div class="alert alert-danger alert-pd" style="font-size: 13px" role="alert">
                            <?php foreach($errors as $error){ ?>
                                <?php echo $error ?>
                            <?php }?>
                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label for="email">E-mail <i class="required"></i></label>
                        <input class="full-width has-padding has-border" name="email" id="email" type="email" placeholder="E-mail" required>
                    </div>

                    <div class="form-group position-relative">
                        <label  for="password">Mot de passe <i class="required"></i></label>
                        <input class="full-width has-padding has-border" name="password" id="password" type="password"  placeholder="Mot de passe" required>
                        <a href="javascript:void(0);" class="hide-password"> <i class="fa fa-eye-slash"></i></a>
                    </div>
                    <div class="d-flex">
                        <div class="form-group w50">
                            <input type="checkbox" id="member" name="member">
                            <label for="accept-terms font-15" style="font-size: 15px;font-weight: normal;">Se souvenir de moi</label>
                        </div>
                        <div class="form-group w50 text-right">
                            <a href="<?=$domaine?>/forgot" class="font-bold"> <small> Mot de passe oublié</small></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                        <button class="full-width has-padding user-inscription"> <i class="loaderBtn"></i> Connexion </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once $layout.'/auth/footer.php'?>
<script>
    $(document).ready(function(){
        $('#loginForm').submit(function(){
            $(".loaderBtn").html('<i class="fa fa-circle-o-notch fa-spin"></i>')
        });
    });
</script>
