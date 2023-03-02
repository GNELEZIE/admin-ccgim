<?php
if(isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/compte/dashboard');
    exit();
}

require_once $controller.'/forgot.pwd.php';
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;

include_once $layout.'/auth/header.php'
?>


    <div class="container-fluid py-5 bg-gray-color pd-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <form class="cd-form  bg-white-color formForgot" method="post" id="formForgot" style="margin: 30px;">
                        <div class="text-center">
                            <h3 class="p-3" style="margin: 0; font-weight: bold;">Réinitialisation du mot de passe</h3>
                            <p>Vous avez oublié votre mot de passe ? Entrez votre adresse e-mail ci-dessous et nous vous enverrons un e-mail pour réinitialisé votre mot de passe.</p>
                        </div>
                        <?php if(!empty($errors)){ ?>
                            <div class="alert alert-danger alert-pd" style="font-size: 13px" role="alert">
                                <?php foreach($errors as $error){ ?>
                                    <?php echo $error ?>
                                <?php }?>
                            </div>
                        <?php }?>
                        <div class="form-group">
                            <label class="" for="email">E-mail <i class="required"></i></label>
                            <input class="full-width has-padding has-border" name="email" id="email" type="text" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                            <button class="full-width has-padding user-inscription"> <i class="loaderBtn"></i> Réinitialisation du mot de passe </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php include_once $layout.'/auth/footer.php'?>
<script>
    $(document).ready(function(){
        $('#formForgot').submit(function(){
            $(".loaderBtn").html('<i class="fa fa-circle-o-notch fa-spin"></i>')
        });
    });
</script>
