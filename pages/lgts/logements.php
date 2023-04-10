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

$nblog = $logement->getNblogementsByUsers();
if($nbre = $nblog->fetch()){
    $pages = ceil($nbre['nb']/12);
}else{
    $pages = 1;
}
$pagination_list = '';
$myPage = '/compte/logements';
$lgst = $logement->getLogementByUsers($debut, $fin);


$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;

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
                        <div class="mobile">
                            <table id="table_logement" class="table newtable">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th class="w-130">Désignation</th>
                                    <th>Ville</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="logt"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php include_once $layout.'/auth/footer.php'?>
<script>
    var table_logement;
    $(document).ready(function() {
        table_logement = $('#table_logement').DataTable({
            "ajax": {
                "type": "post",
                "url": "<?=$domaine?>/controle/logement.liste",
                "data": {
                    token: "<?=$token?>"
                }
            },
            "ordering": false,
            "pageLength": 25,
            "oLanguage": {
                "sProcessing": "Traitement en cours ...",
                "sLengthMenu": '<h3>Les logements</h3>',
                "sZeroRecords": "Aucun résultat trouvé",
                "sEmptyTable": "Aucune donnée disponible",
                "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
                "sInfoEmpty": "Aucune ligne affichée",
                "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
                "sSearch": '<i class="fa fa-search table-seach"></i>',
                "sSearchPlaceholder": "Recherche",
                "sLoadingRecords": '<i class="fa fa-circle-o-notch fa-spin"></i> Chargement...',
                "oPaginate":{
                    "sPrevious": '<i class="fa fa-angle-double-left"></i>',
                    "sNext": '<i class="fa fa-angle-double-right"></i>'
                },
                "oAria": {
                    "sSortAscending": ": Trier par ordre croissant",
                    "sSortDescending": ": Trier par ordre décroissant"
                }

            }
        });









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