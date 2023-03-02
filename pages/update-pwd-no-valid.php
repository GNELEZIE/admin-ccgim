<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}

if(!isset($_SESSION['_updPwd'])){
    header('location:'.$domaine);
    exit();
}
$mailText = explode('@',html_entity_decode(stripslashes($_SESSION['_updPwd']['email'])));
$masqueMail = mb_substr($mailText[0],0,2,'UTF-8').'***@'.$mailText[1];

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
include_once $layout.'/auth/header.php'
?>
<section class="container-fluid py-5 bg-gray-color pd-section">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 offset-4">
                <div class="ts-box text-center bg-white">
                    <img src="<?=$cdn_domaine?>/media/infos.svg" class="w25" alt=""/>
                    <h4 class="p-3">Modification de votre mot de passe</h4>
                    <p class="m-0">Nous vous avons envoyé un email de vérification à <strong><?=$masqueMail?></strong>.</p>
                    <p class="m-0">Vérifier vos spams si vous ne voyez pas le mail.</p>
                    <p class="m-0">Veuillez par la suite confirmer votre modification en cliquant sur le lien "Modifier mon mot de passe".</p>
                    <p class="mt-5">je n'ai pas encore reçu le mail <a href="javascript:void(0)" class="color-blue send-link"> renvoyer  un nouveau mail</a></p>


                </div>
            </div>
        </div>
</section>
<?php include_once $layout.'/auth/footer.php'?>
<script>
    $('.send-link').click(function(){
        var sendLink =  $('.send-link');
        sendLink.html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        sendLink.css('pointer-events','none');
        $.ajax({
            type: 'post',
            url: '<?=$domaine?>/controle/resentMailPwd',
            success: function(data){
                if(data == 'ok'){
                    swal("Succès", "Email envoyé avec succès.", "success");
                }else{
                    swal("Oups !", "Une erreur s\'est produite, veuillez réessayer.", "error");
                }
                sendLink.css('pointer-events','auto');
                sendLink.html('renvoyer un nouveau mail');
            }
        });
//        alert('ok');
    });
</script>