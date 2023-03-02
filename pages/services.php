<?php

include_once $layout.'/header.php'?>

<div class="container-fuild bg-lgts">
    <div class="container">
        <h2 class="title-search" data-in="slideDown" data-out="slideUp" data-duration="500" data-delay="200">
            Nos services
        </h2>
    </div>
</div>
<div class="container">
    <div class="row p79-0">
        <div class="row row-service">
            <div class="col-md-12">
                <div class="heading-content-one border">
                    <h2 class="title font-30 wow slideInLeft">Nos services</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="apartments-content wow slideInLeft">
                    <div class="image-content">
                        <img src="<?=$cdn_domaine?>/media/vm.jpg" alt="63d8fd2600d30.jpg">
                    </div>
                    <div class="text-content">
                        <div class="top-content text-center">
                            <h3>Vente de maison</h3>
                            <div class="text-center py-3">
                                <a href="<?=$domaine?>/vente-logement" class="a-service">En savoir plus <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="apartments-content wow slideInLeft">
                    <div class="image-content">
                        <img src="<?=$cdn_domaine?>/media/am.jpg" alt="63d8fd2600d30.jpg">
                    </div>
                    <div class="text-content">
                        <div class="top-content text-center">
                            <h3>Louer une maison</h3>
                            <div class="text-center py-3">
                                <a href="<?=$domaine?>/louer-logement" class="a-service">En savoir plus <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="apartments-content wow slideInRight">
                    <div class="image-content">
                        <img src="<?=$cdn_domaine?>/media/tch.jpg" alt="63d8fd2600d30.jpg">
                    </div>
                    <div class="text-content">
                        <div class="top-content text-center">
                            <h3>Louer un techniciens </h3>
                            <div class="text-center py-3">
                                <a href="<?=$domaine?>/techniciens" class="a-service">En savoir plus <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

<?php include_once $layout.'/footer.php'?>
