<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
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
                        Trésorerie
                    </div>
                    <div class="bg-white-color pb30 mes-lgts">
                        <div class="row">
                            <div class="col-md-4 pt50 ">
                                <a class="btn-add-payer" href="#" data-toggle="modal"  data-target="#payerModalCenter"> <i class="fa fa-plus"></i> Ajouter un paiment</a>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="ts-box-green mt30">
                                    <div class="icon">
                                        <i class="fa fa-wallet myicon-trend my-icon-dashboard-green"></i>
                                    </div>
                                    <div class="nbLgt">
                                        <h2 class="my_solde"></h2>
                                        <p>Solde total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pc-none position-relative">
                            <h3 class="titre-mobile">Liste des paiements</h3>
                            <a href="javascript:void(0)" class="searchBtn"><i class="fa fa-search mySearch"></i></a>
                            <a href="javascript:void(0)" class="searchBtnTimes"> <i class="fa fa-times myTimes"></i></a>

                            <table id="table_tresorerie_mobile" class="table newtable">
                                <thead class="d-none">
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="mobile-none">
                            <table id="table_tresorerie" class="table newtable">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Téléphone</th>
                                    <th>Nom</th>
                                    <th>Libellé</th>
                                    <th>Montant</th>
                                    <th>Action</th>
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

<!--Modal-->
<div class="modal fade" id="payerModalCenter" tabindex="-1" role="dialog" aria-labelledby="payerModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Espace de paiment <span class="nom" id="nom"></span></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formPayer">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type_transac">Type d'opération <i class="required"></i></label>
                        <select class="wide form-control no-nice-select-search-box input-style input-height select-transac" name="type_transac" id="type_transac" required>
                            <option value="" selected>Type d'opération</option>
                            <option value="1">Paiement de loyer</option>
                            <option value="2">Sortie de caisse</option>
                        </select>
                    </div>
                    <div class="form-group locataire-input remove-none">
                        <label for="locataire" class="pt13">Locataire <i class="required"></i></label>
                        <select class="wide form-control input-style input-height select-locataire" name="locataire" id="locataire" required>
                            <option value="" selected>Choisir locataire</option>
                            <?php
                            $listLoc = $locataire->getAllLocataire();
                            while($dataLocataire = $listLoc->fetch()){
                            ?>
                            <option value="<?=$dataLocataire['id_locataire']?>"><?=html_entity_decode(stripslashes($dataLocataire['nom'])).' '.html_entity_decode(stripslashes($dataLocataire['prenom'])).'('.$dataLocataire['phone'].')'?></option>
                            <?php
                            }
                            ?>
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
                    <div class="form-group">
                        <label for="dts" >Date de paiement <i class="required"></i></label>
                        <input type="date" class="form-control input-style input-height" name="dts" id="dts" placeholder="Date" required/>
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

    var searchBtn = $('.searchBtn');
    var myTimes = $('.myTimes');
    var searchBtnTimes = $('.searchBtnTimes');
    var titreMobile = $('.titre-mobile');
    searchBtn.click(function(){
        $('#table_tresorerie_mobile_filter').css('display','block');
        $('.table-seach').trigger('click');
        searchBtn.css('display','none');
        titreMobile.css('opacity','0');
        searchBtnTimes.css('display','block');

    });
    searchBtnTimes.click(function(){
        $('#table_tresorerie_mobile_filter').css('display','none');
        titreMobile.css('opacity','1');
        searchBtn.css('display','block');
        searchBtnTimes.css('display','none');

    });

</script>
<script>
    var table_tresorerie;
    var table_tresorerie_mobile;

    $("select.select-transac").change(function() {
        var locataire = $(this).children("option:selected").val();
        if (locataire == '1') {
            $('.remove-none').removeClass('locataire-input','locataire-input');
            $('#locataire').attr('required','required');
        }else if(locataire == '2' ){
            $('.remove-none').addClass('locataire-input','locataire-input');
            $('#locataire').removeAttr('required','required');
        }else{
            $('.remove-none').addClass('locataire-input','locataire-input');
            $('#locataire').removeAttr('required','required');
        }
    });

    $(document).ready(function() {
        $('#type_transac').niceSelect();
        $('#locataire').niceSelect();
        $('#payerModalCenter').on('show.bs.modal', function (e) {
            var userId = $(e.relatedTarget).data('id');
            var userName = $(e.relatedTarget).data('name');
            $('#userId').val(userId);
            $('#nom').html(userName);
        });

        table_tresorerie_mobile = $('#table_tresorerie_mobile').DataTable({
            "ajax": {
                "type": "post",
                "url": "<?=$domaine?>/controle/paiement-mobile.liste",
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

        table_tresorerie = $('#table_tresorerie').DataTable({
            "ajax": {
                "type": "post",
                "url": "<?=$domaine?>/controle/paiement.liste",
                "data": {
                    token: "<?=$token?>"
                }
            },
            "ordering": false,
            "pageLength": 25,
            "oLanguage": {
                "sProcessing": "Traitement en cours ...",
                "sLengthMenu": '<h3>Liste des paiements</h3>',
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

        $("#montant").keyup(function (event) {
            if (/\D/g.test(this.value)) {
                //Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });

        chargeSolde();
        function chargeSolde(){
            $.ajax({
                type: 'post',
                data: {
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/solde',
                dataType: 'json',
                success: function(data){
                    $('.my_solde').html(data.my_solde);
                }
            });
        }
        $('#formPayer').submit(function(e){
            e.preventDefault();
            $value = $(this);
            $(".loaderBtnPay").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
            $.post('<?=$domaine?>/controle/tresorerie.save', $value.serialize(), function (data) {
//                alert(data);
                if(data == 'ok'){

                    $('#locataire').val('');
                    $('#libelle').val('');
                    $('#montant').val('');
                    chargeSolde();
                    table_tresorerie.ajax.reload(null,false);
                    $(".loaderBtnPay").html('');
                    swal("Le paiement a été ajouté avec succès !","", "success");
                }else if(data == 'solde'){
                    $(".loaderBtnPay").html('');
                    swal("Action Impossible !", "Votre solde est insuffisant !", "error");
                }
                else{
                    swal("Action Impossible !", "Une erreur s\'est produite.", "error");
                }
            });
        });





    })
</script>