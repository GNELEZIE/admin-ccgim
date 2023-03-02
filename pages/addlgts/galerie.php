<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();

}
if(isset($doc[2]) and !isset($doc[3])){
    $lgts = $logement->getLgtsSlugAndUser($_SESSION['_ccgim_201']['id_utilisateur'],$doc[2]);
    if($lgtData = $lgts->fetch()){

    }else{
        header('location:'.$domaine.'/error');
    }

}else{
    header('location:'.$domaine.'/error');
}
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
            <li id="tarifs"><strong>Tarifs</strong></li>
        </ul>
        <div class="form-card box-form  box-shadow-none" style="background: none">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="fs-title">La galerie</h2>
                </div>
                <div class="row data-galerie pb-4"></div>
                <div class="col-md-3 pb-4">
                    <form method="post" enctype="multipart/form-data" id="formGalerie">
                        <input type="file" class="input-galerie" name="photos" id="photos" accept=".jpg, .jpeg, .png">
                        <input type="hidden" name="id" id="id" value="<?=my_encrypt($lgtData['id_logement'])?>">
                        <input type="hidden" name="formkey" value="<?=$token?>">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center pt-5">
                    <input type="hidden" class="form-control" name="formkeyLocalisation" value="<?=$token?>">
                    <a href="<?=$domaine?>/annonce/localisation/<?=$lgtData['slug_lgt']?>" class="previous  mybtn-prev btn-next mt-3 mr-3 btn-next"><i class="fa fa-angle-double-left"></i> Précedent </a>
                    <a href="<?=$domaine?>/annonce/tarifs/<?=$lgtData['slug_lgt']?>"  class="next mybtn-next btn-next mt-3 border-none text-white" id="description-btn"> <i class="load"></i> Suivant <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>






<?php include_once $layout.'/auth/footer.php'?>
<script>
    chargeGalerie();
    function chargeGalerie(){
        $.ajax({
            type: 'post',
            url: '<?=$domaine?>/controle/galerie.liste',
            data: {
                id : "<?=my_encrypt($lgtData['id_logement'])?>",
                token: "<?=$token?>"
            },
            dataType: 'json',
            success: function(data){
                $('.data-galerie').html(data.galerieList);
            }
        });
    }




    function uploadImg(){
        $('#photos').trigger('click');
    }

    function readURLGalerie(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e){
                $('.loadImg').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#photos').change(function(e){
        e.preventDefault();
        var file = this.files[0];
        var fileType = file['type'];
        var valideImage = ["image/jpg","image/jpeg","image/png"];
        if($.inArray(fileType, valideImage) < 0){
            $('#photos').val('');
            swal("Attention !", "Vous devez choisir une image !", "error");
            $('.file-msg').html('<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera mb-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg><br/>Cliquez pour ajouter une photo');
        }else{
            readURLGalerie(this);
            $('.gal-load').css('display','block');
            var value = document.getElementById('formGalerie');
            var form = new FormData(value);
            $.ajax({
                method: 'post',
                url: '<?=$domaine?>/controle/galerie.save',
                data: form,
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                    if(data == "ok"){
                        chargeGalerie();
                    }else {
                        swal("Action Impossible !", "Une erreur s\'est produite.", "error");
                    }
                    $('.gal-load').css('display','none');
                }
            });
        }
    });


    //Delete




</script>
