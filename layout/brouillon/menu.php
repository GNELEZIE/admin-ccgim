<header class="header-bottom-content style-two hidden-xs hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="site-logo">
                    <a href="<?=$domaine?>/compte/dashboard">
                        <img src="<?=$cdn_domaine?>/media/log01.png" class="myLogo" alt="Logo" />
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <nav id="main-nav" class="site-navigation top-navigation">
                    <div class="menu-wrapper">
                        <div class="menu-content">
                            <ul class="menu-list">
                                <?php
                                if(isset($_SESSION['_ccgim_201'])){
                                    ?>
                                    <li>
                                        <a href="#" class="btn-register"> <i class="fa fa-user"></i> Mon compte</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="<?=$domaine?>/compte/dashboard"> <i class="fa fa-user"></i> Tableau de bord</a>
                                            </li>
                                            <li>
                                                <a href="<?=$domaine?>/compte/profil"> <i class="fa fa-user"></i> Profil</a>
                                            </li>
                                            <li>
                                                <a href="<?=$domaine?>/compte/mot-de-passe"> <i class="fa fa-lock"></i> Mot de passe</a>
                                            </li>
                                            <li>
                                                <a href="<?=$domaine?>/logout"> <i class="fa fa-lock-open"></i> Déconnexion</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php
                                }else{
                                    ?>
                                    <li>
                                        <a href="<?=$domaine?>/inscription" class="btn-register">S'inscrire</a>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>