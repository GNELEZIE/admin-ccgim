<?php
$n_b = $logement->getNblogements()->fetch();
$n_loc = $location->getNbLocataire()->fetch();
?>

    <div class="link">
        <a href="<?=$domaine?>/compte/dashboard" class="<?= dash_active('dashboard');?>"> <i class="fa fa-dashboard font-13"></i> Tableau de bord</a>
    </div>
    <div class="link">
        <a href="<?=$domaine?>/logement/locataires" class="<?= dash_active('locataires');?>"> <span class="w80"><i class="fa fa-users font-13"></i> Mes locataires</span> <span class="w20"><i class="nb-box" style="font-style: normal;"><?=$n_loc['nb']?></i></span></a>
    </div>
    <div class="link">
        <a href="<?=$domaine?>/logement/tresorerie" class="<?= dash_active('tresorerie');?>"><i class="fa fa-wallet font-13"></i> Trésorerie</a>
    </div>
    <div class="link">
        <a href="<?=$domaine?>/logement/logements"  class="<?= dash_active('logements');?>"> <span class="w80"><i class="fa fa-home-alt font-13"></i> Mes logements</span> <span class="w20"><i class="nb-box" style="font-style: normal;"><?=$n_b['nb']?></i></span></a>
    </div>

