<?php
$n_b = $logement->getNblogements()->fetch();
$n_loc = $location->getNbLocataire()->fetch();
?>

<div class="link">
    <a href="<?=$domaine?>/compte/dashboard" class="<?= dash_active('dashboard');?>"> <span class="w80"> <i class="fa fa-dashboard font-13"></i> Tableau de bord</span></a>
</div>
<div class="link">
    <a href="<?=$domaine?>/logement/logements"  class="<?= dash_active('logements');?>"> <span class="w80"><i class="fa fa-home-alt font-13"></i> Mes logements</span> <span class="w20"><i class="nb-box" style="font-style: normal;"><?=$n_b['nb']?></i></span></a>
</div>
<div class="link">
    <a href="<?=$domaine?>/logement/locataires" class="<?= dash_active('locataires');?>"> <span class="w80"><i class="fa fa-users font-13"></i> Mes locataires</span> <span class="w20"><i class="nb-box" style="font-style: normal;"><?=$n_loc['nb']?></i></span></a>
</div>
<div class="link">
    <a href="<?=$domaine?>/logement/tresorerie" class="<?= dash_active('tresorerie');?>"> <span class="w80"> <i class="fa fa-wallet font-13"></i> Trésorerie </span></a>
</div>
<div class="link">
    <a href="<?=$domaine?>/compte/inscrits" class="<?= dash_active('inscrits');?>"> <span class="w80"> <i class="fa fa-user font-13"></i> Inscrits </span></a>
</div>
<div class="link">
    <a href="<?=$domaine?>/compte/money"  class="<?= dash_active('money');?> <?= dash_active('orange');?> <?= dash_active('mtn');?> <?= dash_active('moov');?> <?= dash_active('wave');?>"> <span class="w80"><i class="fa fa-wallet font-13"></i> Money </span> </a>
</div>


