<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();
}

if(isset($_GET['page']) and is_numeric($_GET['page'])){
    $numPage = $_GET['page'];
    $fin = 12 * $numPage;
    $debut = $fin - 12;
}else{
    $numPage = 1;
    $debut = 0;
    $fin = 12;
}

$nblog = $logement->getNblogementsByUser($_SESSION['_ccgim_201']['id_utilisateur']);
if($nbre = $nblog->fetch()){
    $pages = ceil($nbre['nb']/12);
}else{
    $pages = 1;
}
$pagination_list = '';
$myPage = '/compte/logements';
$lgst = $logement->getLogementByUser($_SESSION['_ccgim_201']['id_utilisateur'],$debut, $fin);







include_once $layout.'/auth/header.php'?>

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
                <div class="col-md-9">
                    <div class="header-box">
                        <div class="d-flex align-items-center">
                            <p class="m-0 w50-m">  Mes logements</p>
                            <div class="w50-ms text-right ">
                                <a href="<?=$domaine?>/annonce" class="btn-white"> <i class="fa fa-plus"></i> Ajouter un logement</a>
                            </div>
                        </div>

                    </div>
                    <div class="bg-white-color pb30 mes-lgts">
                    <div class="row ">
                        <?php
                        while($dataLogt = $lgst->fetch()){
                            $gals = $galerie->getGalerieByLgtId($dataLogt['id_logement']);
                            ?>
                            <div class="col-md-4">
                                <div class="apartments-content">
                                    <div class="image-content">
                                        <div class="caroussel-item">
                                            <div class="owl-carousel position-relative">
                                                <?php
                                                while($galDatas = $gals->fetch()){
                                                    ?>
                                                    <div class="item  position-relative">
                                                        <a href="<?=$domaine?>/annonce/description/<?=$dataLogt['slug_lgt']?>">
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
                                        <div class="top-content text-box-home">
                                            <h3><a href="<?=$domaine?>/annonce/description/<?=$dataLogt['slug_lgt']?>" class="font-15"><?=reduit_text(html_entity_decode(stripslashes($dataLogt['nom_lgt'])),'20') ?></a></h3>
                                            <span><i class="fa fa-map-marker font-13"></i><?=html_entity_decode(stripslashes($dataLogt['ville_lgt'])) .', '.html_entity_decode(stripslashes($dataLogt['quartier_lgt'])) ?></span>
                                        </div>
                                        <div class="bottom-content clearfix">
                                            <span class="clearfix"></span>
                                            <div class="rent-price pull-left">
                                                <span class="font-11"><?=number_format($dataLogt['tarif'],0,',',' ') ?> CFA</span>
                                            </div>
                                            <div class="share-meta dropup pull-right">
                                                <ul>
                                                    <li class="dropup">
                                                        <a href="#" class="dropdown-toggle font-11" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="font-11"><i class="fa fa-eye m-0"></i> 23</a>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-link text-center">
                                    <ul class="pagination">
                                        <?php
                                        if(isset($_GET['page']) and is_numeric($_GET['page'])){

                                            if($pages < 2 ){
                                                $pagination_list = '
                                            <li class=""><a href="javascript:void(0)" class="" ><i class="fa fa-angle-left"></i></a></li>
                                            <li class=" active"><a href="javascript:void(0)"  class="active">1</a></li>
                                            <li class=""><a href="javascript:void(0)" class="" ><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                                            }else{
                                                if($_GET['page'] > 1 ){
                                                    $prec = $_GET['page']-1;
                                                    $pagination_list .= '
                                           <li class=""> <a href="'.$domaine.$myPage.'?page='.$prec.'" class=""> <i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                                                }else{
                                                    $prec = 1;
                                                    $pagination_list .= '
                                           <li class=""><a href="javascript:void(0)" style="cursor: not-allowed" class=""><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                                                }

                                                if($pages > 5){
                                                    for($i = 1; $i <= $pages ; $i++){
                                                        if($_GET['page'] > 2){
                                                            if($i > $_GET['page']-2 and $i < $_GET['page']+2){
                                                                if($i != $pages){
                                                                    if($i == $_GET['page']){
                                                                        $pagination_list .='
                                                                 <li class=" active"><a href="javascript:void(0)" class="">'.$i.'</a></li>
                                                            ';
                                                                    }else{
                                                                        if($i < 3){
                                                                            $pagination_list .='
                                                                 <li class=""><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                            ';
                                                                        }else{
                                                                            $pagination_list .='
                                                                 <li class="hidden-xs "><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                            ';
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            if($i < 6){
                                                                if($i == $_GET['page']){
                                                                    $pagination_list .='
                                                             <li class=" active"><a href="javascript:void(0)"  class="active ">'.$i.'</a></li>
                                                        ';
                                                                }else{
                                                                    if($i < 3){
                                                                        $pagination_list .='
                                                             <li class=""><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                        ';
                                                                    }else{
                                                                        $pagination_list .='
                                                             <li class="hidden-xs "><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                        ';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    if($_GET['page'] < $pages-2){
                                                        $pagination_list .='
                                                    <li class="hidden-xs "><a href="javascript:void(0)" class="">...</a></li>
                                                ';
                                                    }
                                                    if($_GET['page'] == $pages){
                                                        $pagination_list .='
                                                    <li class=" active"><a href="javascript:void(0)" class="">'.$i.'</a></li>
                                                ';
                                                    }else{
                                                        $pagination_list .='
                                                    <li class="hidden-xs "><a href="'.$domaine.$myPage.'?page='.$pages.'" class="">'.$pages.'</a></li>
                                                ';
                                                    }
                                                }else{
                                                    for($i = 1; $i <= $pages ; $i++){
                                                        if($i == $_GET['page']){
                                                            $pagination_list .='
                                                        <li class=" active"><a href="javascript:void(0)"  class="">'.$i.'</a></li>
                                                ';
                                                        }else{
                                                            if($i < 3){
                                                                $pagination_list .='
                                                    <li class=""><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                ';
                                                            }else{
                                                                $pagination_list .='
                                                    <li class="hidden-xs "><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                ';
                                                            }
                                                        }
                                                    }
                                                }

                                                if($_GET['page'] < $pages ){
                                                    $suiv = $_GET['page']+1;
                                                    $pagination_list .= '
                                            <li class=""><a href="'.$domaine.$myPage.'?page='.$suiv.'"  class=""><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                                                }else{
                                                    $suiv = $pages;
                                                    $pagination_list .= '
                                            <li class=""><a href="javascript:void(0)" style="cursor: not-allowed"  class=""><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                                                }

                                            }
                                        }else{
                                            if($pages < 2 ){
                                                $pagination_list = '
                                            <li class=""><a href="javascript:void(0)"  class=""><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                            <li class=" active"><a href="javascript:void(0)"  class="">1</a></li>
                                            <li class=""><a href="javascript:void(0)"  class=""><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                                            }else{
                                                $pagination_list .= '
                                            <li class=""><a href="javascript:void(0)" style="cursor: not-allowed" class=""><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                                                if($pages > 5){
                                                    for($i = 1; $i <= $pages ; $i++){
                                                        if($i < 6){
                                                            if($i == 1){
                                                                $pagination_list .='
                                                            <li class=" active"><a href="javascript:void(0)"  class="">'.$i.'</a></li>
                                                        ';
                                                            }else{
                                                                if($i < 3){
                                                                    $pagination_list .='
                                                            <li class=""><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                        ';
                                                                }else{
                                                                    $pagination_list .='
                                                            <li class="hidden-xs "><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                        ';
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $pagination_list .='
                                                    <li class="hidden-xs "><a href="javascript:void(0)" class="">...</a></li>
                                            ';
                                                    $pagination_list .='
                                                    <li class="hidden-xs "><a href="'.$domaine.$myPage.'?page='.$pages.'" class="">'.$pages.'</a></li>
                                            ';
                                                }else{
                                                    for($i = 1; $i <= $pages ; $i++){
                                                        if($i == 1){
                                                            $pagination_list .='
                                                        <li class=" active"><a href="javascript:void(0)"  class="">'.$i.'</a></li>
                                                    ';
                                                        }else{
                                                            if($i < 3){
                                                                $pagination_list .='
                                                    <li class=""><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                    ';
                                                            }else{
                                                                $pagination_list .='
                                                    <li class="hidden-xs "><a href="'.$domaine.$myPage.'?page='.$i.'" class="">'.$i.'</a></li>
                                                    ';
                                                            }
                                                        }
                                                    }
                                                }
                                                $pagination_list .= '
                                            <li class=""><a href="'.$domaine.$myPage.'?page='.(1+1).'" class=""><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                                            }
                                        }
                                        ?>
                                        <?=$pagination_list?>
                                    </ul>
                                    
                                    
                                    
                                </div>
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