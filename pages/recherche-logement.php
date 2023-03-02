<?php
if(isset($_GET['ville']) and isset($_GET['commune'])){
    $serachs =  $logement->getLgtsBySearch($_GET['ville'],$_GET['commune']);
}else{
    header('location:'.$domaine.'/error');
    exit();
}

$vl =  $logement->getAllVille();
$qt =  $logement->getAllQuartier();
include_once $layout.'/header.php'
?>

<div class="container-fuild bg-search">
    <div class="container">
        <h2 class="title-search" data-in="slideDown" data-out="slideUp" data-duration="500" data-delay="200">
            Résultats de la recherche
        </h2>
    </div>
</div>

<div class="form-area eight search-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 form-bg form-top border-radius">
                <form  method="get" action="<?=$domaine?>/recherche-logement" class="advance_search_query wow slideInRight" id="searchForm">
                    <div class="form-content">
                        <div class="form-group w40">
                            <label for="ville" >Ville</label>
                            <select class="wide" name="ville" id="ville">
                                <option  selected>Choisir une ville</option>
                                <?php
                                while($ville = $vl->fetch()){
                                    ?>
                                    <option value="<?=$ville['ville_lgt']?>"><?=html_entity_decode(stripslashes($ville['ville_lgt']))?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group w40">
                            <label for="commune" >Commune</label>
                            <select class="wide" name="commune" id="commune">
                                <option selected>Choisir une commune</option>
                                <?php
                                while($quartier = $qt->fetch()){
                                    ?>
                                    <option value="<?=$quartier['quartier_lgt']?>"><?=html_entity_decode(stripslashes($quartier['quartier_lgt']))?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button btn-blue"> Recherche</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="apartments-area bg-gray-color">
<div class="container">
<div class="col-md-12">
    <div class="heading-content-one border">
        <h2 class="title font-30"> &amp; Appartements</h2>
        <h5 class="sub-title">Trouvez un appartements, pour votre capacité</h5>
    </div>
</div>
<div class="row">
    <?php
    while($serachData = $serachs->fetch()){
        $gals = $galerie->getGalerieByLgtId($serachData['id_logement']);
        ?>
        <div class="col-md-3">
            <div class="apartments-content">
                <div class="image-content">
                    <div class="caroussel-item">
                        <div class="owl-carousel position-relative">
                            <?php
                            while($galDatas = $gals->fetch()){
                                ?>
                                <div class="item  position-relative">
                                    <a href="<?=$domaine?>/logements/<?=$serachData['slug_lgt']?>">
                                        <img src="<?=$cdn_domaine?>/media/lgts/<?=$galDatas['photo']?>" alt="<?=$galDatas['photo']?>" />
                                    </a>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="text-content">
                    <div class="top-content">
                        <h3><a href="<?=$domaine?>/logements/<?=$serachData['slug_lgt']?>"><?=reduit_text(html_entity_decode(stripslashes($serachData['nom_lgt'])),'20') ?></a></h3>
                        <span><i class="fa fa-map-marker"></i><?=html_entity_decode(stripslashes($serachData['ville_lgt'])) .', '.reduit_text(html_entity_decode(stripslashes($serachData['quartier_lgt'])),'10')?></span>
                    </div>
                    <div class="bottom-content clearfix">
                        <div class="meta-bed-room">
                            <i class="fa fa-home"></i> <?=$serachData['chambres']?> Chambres
                        </div>
                        <div class="meta-bath-room">
                            <i class="fa fa-bath"></i><?=$serachData['bain']?> Salles De Bain
                        </div>
                        <span class="clearfix"></span>
                        <div class="rent-price pull-left">
                            <?=number_format($serachData['tarif'],0,',',' ') ?> CFA
                        </div>
                        <div class="share-meta dropup pull-right">
                            <ul>
                                <li class="dropup">
                                    <a href="#" class="dropdown-toggle font-13" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="font-13"><i class="fa fa-eye m-0"></i> 25</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>
</div>
</div>

<?php include_once $layout.'/footer.php'?>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            nav:true,
            autoplay: true,
            autoplayTimeout: 4000,
            smartSpeed:3000,
            autoplayHoverPause: true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }

        });
    })
</script>
<script>
    var ville = $('#ville');
    var commune = $('#commune');
    $(document).ready(function(){
        ville.val('<?=$_GET['ville']?>');
        ville.niceSelect();
        commune.val('<?=$_GET['commune']?>');
        commune.niceSelect();

    });
</script>