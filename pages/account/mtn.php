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
                    MTN money
                </div>
                <div class="bg-white-color p30">
                    <div class="row">
                        <div class="col-md-4 pt50 mpt50">
                            <a class="om" href="javacript:void(0)" data-toggle="modal"  data-target="#orangeModalCenter"> <i class="fa fa-plus"></i> Ajouter une opération</a>
                        </div>
                        <div class="col-md-4">
                            <div class="ts-box">
                                <div class="icon">
                                    <img src="<?=$cdn_domaine?>/media/mm.png" class="img-money" alt=""/>
                                </div>
                                <div class="nbLgt pb10">
                                    <h2>Caisse UV</h2>
                                    <h2 class="pb7 mt12"> <span class="sld"> <span class="omdispo_solde"></span> </span> </h2>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="">
                        <div class="pt-2" style="padding-top: 20px">
                            <table id="table_mtn" class="table newtable">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>Contact</th>
                                    <th>Solde AV</th>
                                    <th>Dépôt</th>
                                    <th>Retrait</th>
                                    <th style="width: 100px">Solde AP</th>
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
            <form method="post" id="formMtn">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type_transac" class="pd7">Type d'opération</label>
                                    <select class="wide form-control no-nice-select-search-box input-style input-height select-transac" name="type_transac" id="type_transac" required>
                                        <option value="" selected>Type d'opération</option>
                                        <option value="2">Dépôt</option>
                                        <option value="1">Retrait</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client" class="pd7">Client</label>
                                    <input type="text" class="form-control input-style input-height" name="client" id="client" placeholder="Client" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact" class="pd7">Contact</label>
                                    <input type="text" class="form-control input-style input-height" name="contact" id="contact" placeholder="Contact" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="montant" >Montant <i class="required"></i></label>
                                    <input type="text" class="form-control input-style input-height" name="montant" id="montant" placeholder="Montant" required/>
                                </div>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                    <a href="javascript:void(0);" class="btn btn-danger btn-closed" data-dismiss="modal">Annuler</a>
                    <button  class="btn btn-payer-maintenant"> <i class="loaderBtnMTNPay"></i> Enregistrer </button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include_once $layout.'/auth/footer.php'?>
<script>
    var table_mtn;
    $(document).ready(function() {
        $("#contact,#montant").keyup(function (event) {
            if (/\D/g.test(this.value)) {
                //Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
        chargeSoldeDispoOrange();
        function chargeSoldeDispoOrange(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 2,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/dispo.orange',
                dataType: 'json',
                success: function(data){
                    $('.omdispo_solde').html(data.omdispo_solde);
                }
            });
        }

        chargeCreditOrange();
        function chargeCreditOrange(){
            $.ajax({
                type: 'post',
                data: {
                    rsid: 2,
                    token: "<?=$token?>"
                },
                url: '<?=$domaine?>/controle/credit.orange',
                dataType: 'json',
                success: function(data){
                    $('.om_credit').html(data.om_credit);
                }
            });
        }



        $('#type_transac').niceSelect();

        table_mtn = $('#table_mtn').DataTable({
            "ajax": {
                "type": "post",
                "url": "<?=$domaine?>/controle/mtn.liste",
                "data": {
                    token: "<?=$token?>"
                }
            },
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ],
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

        $('#formMtn').submit(function(e){
            e.preventDefault();
            $(".loaderBtnMTNPay").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
            var value = document.getElementById('formMtn');
            var form = new FormData(value);
            $.ajax({
                method: 'post',
                url: '<?=$domaine?>/controle/mtn.save',
                data: form,
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                    if(data == 'ok'){
//                        alert(data);
                        $('#type_transac').val('');
                        $('#client').val('');
                        $('#contact').val('');
                        $('#montant').val('');
                        chargeCreditOrange();
                        chargeSoldeDispoOrange();
                        $(".loaderBtnMTNPay").html('');
                        table_mtn.ajax.reload(null,false);
                        swal("Opération effectuée avec succès !","", "success");
                    }else if(data == 'solde'){
                        $(".loaderBtnMTNPay").html('');
                        swal("Action Impossible !", "Votre solde est insuffisant !", "error");
                    }
                    else{
                        swal("Action Impossible !", "Une erreur s\'est produite.", "error");
                        $('#libelle').val('');
                        $('#montant').val('');
                        $(".loaderBtnMTNPay").html('');
                    }
                },
                error: function (error, ajaxOptions, thrownError) {
                    alert(error.responseText);
                }
            });

        });
        
    });
</script>