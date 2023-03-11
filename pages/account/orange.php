<?php



$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
include_once $layout.'/auth/header.php'
?>


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
            <div class="col-md-9 pd-mobile">
                <div class="header-box">
                    Orange money
                </div>
                <div class="bg-white-color p30">
                    <div class="row">
                        <div class="col-md-4 pt50 ">
                            <a class="om" href="#" data-toggle="modal"  data-target="#orangeModalCenter"> <i class="fa fa-plus"></i> Ajouter une opération</a>
                        </div>
                        <div class="col-md-4">
                            <div class="ts-box">
                                <div class="icon">
                                    <img src="<?=$cdn_domaine?>/media/om.png" class="img-money" alt=""/>
                                </div>
                                <div class="nbLgt">
                                    <h2>Solde du mois</h2>
                                    <h2 class="pb7"> <span class="sld">15 000 <small>FCFA</small></span> </h2>
                                    <p class="line-height1"><small><i><span class="sld-red">50 000 <small>FCFA</small></span> depensé</i></small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ts-box">
                                <div class="icon">
                                    <img src="<?=$cdn_domaine?>/media/om.png" class="img-money" alt=""/>
                                </div>
                                <div class="nbLgt">
                                    <h2>Solde total</h2>
                                    <h2 class="pb7"> <span class="sld">15 000 <small>FCFA</small></span> </h2>
                                    <p class="line-height1"><small><i><span class="sld-red">50 000 <small>FCFA</small></span> depensé</i></small></p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="">
                        <div class="pt-2" style="padding-top: 20px">
                            <table id="table_orange" class="table newtable">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Libellé</th>
                                    <th style="width: 50px">Montant</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="orangeModalCenter" tabindex="-1" role="dialog" aria-labelledby="orangeModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Ajouter une opération <span class="nom" id="nom"></span></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formSortieCaisse">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type_transac" class="pd15">Type d'opération</label>
                        <select class="wide form-control no-nice-select-search-box input-style input-height select-transac" name="type_transac" id="type_transac" required>
                            <option value="" selected>Type d'opération</option>
                            <option value="1">Entrée de caisse</option>
                            <option value="2">Sortie de caisse</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="libelle" class="pd15">Libellé</label>
                        <input type="text" class="form-control input-style input-height" name="libelle" id="libelle" placeholder="Libellé" required>
                    </div>
                    <div class="form-group">
                        <label for="montant" >Montant <i class="required"></i></label>
                        <input type="text" class="form-control input-style input-height" name="montant" id="montant" placeholder="Montant" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                    <a href="javascript:void(0);" class="btn btn-danger btn-closed" data-dismiss="modal">Annuler</a>
                    <button  class="btn btn-payer-maintenant"> <i class="loaderBtnPay"></i> Enregistrer </button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include_once $layout.'/auth/footer.php'?>
<script>
    var table_orange;
    $(document).ready(function() {
        $('#type_transac').niceSelect();
        table_orange = $('#table_orange').DataTable({
            "ajax": {
                "type": "post",
                "url": "<?=$domaine?>/controle/money.liste",
                "data": {
                    token: "<?=$token?>"
                }
            },
            "ordering": false,
            "pageLength": 25,
            "oLanguage": {
                "sProcessing": "Traitement en cours ...",
                "sLengthMenu": '',
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
    });
</script>