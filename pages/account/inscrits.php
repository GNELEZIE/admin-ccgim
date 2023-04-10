<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion?return='.$return);
    exit();

}

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
                            <p class="m-0 w50-m">Inscription</p>
                        </div>
                    </div>
                    <div class="bg-white-color pb30 mes-lgts">
                            <table id="table_inscrits" class="table newtable">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>statut</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                    </div>
                </div>
            </div>


    </div>
</div>





<?php include_once $layout.'/auth/footer.php'?>
<script>
    var mySearch = $('.mySearch');
    var searchBtn = $('.searchBtn');
    var myTimes = $('.myTimes');
    var searchBtnTimes = $('.searchBtnTimes');
    var titreMobile = $('.titre-mobile');
    searchBtn.click(function(){
        $('#table_inscrits_mobile_filter').css('display','block');
        $('#table_historique_mobile_filter').css('display','block');
        $('.table-seach').trigger('click');
        searchBtn.css('display','none');
        titreMobile.css('opacity','0');
        searchBtnTimes.css('display','block');

    });
    searchBtnTimes.click(function(){
        $('#table_inscrits_mobile_filter').css('display','none');
        $('#table_historique_mobile_filter').css('display','none');
        mySearch.css('display','block');
        titreMobile.css('opacity','1');
        searchBtn.css('display','block');
        searchBtnTimes.css('display','none');

    });


</script>
<script>
var table_inscrits;

$(document).ready(function() {


    $('#payerModalCenter').on('show.bs.modal', function (e) {
        var userId = $(e.relatedTarget).data('id');
        var lgt_id = $(e.relatedTarget).data('logt');
        var userName = $(e.relatedTarget).data('name');
        var montant = $(e.relatedTarget).data('montant');
        $('#nom').html(userName);
        $('#userId').val(userId);
        $('#lgt_id').val(lgt_id);
        $('#montant').val(montant);

    });




    table_inscrits = $('#table_inscrits').DataTable({
        "ajax": {
            "type": "post",
            "url": "<?=$domaine?>/controle/inscrits.liste",
            "data": {
                token: "<?=$token?>"
            }
        },
        "ordering": false,
        "pageLength": 25,
        "oLanguage": {
            "sProcessing": "Traitement en cours ...",
            "sLengthMenu": '<h3>Liste des locataires</h3>',
            "sZeroRecords": "Aucun résultat trouvé",
            "sEmptyTable": "Aucune donnée disponible",
            "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
            "sInfoEmpty": "Aucune ligne affichée",
            "sInfoFiltered": "(Filtrer un maximum de_MAX_) ",
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
})
</script>