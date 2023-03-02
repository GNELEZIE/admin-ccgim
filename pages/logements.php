<?php
if(isset($doc[0]) and !isset($doc[1])){
    if(isset($_GET['page']) and is_numeric($_GET['page'])){
        $numPage = $_GET['page'];
        $fin = 12 * $numPage;
        $debut = $fin - 12;
    }else{
        $numPage = 1;
        $debut = 0;
        $fin = 12;
    }

    $nblog = $logement->getNblogements();
    if($nbre = $nblog->fetch()){
        $pages = ceil($nbre['nb']/12);
    }else{
        $pages = 1;
    }
    $pagination_list = '';
    $myPage = '/logements';
    $lgst = $logement->getAllLogements($debut, $fin);

}elseif(isset($doc[1]) and !isset($doc[2])){
    $lgt = $logement->getLgtsSlug($doc[1]);
    if($DataLg = $lgt->fetch()){
        $gals = $galerie->getGalerieByLgtId($DataLg['id_logement']);
        $gals2 = $galerie->getGalerieByLgtId($DataLg['id_logement']);
    }else{
        header('location:'.$domaine.'/error');
        exit();
    }
}else{
    header('location:'.$domaine.'/error');
    exit();
}
include_once $layout.'/header.php'?>
<?php  if(isset($doc[0]) and !isset($doc[1])){
    ?>
    <div class="container-fuild bg-lgts">
        <div class="container">
            <h2 class="title-search" data-in="slideDown" data-out="slideUp" data-duration="500" data-delay="200">
                Logements
            </h2>
        </div>
    </div>
<div class="container">
    <div class="row p79-0">
        <?php
        while($dataLogt = $lgst->fetch()){
            $gals = $galerie->getGalerieByLgtId($dataLogt['id_logement']);
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
                                        <a href="<?=$domaine?>/logements/<?=$dataLogt['slug_lgt']?>">
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
                            <h3><a href="<?=$domaine?>/logements/<?=$dataLogt['slug_lgt']?>"><?=reduit_text(html_entity_decode(stripslashes($dataLogt['nom_lgt'])),'20') ?></a></h3>
                            <span><i class="fa fa-map-marker"></i><?=html_entity_decode(stripslashes($dataLogt['ville_lgt'])) .', '.reduit_text(html_entity_decode(stripslashes($dataLogt['quartier_lgt'])),'10')?></span>
                        </div>
                        <div class="bottom-content clearfix">
                            <div class="meta-bed-room">
                                <i class="fa fa-home"></i> <?=$dataLogt['chambres']?> Chambres
                            </div>
                            <div class="meta-bath-room">
                                <i class="fa fa-bath"></i><?=$dataLogt['bain']?> Salles De Bain
                            </div>
                            <span class="clearfix"></span>
                            <div class="rent-price pull-left">
                                <?=number_format($dataLogt['tarif'],0,',',' ') ?> CFA
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

<?php
}else{
    ?>
    <div class="container-fuild bg-lgts">
        <div class="container">
            <h2 class="title-search" data-in="slideDown" data-out="slideUp" data-duration="500" data-delay="200">
                <?=html_entity_decode(stripslashes($DataLg['nom_lgt']))?>
            </h2>
            <p class="text-center text-white font-17 m-0"><i class="fa fa-map-marker"></i><?=html_entity_decode(stripslashes($DataLg['ville_lgt'])) .', '.html_entity_decode(stripslashes($DataLg['quartier_lgt']))?></p>
        </div>
    </div>
    <div class="apartment-single-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="corousel-gallery-content">
                        <div class="gallery">
                            <div class="full-view owl-carousel">
                                <?php
                                while($galDatas = $gals->fetch()){
                                ?>
                                <a class="item image-pop-up" href="<?=$cdn_domaine?>/media/lgts/<?=$galDatas['photo']?>">
                                    <img src="<?=$cdn_domaine?>/media/lgts/<?=$galDatas['photo']?>" alt="corousel">
                                </a>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="list-view owl-carousel">
                                <?php
                                while($galDatas2 = $gals2->fetch()){
                                ?>
                                <div class="item">
                                    <img src="<?=$cdn_domaine?>/media/lgts/<?=$galDatas2['photo']?>" class="cover77" alt="corousel-image">
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="family-apartment-content mobile-extend">
                        <p class=" rent">Montant/mois: <?=number_format($DataLg['tarif'],0,',',' ') ?> CFA</p>
                        <p class=" rent">Description</p>
                        <p class="apartment-description default-gradient-before">
                            <?=html_entity_decode(stripslashes($DataLg['description']))?>
                        </p>
                        <p class=" rent">Informations supplémentaires</p>
                        <p class="apartment-description default-gradient-before">
                            <?=html_entity_decode(stripslashes($DataLg['infos_sup']))?>
                        </p>
                        <div class="price-details">
                            <h3>Autre details</h3>
                            <ul>
                                <li>Chamebre:  <span><?=$DataLg['chambres']?></span></li>
                                <li>Superficie : <span><?=$DataLg['superficie']?> m <sup>2</sup></span></li>
                                <li>Salles De Bain : <span><?=$DataLg['bain']?></span></li>
                                <li>Nombre de lits  :<span> <?=$DataLg['lit']?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden-md hidden-lg text-center extend-btn">
                        <span class="extend-icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="apartment-sidebar apartment-sidebar2">
                        <div class="widget_rental_search clerafix">
                            <div class="form-border">
                                <form  method="post" class="advance_search_query booking-form contact">
                                    <div class="form-bg seven">
                                        <div class="form-content">
                                            <h2 class="form-title">Contactez-nous</h2>
                                            <div class="form-group">
                                                <label for="nom">Nom et prénom <i class="required"></i></label>
                                                <input type="text" name="nom" id="nom" class="input-style" placeholder="Nom et prénom" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="phone">Téléphone <i class="required"></i></label>
                                                <input type="tel" class="full-width has-padding has-border input-style" name="phone" id="phone" value="" style="padding: 7px 15px 7px 45px !important;"  required>
                                                <input type="hidden"  name="isoPhone" id="isoPhone" >
                                                <input type="hidden"  name="dialPhone" id="dialPhone">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email(Facultatif) </label>
                                                <input type="text" name="email" id="email" class="input-style" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="type" >Types de locataire <i class="required"></i></label>
                                                <select class="wide input-style nice-select-search-box" name="type" id="type">
                                                    <option  selected>Choisir types de locataire</option>
                                                    <option value="ordinaire">Locataires ordinaires</option>
                                                    <option value="baux">Locataires enregistrés sous baux</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="message"> Message <i class="required"></i></label>
                                                <textarea name="message" id="message" placeholder="Message" class="form-controller input-style" required></textarea>
                                            </div>


                                            <div class="form-group">
                                                <button type="submit" class="button btn-register button-radius">Envoyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>









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

        $("#phone").keyup(function (event) {
            if (/\D/g.test(this.value)) {
                //Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });

        var inputPhone = document.querySelector("#phone");
        window.intlTelInput(inputPhone, {
            initialCountry: 'ci',
            utilsScript: "<?=$cdn_domaine?>/assets/libs/intltelinput/js/utils.js"
        });
        var iti = window.intlTelInputGlobals.getInstance(inputPhone);
        var countryData = iti.getSelectedCountryData();
        $('#isoPhone').val(countryData["iso2"]);
        $('#dialPhone').val(countryData["dialCode"]);
        inputPhone.addEventListener("countrychange", function() {
            var iti = window.intlTelInputGlobals.getInstance(inputPhone);
            var countryData = iti.getSelectedCountryData();
            $('#isoPhone').val(countryData["iso2"]);
            $('#dialPhone').val(countryData["dialCode"]);
        });

    })
</script>