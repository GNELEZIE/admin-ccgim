<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();
}

require_once $controller.'/mp.update.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;


require_once $layout.'/auth/header2.php';
?>
<div class="container-fluid py-5 bg-gray-color pd-section">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-3">
                <form class="cd-form  bg-white-color" method="post" id="updPwdsForm">
                    <h3 class="m-0 pb15 font-23">Modifier le mot de passe</h3>
                    <div class="remove">
                        <?php if(!empty($errors)){ ?>
                            <div class="alert alert-danger font-12 p-2 mb-1" role="alert">
                                <?php foreach($errors as $error){
                                    echo $error ;
                                }?>
                            </div>
                        <?php }?>

                        <?php if(!empty($success)){
                            ?>
                            <div class="alert alert-success font-12 p-2 mb-3" role="alert">
                                <?php foreach($success as $succes){
                                    echo $succes;
                                }?>
                            </div>
                        <?php
                        } ?>

                    </div>
                    <div class="form-group mb-10">
                        <label for="code" class="pl-20 font-13">Ancien mot de passe <i class="required"></i></label>
                        <input type="password" class="full-width has-padding has-border" id="passwordA" name="passwordA" placeholder="Ancien mot de passe" required>
                    </div>
                    <div class="form-group mb-10">
                        <label for="code" class="pl-20 font-13">Nouveau mot de passe<i class="required"></i></label>
                        <input type="password" class="full-width has-padding has-border" id="password" name="password" placeholder="Nouveau mot de passe" required>
                    </div>
                    <div class="form-group mb-24">
                        <label for="code" class="pl-20 font-13">Nouveau mot de passe<i class="required"></i></label>
                        <input type="password" class="full-width has-padding has-border" id="passwordC" name="passwordC" placeholder="Confirmer mot de passe" required>
                    </div>
                    <div class="form-group pt10">
                        <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                        <button type="submit" class="full-width has-padding user-inscription"><i class="updPwdLod"></i> Modifier</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once $layout.'/auth/footer.php';?>

<script>

    $(document).ready(function(){
        $('#updPwdsForm').submit(function(){
            $(".updPwdLod").html('<i class="fa fa-circle-o-notch fa-spin"></i>')
        });

    });
</script>