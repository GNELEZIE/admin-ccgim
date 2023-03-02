<header class="header-bottom-content style-two hidden-xs hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="site-logo">
                    <a href="<?=$domaine?>">
                        <img src="<?=$cdn_domaine?>/media/log01.png" class="myLogo" alt="Logo" />
                    </a>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <nav id="main-nav" class="site-navigation top-navigation">
                    <div class="menu-wrapper">
                        <div class="menu-content">
                            <ul class="menu-list">
                                <li>
                                    <a href="<?=$domaine?>" class="<?php if($lien == 'home' || $lien == ''){echo 'active';} ;?>">Accueil</a>
                                </li>
                                <li>
                                    <a href="<?=$domaine?>/a-propos" class="<?= page_active('a-propos') ;?>">A propos</a>
                                </li>
                                <li>
                                    <a href="<?=$domaine?>/logements" class="<?= page_active('logements') ;?>">Logements</a>
                                </li>
                                <li>
                                    <a href="#">Contacts</a>
                                </li>
                                <li>
                                    <a href="#">Faq</a>
                                </li>
                                <li>
                                    <a href="#">Propriétaire</a>
                                </li>
                                <li>
                                    <a href="<?=$domaine?>/connexion">Connexion</a>
                                </li>
                                <?php
                                if(isset($_SESSION['_ccgim_201'])){
                                    ?>
                                    <li>
                                        <a href="#" class="btn-register"> <i class="fa fa-user"></i> Mon compte</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="<?=$domaine?>/compte/profil">Profil</a>
                                            </li>
                                            <li>
                                                <a href="<?=$domaine?>/logements" class="<?= page_active('logements') ;?>">Logements</a>
                                            </li>
                                            <li>
                                                <a href="<?=$domaine?>/logout">Déconnexion</a>
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