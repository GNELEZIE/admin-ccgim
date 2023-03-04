<header class="mobile-header-area bg-gray-color hidden-md hidden-lg">
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
                                        if(isset($_SESSION['_ccgim_201'])){
                                            $n_b = $logement->getNblogements()->fetch();
                                            $n_loc = $location->getNbLocataire()->fetch();
                                            ?>
                                            <div class="link">
                                                <a href="<?=$domaine?>/compte/dashboard" class="<?= dash_active('dashboard');?>">Tableau de bord</a>
                                            </div>
                                            <div class="link">
                                                <a href="<?=$domaine?>/logement/locataires" class="<?= dash_active('locations');?>"> <span class="w80"><i class="fa fa-users"></i> Mes locations</span> <span class="w20"><i class="nb-box" style="font-style: normal;"><?=$n_loc['nb']?></i></span></a>
                                            </div>
                                            <div class="link">
                                                <a href="<?=$domaine?>/logement/tresorerie" class="<?= dash_active('tresorerie');?>"><i class="fa fa-wallet"></i> Trésorerie</a>
                                            </div>
                                            <div class="link">
                                                <a href="<?=$domaine?>/logout" > <i class="fa fa-lock-open"></i>Déconnexion</a>
                                            </div>
                                        <?php
                                        }
                                        ?>
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