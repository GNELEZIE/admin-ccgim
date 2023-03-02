<?php
if(isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/compte/dashboard');
    exit();
}

if(!isset($doc[1])){
    header('location:'.$domaine.'/error');
    exit();
}

$descryToken = my_decrypt(str_replace('-','+',$doc[1]));
if(!filter_var($descryToken, FILTER_VALIDATE_EMAIL)) {
    header('location:'.$domaine.'/error');
    exit();
}

$verifEmail = $utilisateur->getUtilisateurByEmail($descryToken);

require_once $controller.'/password.update.php';
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;

include_once $layout.'/auth/header.php'
?>


    <div class="container-fluid py-5 bg-gray-color pd-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <?php
                    if($dat = $verifEmail->fetch()) {
                        ?>
                        <form class="cd-form bg-white-color"  method="post" id="updPwdForm">
                            <div class="text-center">
                                <h3 class="pb15 font-20" style=" font-weight: bold;">Modification du mot de passe</h3>
                            </div>
                            <?php if (!empty($success)) { ?>
                                <div class="alert alert-success" style="font-size: 14px" role="alert">
                                    <?php foreach ($success as $succ) { ?>
                                        <?php echo $succ ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php if (!empty($errors)) { ?>
                                <div class="alert alert-danger" style="font-size: 14px" role="alert">
                                    <?php foreach ($errors as $error) { ?>
                                        <?php echo $error ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="password" class="pb-1">Nouveau mot de passe <i class="required"></i></label>
                                <input type="hidden" class="form-control" name="formkey" value="<?= $token ?>">
                                <input type="password" class="full-width has-padding has-border" id="password" name="password" placeholder="Nouveau mot de passe" required>
                            </div>
                            <div class="form-group pt-3">
                                <label for="confpassword" class="pb-1">Confirmer mot de passe <i class="required"></i></label>
                                <input type="password" class="full-width has-padding has-border" id="confpassword" name="confpassword" placeholder="Confirmer mot de passe" required>
                            </div>
                            <div class="form-group m-0 text-center mt-3 pt10">
                                <button class="full-width has-padding user-inscription"> <i class="laodPwd"></i> Modifier</button>
                            </div>
                        </form>
                    <?php
                    }else{
                        header('location:'.$domaine.'/error');
                        exit();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


<?php include_once $layout.'/auth/footer.php'?>
<script>
    $(document).ready(function(){
        $('#updPwdForm').submit(function(){
            $(".laodPwd").html('<i class="fa fa-circle-o-notch fa-spin"></i>')
        });
    });
</script>
