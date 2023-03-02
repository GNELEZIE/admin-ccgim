<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();

}
if(!isset($_SESSION['finit'])){
    header('location:'.$domaine.'/error');
    exit();

}


include_once $layout.'/auth/header2.php'?>

<div class="container-fluid py-5 bg-gray-color pd-section">
    <div class="container py-5">
       <div class="row">
           <div class="col-md-4 offset-4">
               <div class="bg-white-color pd25 mes-addlgts text-center">
                   <img src="<?=$cdn_domaine?>/media/check.svg" class="icon-check" alt=""/>
                   <h4 class="p-3">Votre logement à été enregistré avec succes</h4>
                   <p>Vous recevrez un email lorsque les informations de votre logement seront validés et publués.</p>

                   <a href="<?=$domaine?>/logement/logements" class="user-inscription text-white" style="border-radius: 5px;padding: 10px 20px !important;">Voir mes logements</a>
               </div>
           </div>
       </div>
    </div>
</div>






<?php include_once $layout.'/auth/footer.php'?>
