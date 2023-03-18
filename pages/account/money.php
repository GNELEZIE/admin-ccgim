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
                                        <h2 class="pb7"> <span class="sld"> <span class="or_solde"></span> </span> </h2>
                                        <p class="line-height1"><small><i><span class="sld-red"><span class="orange_credit"></span></span> depensé</i></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/mm.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2 class="pb7"> <span class="sld"> <span class="mtn_solde"></span> </span> </h2>
                                        <p class="line-height1"><small><i><span class="sld-red"><span class="mtn_credit"></span></span> depensé</i></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/mov.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2 class="pb7"> <span class="sld"><span class="moov_solde"></span> </h2>
                                        <p class="line-height1"><small><i><span class="sld-red"><span class="moov_credit"></span></span> depensé</i></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/wave.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2 class="pb7"> <span class="sld"><span class="wave_solde"></span></span> </h2>
                                        <p class="line-height1"><small><i><span class="sld-red"><span class="wave_credit"></span></span> depensé</i></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col50-mobile">
                                <div class="ts-box">
                                    <div class="icon">
                                        <i class="fa fa-wallet myicon-trend my-icon-dashboard-green"></i>
                                    </div>
                                    <div class="nbLgt">
                                        <h2>Montant total</h2>
                                        <h2 class="pb7"> <span class="sld"> <span class="total_solde"></span> </span> </h2>
                                    </div>
                                </div>
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


<?php include_once $layout.'/auth/footer.php'?>

<script>
    $(document).ready(function() {

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





    });

</script>