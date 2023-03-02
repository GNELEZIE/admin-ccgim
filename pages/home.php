<?php
$list =  $logement->getAllLgts();
$vl =  $logement->getAllVille();
$qt =  $logement->getAllQuartier();
include_once $layout.'/header.php'
?>

<div class="main-slide eight">
    <div class="pogoSlider">
        <div class="pogoSlider-slide" data-transition="expandReveal" data-duration="1000" style="background-image:url(<?=$cdn_domaine?>/media/bg2.jpg)">
            <div class="container-slider one">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slider-content-eight">
                            <h2 class="pogoSlider-slide-element title1" data-in="slideDown" data-out="slideUp" data-duration="500" data-delay="200">
                                CCGIM est une agence immobilière
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="form-area eight searchDiv">
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
<div class="container-fluid">
    <div class="aboutus-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content-one border">
                        <h2 class="title font-30 wow slideInLeft">Présentation</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <p class="wow slideInLeft">
                            Le Cabinet CCGIM est un cabinet de conseil en immobilier qui totalise plus de 10 ans d'expertise. Nous sommes spécialisés dans l’accompagnement des locataires en quête de logement de leur rêve et des propriétaires dans leurs projets immobiliers.
                            Nous proposons des services complets et personnalisés pour répondre aux besoins de nos clients. Nous sommes à l’écoute de leurs attentes  et nous nous engageons à leur fournir  des solutions adaptées à leurs objectifs.
                            Nous sommes fiers de notre expertise et de notre savoir-faire. Notre équipe composée de professionnels qualifiés et expérimentés qui sont à votre disposition pour vous accompagner dans tous vos projets immobiliers.
                            Nous sommes à votre service pour vous aider à trouver la meilleure solution pour votre projet immobilier. N'hésitez pas à nous contacter pour toute question ou demande de renseignement.

                        </p>
                        <div class="py-3  wow slideInLeft">
                            <a href="<?=$domaine?>/a-propos" class="a-service">En savoir plus <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-content wow slideInRight">
                        <img src="<?=$cdn_domaine?>/assets/images/about-image.png" alt="about" />
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="call-to-action overlay-bg" style="background-image:url(<?=$cdn_domaine?>/media/contact-bg-image.png)">
    <div class="container">
        <div class="row tb">
            <div class="col-md-6 col-sm-6 tb-cell">
                <div class="contact-left-content wow slideInLeft">
                    <h3>Voulez-vous louer une maison ?</h3>
                    <h4 class="color-blue">Appelez-nous et listez votre propriété ici</h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 tb-cell">
                <div class="contact-right-content  wow slideInRight">
                    <h4><a href="tel:002250707856528">+225 07 07 85 65 28<span>support@ccigim.com</span></a></h4>
                    <a href="<?=$domaine?>/contacts" class="button btn-register pdc">Contactez-nous</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="aboutus-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content-one border">
                        <h2 class="title font-30 wow slideInLeft">Mot du fondateur et gérant   </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <p class="wow slideInLeft">
                            Je suis particulièrement heureux, en ma qualité de gérant du Cabinet …….de vous souhaiter à tous la bienvenue sur notre site web www.cabinet-ccgim.com . Je voudrais saisir par la même occasion, l’opportunité que nous offrent les moyens multimédias de communication dont l’internet de toucher le public cible (propriétaires, locataires, investisseurs,…) en mettant en exergue notre expertise et transparence dans la gestion immobilière.
                        </p>
                        <p class="wow slideInLeft">
                            En effet, le CCGIM est le fruit de 12 ans de gestion des baux administratifs de la Marine Nationale. Nous faisons la promotion des baux administratifs. Notre particularité ? C’est la transparence, la fiabilité et la sincérité dans la gestion immobilière.
                        </p>
                        <p class="wow slideInLeft">
                            Nous innovons en mettant à la disposition du propriétaire à la fin de chaque mois les relevés des paiements de ses baux administratifs et les fiches des encaissements par quartier de ses locataires. De sorte qu’il suive ‘’mois par mois’’ le rendement de son investissement.
                        </p>
                        <p class="wow slideInLeft">
                            Le recouvrement des loyers avec les locataires se fait dans le strict respect de la dignité des locataires. Le CCGIM n’encaisse pas les locataires à domicile, librement et en toute discrétion, le locataire paie son loyer par versement sur les comptes bancaires du CCGIM ou par dépôt mobile money sur nos comptes.
                        </p>
                        <div class="text-center py-3">
                            <a href="<?=$domaine?>/mot-du-fondateur" class="a-service">En savoir plus <i class="fa fa-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-content wow slideInRight">
                        <img src="<?=$cdn_domaine?>/media/dg.jpeg" alt="about" />
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-services">
    <div class="container">
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
<div class="apartments-area bg-appartm">
    <div class="container">
        <div class="col-md-12">
            <div class="heading-content-one border">
                <h2 class="title font-30 wow slideInLeft"> &amp; Appartements</h2>
                <h5 class="sub-title wow slideInLeft">Trouvez un appartements, pour votre capacité</h5>
            </div>
        </div>
        <div class="row">
            <?php
            while($listData = $list->fetch()){
                $gals = $galerie->getGalerieByLgtId($listData['id_logement']);
                ?>
                <div class="col-md-3">
                    <div class="apartments-content wow slideInRight">
                        <div class="image-content">
                            <div class="caroussel-item">
                                <div class="owl-carousel position-relative">
                                    <?php
                                    while($galDatas = $gals->fetch()){
                                        ?>
                                        <div class="item  position-relative">
                                            <a href="<?=$domaine?>/logements/<?=$listData['slug_lgt']?>">
                                                <img src="<?=$cdn_domaine?>/media/lgts/<?=$galDatas['photo']?>" class="cover-img-200" alt="<?=$galDatas['photo']?>" />
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
                                <h3><a href="<?=$domaine?>/logements/<?=$listData['slug_lgt']?>"><?=reduit_text(html_entity_decode(stripslashes($listData['nom_lgt'])),'20') ?></a></h3>
                                <span><i class="fa fa-map-marker"></i><?=html_entity_decode(stripslashes($listData['ville_lgt'])) .', '.reduit_text(html_entity_decode(stripslashes($listData['quartier_lgt'])),'10')?></span>
                            </div>
                            <div class="bottom-content clearfix">
                                <div class="meta-bed-room">
                                    <i class="fa fa-home"></i> <?=$listData['chambres']?> Chambres
                                </div>
                                <div class="meta-bath-room">
                                    <i class="fa fa-bath"></i><?=$listData['bain']?> Salles De Bain
                                </div>
                                <span class="clearfix"></span>
                                <div class="rent-price pull-left">
                                    <?=number_format($listData['tarif'],0,',',' ') ?> CFA
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
        <a href="<?=$domaine?>/logements" class="button nevy-button wow slideInLeft">Tous les appartements</a>
    </div>
</div>
<div class="call-to-action overlay-bg" style="background-image:url(<?=$cdn_domaine?>/media/contact-bg-image.png)">
    <div class="container">
        <div class="row tb">
            <div class="col-md-6 col-sm-6 tb-cell">
                <div class="contact-left-content  wow slideInLeft">
                    <h3>Mettre en location une maison ?</h3>
                    <h4 class="color-blue">Appelez-nous et listez votre propriété ici</h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 tb-cell">
                <div class="contact-right-content  wow slideInRight">
                    <h4><a href="tel:002250703325924">+225 07 03 32 59 24<span>support@ccigim.com</span></a></h4>
                    <a href="<?=$domaine?>/contacts" class="button btn-register pdc">Contactez-nous</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="testimonial-area bg-gray-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-heading-content">
                    <h2 class="title  wow slideInLeft">Témoignages</h2>
                    <i class="fa fa-quote-right"></i>
                    <h2 class="sub-title">Quelques avis</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-slider owl-carousel owl-theme  wow slideInRight">
                    <div class="item">
                        <div class="client-image">
                            <img src="<?=$cdn_domaine?>/assets/images/testimonial-image.png" alt="testimonial" />
                        </div>
                        <div class="client-content">
                            <h3>Single Rakib</h3>
                            <h5>softhopper Manager</h5>
                            <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="client-image">
                            <img src="<?=$cdn_domaine?>/assets/images/testimonial-image.png" alt="testimonial" />
                        </div>
                        <div class="client-content">
                            <h3>Single Rakib</h3>
                            <h5>softhopper Manager</h5>
                            <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="client-image">
                            <img src="<?=$cdn_domaine?>/assets/images/testimonial-image.png" alt="testimonial" />
                        </div>
                        <div class="client-content">
                            <h3>Single Rakib</h3>
                            <h5>softhopper Manager</h5>
                            <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="client-image">
                            <img src="<?=$cdn_domaine?>/assets/images/testimonial-image.png" alt="testimonial" />
                        </div>
                        <div class="client-content">
                            <h3>Single Rakib</h3>
                            <h5>softhopper Manager</h5>
                            <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="client-image">
                            <img src="<?=$cdn_domaine?>/assets/images/testimonial-image.png" alt="testimonial" />
                        </div>
                        <div class="client-content">
                            <h3>Single Rakib</h3>
                            <h5>softhopper Manager</h5>
                            <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="client-image">
                            <img src="<?=$cdn_domaine?>/assets/images/testimonial-image.png" alt="testimonial" />
                        </div>
                        <div class="client-content">
                            <h3>Single Rakib</h3>
                            <h5>softhopper Manager</h5>
                            <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="client-image">
                            <img src="<?=$cdn_domaine?>/assets/images/testimonial-image.png" alt="testimonial" />
                        </div>
                        <div class="client-content">
                            <h3>Single Rakib</h3>
                            <h5>softhopper Manager</h5>
                            <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="client-image">
                            <img src="<?=$cdn_domaine?>/assets/images/testimonial-image.png" alt="testimonial" />
                        </div>
                        <div class="client-content">
                            <h3>Single Rakib</h3>
                            <h5>softhopper Manager</h5>
                            <p>Amorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae nibh nisl. Cras etitikis mauris eget lorem ultricies ferme ntum a inti diam.</p>
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-area">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content-two available  wow slideInLeft">
                        <h2 class="title font-30">Nous sommes disponibles pour vous 7j/7</h2>
                        <h5 class="sub-title">Notre service d'assistance en ligne est toujours 24 heures</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="map-right-content  wow slideInLeft">

                        <div class="contact">
                            <h4 class="font-15"><i class="fa fa-map-marker"></i>Adresse</h4>
                            <p>Abidjan, Yopougon BAE</p>
                        </div>
                        <div class="contact">
                            <h4 class="font-15"><i class="fa fa-envelope"></i>Mail</h4>
                            <p>support@ccgim.com</p>
                        </div>
                        <div class="contact">
                            <h4 class="font-15"><i class="fa fa-phone-square"></i>Téléphone</h4>
                            <p>+225 07 03 32 59 24 <br/>+225 07 07 85 65 28</p>
                        </div>
                        <div class="contact">
                            <h4 class="font-15"><i class="fa fa-user-circle"></i>Réseaux sociaux</h4>
                            <div class="social-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-7">
                    <div class="map-left-content  wow slideInRight">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.4431673262293!2d-4.098919285725766!3d5.3491296371842605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfb83a8e9beff779%3A0x56c916b7e211bb86!2sYOPOUGON%2C%20ANANERAIE!5e0!3m2!1sfr!2sci!4v1676626218126!5m2!1sfr!2sci" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>





























<?php include_once $layout.'/footer.php'?>
<script>
    $(document).ready(function(){
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

        $('#ville').niceSelect();
        $('#commune').niceSelect();
    });
</script>