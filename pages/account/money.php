<?php
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
include_once $layout.'/auth/header.php'
?>


    <div class="container-fluid py-5 bg-gray-color pd-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-3 mobile-none">
                    <div class="compte-box bg-white-color">
                        <div class="header-box">
                            Menu
                        </div>
                        <?php
                        include_once $layout.'/menu-dashboard.php';
                        ?>
                    </div>
                </div>
                <div class="col-md-9 pd-mobile">
                    <div class="header-box">
                        Compte monétique
                    </div>
                    <div class="bg-white-color p30">
                        <div class="row myrow">
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/om.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2> Solde UV</h2>
                                        <h2 class="pb7 font-15"> <span class="sld"> <span class="or_solde"></span> </span> </h2>
<!--                                        <p class="line-height1"><small><i>Retrait : <span class="sld-red"><span class="orange_credit"></span></span></i></small></p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/mm.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2> Solde UV</h2>
                                        <h2 class="pb7 font-15"><span class="sld"> <span class="mtn_solde"></span> </span> </h2>
<!--                                        <p class="line-height1"><small>Retrait :<i><span class="sld-red"><span class="mtn_credit"></span></span></i></small></p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/mov.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2> Solde UV</h2>
                                        <h2 class="pb7 font-15"> <span class="sld"><span class="moov_solde"></span> </span></h2>
<!--                                        <p class="line-height1"><small><i>Retrait : <span class="sld-red"><span class="moov_credit"></span></span></i></small></p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/wave.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2> Solde UV</h2>
                                        <h2 class="pb7 font-15"><span class="sld"><span class="wave_solde"></span></span> </h2>
<!--                                        <p class="line-height1"><small><i>Retrait : <span class="sld-red"><span class="wave_credit"></span></span> </i></small></p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <i class="fa fa-wallet myicon-trend my-icon-dashboard-green"></i>
                                    </div>
                                    <div class="nbLgt">
                                        <h2>Caisse UV</h2>
                                        <h2 class="pb7"> <span class="sld"> <span class="total_solde"></span> </span> </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <i class="fa fa-wallet myicon-trend my-icon-dashboard-green"></i>
                                    </div>
                                    <div class="nbLgt">
                                        <h2>Caisse liquide</h2>
                                        <h2 class="pb7"> <span class="sld"> <span class="total_liquide"></span> </span> </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile" style="align-items: center; display: inherit;">
                                <a class="om" href="javacript:void(0)" data-toggle="modal"  data-target="#chargeModalCenter"> <i class="fa fa-plus"></i> Charger UV</a>
                            </div>
                        </div>
                         <div class="myrow">
                            <div class="col33-mobile pb20">
                                <a href="<?=$domaine?>/compte/orange" class="om">Orange money</a>
                            </div>
                             <div class="col33-mobile pb20">
                                 <a href="<?=$domaine?>/compte/mtn" class="mtn">MTN money</a>
                             </div>
                             <div class="col33-mobile">
                                 <a href="<?=$domaine?>/compte/moov" class="moov">Moov money</a>
                             </div>
                             <div class="col33-mobile">
                                 <a href="<?=$domaine?>/compte/wave" class="wave">Wave</a>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="chargeModalCenter" tabindex="-1" role="dialog" aria-labelledby="chargeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Ajouter une opération <span class="nom" id="nom"></span></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formCharge">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="reseau" class="pd7">Réseau</label>
                                <select class="wide form-control no-nice-select-search-box input-style input-height select-transac" name="reseau" id="reseau" required>
                                    <option value="" selected>Choisir un réseau</option>
                                    <option value="1">Orange</option>
                                    <option value="2">MTN</option>
                                    <option value="3">Moov</option>
                                    <option value="4">Wave</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="montant" >Montant <i class="required"></i></label>
                                <input type="text" class="form-control input-style input-height" name="montant" id="montant" placeholder="Montant" required/>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                    <a href="javascript:void(0);" class="btn btn-danger btn-closed" data-dismiss="modal">Annuler</a>
                    <button  class="btn btn-payer-maintenant"> <i class="loaderBtnCharge"></i> Enregistrer </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once $layout.'/auth/footer.php'?>

<script>
    $(document).ready(function() {




        chargeLiquideTotal();
        function chargeLiquideTotal(){
            $.ajax({
                type: 'post',
                data: {
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/caisseliquide',
                dataType: 'json',
                success: function(data){
                    $('.total_liquide').html(data.total_liquide);
                }
            });
        }


        chargeSoldeTotal();
        function chargeSoldeTotal(){
            $.ajax({
                type: 'post',
                data: {
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/soldetotal',
                dataType: 'json',
                success: function(data){
                    $('.total_solde').html(data.total_solde);
                }
            });
        }


        chargeSoldeOr();
        function chargeSoldeOr(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 1,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/dispo.orange',
                dataType: 'json',
                success: function(data){
                    $('.or_solde').html(data.omdispo_solde);
                }
            });
        }

    chargeSoldeMtn();
        function chargeSoldeMtn(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 2,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/dispo.orange',
                dataType: 'json',
                success: function(data){
                    $('.mtn_solde').html(data.omdispo_solde);
                }
            });
        }

    chargeSoldeMoov();
        function chargeSoldeMoov(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 3,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/dispo.orange',
                dataType: 'json',
                success: function(data){
                    $('.moov_solde').html(data.omdispo_solde);
                }
            });
        }


    chargeSoldeWave();
        function chargeSoldeWave(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 4,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/dispo.orange',
                dataType: 'json',
                success: function(data){
                    $('.wave_solde').html(data.omdispo_solde);
                }
            });
        }

        chargeCreditOrange();
        function chargeCreditOrange(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 1,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/credit.orange',
                dataType: 'json',
                success: function(data){
                    $('.orange_credit').html(data.om_credit);
                }
            });
        }

        chargeCreditMtn();
        function chargeCreditMtn(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 2,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/credit.orange',
                dataType: 'json',
                success: function(data){
                    $('.mtn_credit').html(data.om_credit);
                }
            });
        }
         chargeCreditMoov();
        function chargeCreditMoov(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 3,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/credit.orange',
                dataType: 'json',
                success: function(data){
                    $('.moov_credit').html(data.om_credit);
                }
            });
        }

        chargeCreditWave();
        function chargeCreditWave(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 4,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/credit.orange',
                dataType: 'json',
                success: function(data){
                    $('.wave_credit').html(data.om_credit);
                }
            });
        }
        $('#reseau').niceSelect();
        $("#montant").keyup(function (event) {
            if (/\D/g.test(this.value)) {
                //Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });

        $('#formCharge').submit(function(e){
            e.preventDefault();
            $(".loaderBtnCharge").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
            var value = document.getElementById('formCharge');
            var form = new FormData(value);
            $.ajax({
                method: 'post',
                url: '<?=$domaine?>/controle/charge.save',
                data: form,
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){

                    if(data == 'ok'){
                        $('#reseau').val('');
                        $('#montant').val('');
                        $(".loaderBtnCharge").html('');
                        chargeSoldeWave();
                        chargeSoldeMoov();
                        chargeSoldeMtn();
                        chargeSoldeOr();
                        chargeSoldeTotal();
                        swal("Opération effectuée avec succès !","", "success");
                    }
                    else{
                        swal("Action Impossible !", "Une erreur s\'est produite.", "error");
                        $('#reseau').val('');
                        $('#montant').val('');
                        $(".loaderBtnCharge").html('');
                    }
                },
                error: function (error, ajaxOptions, thrownError) {
                    alert(error.responseText);
                }
            });

        });


    });

</script>