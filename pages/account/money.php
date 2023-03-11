<?php
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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/om.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2 class="pb7"> <span class="sld">15 000 <small>FCFA</small></span> </h2>
                                        <p class="line-height1"><small><i><span class="sld-red">50 000 <small>FCFA</small></span> depensé</i></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/mm.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2 class="pb7"> <span class="sld">15 000 <small>FCFA</small></span> </h2>
                                        <p class="line-height1"><small><i><span class="sld-red">50 000 <small>FCFA</small></span> depensé</i></small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="ts-box">
                                    <div class="icon">
                                        <img src="<?=$cdn_domaine?>/media/mov.png" class="img-money" alt=""/>
                                    </div>
                                    <div class="nbLgt">
                                        <h2 class="pb7"> <span class="sld">15 000 <small>FCFA</small></span> </h2>
                                        <p class="line-height1"><small><i><span class="sld-red">50 000 <small>FCFA</small></span> depensé</i></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ts-box">
                                    <div class="icon">
                                        <i class="fa fa-wallet myicon-trend my-icon-dashboard-green"></i>
                                    </div>
                                    <div class="nbLgt">
                                        <h2>Montant total</h2>
                                        <h2 class="pb7"> <span class="sld">15 000 <small>FCFA</small></span> </h2>
                                        <p class="line-height1"><small><i><span class="sld-red">50 000 <small>FCFA</small></span> depensé</i></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="">
                             <a href="<?=$domaine?>/compte/orange" class="om">Orange money</a>
                             <a href="<?=$domaine?>/compte/mtn" class="mtn">MTN money</a>
                             <a href="<?=$domaine?>/compte/moov" class="moov">Moov money</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once $layout.'/auth/footer.php'?>