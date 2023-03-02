<header class="mobile-header-area  hidden-md hidden-lg bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 tb">
                <div class="mobile-header-block">
                    <div class="menu-area tb-cell">
                        <div class="mobile-menu-main hidden-md hidden-lg">
                            <div class="menucontent overlaybg"></div>
                            <div class="menuexpandermain slideRight">
                                <a id="navtoggole-main" class="animated-arrow slideLeft menuclose">
                                    <span class="color-blue"></span>
                                </a>
                                <span class="menu-mobile">Menu</span>
                            </div>
                            <div id="mobile-main-nav" class="main-navigation slideLeft">
                                <div class="menu-wrapper">
                                    <div id="main-mobile-container" class="menu-content clearfix"></div>
                                    <div class="left-content">
                                            <?php
                                            $n_b = $logement->getNblogements()->fetch();
                                            $n_loc = $locataire->getNbLocataire()->fetch();
                                            ?>
                                            <div class="link">
                                                <a href="<?=$domaine?>/compte/dashboard" class="<?= dash_active('dashboard');?>">Tableau de bord</a>
                                            </div>
                                            <div class="link">
                                                <a href="<?=$domaine?>/logement/locataires" class="<?= dash_active('locataires');?>"> <span class="w80"><i class="fa fa-users"></i> Mes locataires</span> <span class="w20"><i class="nb-box" style="font-style: normal;"><?=$n_loc['nb']?></i></span></a>
                                            </div>
                                            <div class="link">
                                                <a href="<?=$domaine?>/logement/tresorerie" class="<?= dash_active('tresorerie');?>"><i class="fa fa-wallet"></i> Trésorerie</a>
                                            </div>
                                            <div class="link">
                                                <a href="<?=$domaine?>/logement/logements"  class="<?= dash_active('logements');?>"> <span class="w80"><i class="fa fa-home-alt"></i> Mes logements</span> <span class="w20"><i class="nb-box" style="font-style: normal;"><?=$n_b['nb']?></i></span></a>
                                            </div>
                                            <div class="link">
                                                <a href="<?=$domaine?>/compte/profil" > <span class="w80"> <i class="fa fa-user"></i> Mon compte</a>
                                            </div>
                                            <div class="link">
                                                <a href="<?=$domaine?>/logout" > <i class="fa fa-lock-open"></i>Déconnexion</a>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="logo-area tb-cell">
                        <div class="site-logo">
                            <a href="<?=$domaine?>/compte/dashboard">
                                <img src="<?=$cdn_domaine?>/media/log01.png" class="w25" alt="Logo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>