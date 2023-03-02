<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();

}
if(isset($doc[2]) and !isset($doc[3])){
$datLo = $locataire->getLocataireBySlug($doc[2]);
    if($dataLocat = $datLo->fetch()){

    }else{
        header('location:'.$domaine.'/connexion');
        exit();
    }
}
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
include_once $layout.'/auth/header.php'?>

<div class="container-fluid py-5 bg-gray-color pd-section">
    <div class="container py-5">
        <?php
        if(isset($doc[1]) and !isset($doc[2])){
         ?>
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
                            <p class="m-0 w50-m">   Mes locataires</p>
                            <div class="w50-ms text-right ">
                                <a class="btn-white" href="#" data-toggle="modal"  data-target="#addLocataireModalCenter"> <i class="fa fa-plus"></i> Ajouter un locataire</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white-color pb30 mes-lgts">

                        <div class="pc-none position-relative">
                            <h3 class="titre-mobile">Liste des locataires</h3>
                            <a href="javascript:void(0)" class="searchBtn"><i class="fa fa-search mySearch"></i></a>
                            <a href="javascript:void(0)" class="searchBtnTimes"> <i class="fa fa-times myTimes"></i></a>
                            <table id="table_locataire_mobile" class="table newtable">
                                <thead class="d-none">
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="mobile-none">
                            <table id="table_locataire" class="table newtable mobile-none">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Nom</th>
                                    <th>Téléphone</th>
                                    <th>Paiement</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        }else{

        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="header-box">
                      <div class="d-flex align-items-center">
                          <p class="m-0 w50">  Historique des paiements</p>
                          <div class="w50 text-right ">
                                  <a href="<?=$domaine?>/compte/dashboard" class="btn-white">Tableu de bord</a>
                          </div>
                      </div>
                    </div>
                    <div class="bg-white-color pd25">
                        <ul class="nav nav-tabs  myTabsUl" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#historiques" aria-controls="historiques" role="tab" data-toggle="tab">Historiques</a>
                            </li>
                            <li role="presentation">
                                <a href="#infos" aria-controls="infos" role="tab" data-toggle="tab">Informations</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="historiques">

                                    <div class="pc-none position-relative">
                                    <h3 class="titre-mobile tabHistory">Historique des paiement</h3>
                                    <table id="table_historique_mobile" class="table newtable">
                                        <thead class="d-none">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $listePay = $tresorerie->getPaiementByUser($dataLocat['id_locataire']);
                                        while($listePayData = $listePay->fetch()){
                                            ?>
                                            <tr>
                                                <td class="w100">
                                                    <div class="d-flex">
                                                        <div class="w70">
                                                            <p class="m-0"> <i class="fa fa-dashboard"></i> <?=date_time_fr($listePayData['date_tresorerie'])?></p>
                                                            <p class="m-0"> <i class="fa fa-barcode"></i> <?=$listePayData['ref_paiement']?></p>
                                                            <p class="m-0"> <i class="fa fa-wallet"></i> <?=number_format($listePayData['debit_transac'],0,',',' ')?></p>
                                                        </div>
                                                        <div class="w30 text-right">
                                                            <a href="<?=$domaine?>/facture/<?=$listePayData['ref_paiement']?>" class="btn-voir" target="_blank"> <i class="fa fa-print"></i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mobile-none">
                                <div role="tabpanel" class="tab-pane active" id="historiques">
                                    <table id="table_historique" class="table newtable">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Référence</th>
                                            <th>Montant</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $listePay = $tresorerie->getPaiementByUser($dataLocat['id_locataire']);
                                        while($listePayData = $listePay->fetch()){
                                            ?>

                                            <tr>
                                                <td><?=date_time_fr($listePayData['date_tresorerie'])?></td>
                                                <td><?=$listePayData['ref_paiement']?></td>
                                                <td><?=number_format($listePayData['debit_transac'],0,',',' ')?></td>
                                                <td>
                                                    <a href="<?=$domaine?>/facture/<?=$listePayData['ref_paiement']?>" class="btn-voir" target="_blank"> <i class="fa fa-print"></i> Imprimer</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="infos">
                                <div class="row pd25 pInfo">
                                    <div class="col-md-6">
                                        <p class="m-0">Nom & Prénom : <b><?=html_entity_decode(stripslashes($dataLocat["nom"]))?></b></p>
                                        <p class="m-0">Prénom  : <b><?=html_entity_decode(stripslashes($dataLocat["prenom"]))?></b></p>
                                        <p class="m-0">Ville  : <b><?=html_entity_decode(stripslashes($dataLocat["ville"]))?></b></p>
                                        <p class="m-0">Téléphone  : <b><?=$dataLocat["phone"]?></b></p>
                                    </div>
                                    <!--<div class="col-md-6">
                                        <p class="m-0">Boîte postale : <b>225</b></p>
                                        <p class="m-0">Banque et N° de compte : <b>050255</b></p>
                                        <p class="m-0">N° compte contribuable  : <b>00555</b></p>
                                        <p class="m-0">MECANO  : <b>225 00 00 00 00 00</b></p>
                                        <p class="m-0">Service ou affectation   : <b>Etudiants</b></p>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>



<!--Modal-->
<div class="modal fade" id="payerModalCenter" tabindex="-1" role="dialog" aria-labelledby="payerModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Paiement du loyer de <span class="nom" id="nom"></span></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formPayer">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="libelle">Libellé</label>
                        <input type="text" class="form-control input-style input-height" name="libelle" id="libelle" placeholder="Libellé">
                    </div>
                    <div class="form-group">
                        <label for="montant">Montant <i class="required"></i></label>
                        <input type="text" class="form-control input-style input-height" name="montant" id="montant" placeholder="Montant" required/>
                        <input type="hidden" name="userId" id="userId"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                    <a href="javascript:void(0);" class="btn btn-danger btn-closed" data-dismiss="modal">Annuler</a>
                    <button  class="btn btn-payer-maintenant"> <i class="loadPay"></i> Payer maintenant</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="addLocataireModalCenter" tabindex="-1" role="dialog" aria-labelledby="addLocataireModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Ajouter un locataire</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formAddLocataire">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 pb12">
                            <div class="form-group">
                                <label for="lgt" >Logement</label>
                                <select class="wide form-control input-style input-height40" name="lgt" id="lgt">
                                    <option  selected>Choisir un logement</option>
                                    <?php
                                    $list =  $logement->getAllLgts();
                                    while($datLgts = $list->fetch()){
                                        ?>
                                        <option value="<?=$datLgts['id_logement']?>"><?=html_entity_decode(stripslashes($datLgts['nom_lgt']))?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noms">Nom <i class="required"></i></label>
                                <input class="form-control input-style input-height40" name="noms" id="noms" type="text"  placeholder="Nom" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prenom">Prénom <i class="required"></i></label>
                                <input class="form-control input-style input-height40" name="prenom" id="prenom" type="text"  placeholder="Prénom">
                            </div>
                        </div>
                    </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="" for="phone">Téléphone <i class="required"></i></label>
                          <input type="tel" class="form-control input-style input-height40" name="phone" id="phone"  style="padding: 7px 15px 7px 45px !important;" >
                          <input type="hidden"  name="isoPhone" id="isoPhone">
                          <input type="hidden"  name="dialPhone" id="dialPhone">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="bail" >N° Bail</label>
                          <select class="wide form-control input-style input-height40" name="bail" id="bail">
                              <option  selected>Choisir une N° Bail</option>
                              <option value="Complement bail">Complement bail</option>
                              <option value="Bouake">Policier</option>
                          </select>
                      </div>
                  </div>
                  <!--<div class="col-md-12">
                      <div class="form-group">
                          <label for="date">Date <i class="required"></i></label>
                          <input class="form-control input-style input-height40" name="date" id="date" type="date"  placeholder="Date">
                      </div>
                  </div>-->

              </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="formkey" value="<?=$token?>">
                    <a href="javascript:void(0);" class="btn btn-red-transparent btn-closed" data-dismiss="modal">Annuler</a>
                    <button  class="btn btn-add-locataire"> <i class="loaderAddBtn"></i> <i class="fa fa-plus"></i> Ajouter</button>
                </div>
            </form>
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
           $('#table_locataire_mobile_filter').css('display','block');
           $('#table_historique_mobile_filter').css('display','block');
           $('.table-seach').trigger('click');
           searchBtn.css('display','none');
           titreMobile.css('opacity','0');
           searchBtnTimes.css('display','block');

       });
       searchBtnTimes.click(function(){
           $('#table_locataire_mobile_filter').css('display','none');
           $('#table_historique_mobile_filter').css('display','none');
           mySearch.css('display','block');
           titreMobile.css('opacity','1');
           searchBtn.css('display','block');
           searchBtnTimes.css('display','none');

       });


</script>
<script>
    var table_locataire;
    var table_historique;
    var table_locataire_mobile;
    var table_historique_mobile;
    $(document).ready(function() {

        $('#formAddLocataire').submit(function(e){
            e.preventDefault();
            $(".loaderAddBtn").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
            var value = document.getElementById('formAddLocataire');
            var form = new FormData(value);

            $.ajax({
                method: 'post',
                url: '<?=$domaine?>/controle/locataire.save',
                data: form,
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                    if(data == 'ok'){
                        $(".loaderAddBtn").html('');
                        $('#bail').val('');
                        $('#phone').val('');
                        $('#noms').val('');
                        $('#prenom').val('');
                        table_locataire.ajax.reload(null,false);
                        swal("Le locataire a été ajouté avec succès!","", "success");
                    }else{
                        swal("Action Impossible !", "Une erreur s\'est produite.", "error");
                    }
                },
                error: function (error, ajaxOptions, thrownError) {
                    alert(error.responseText);
                }
            });
        });
        $('#formPayer').submit(function(e){
            e.preventDefault();
            $(".loadPay").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
            var value = document.getElementById('formPayer');
            var form = new FormData(value);

            $.ajax({
                method: 'post',
                url: '<?=$domaine?>/controle/payer.save',
                data: form,
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                    if(data == 'ok'){
                        $(".loadPay").html('');
                        $('#libelle').val('');
                        $('#montant').val('');
                        table_locataire.ajax.reload(null,false);
                        swal("Le paiement a été ajouté avec succès !","", "success");
                    }else{
                        swal("Action Impossible !", "Une erreur s\'est produite.", "error");
                    }
                },
                error: function (error, ajaxOptions, thrownError) {
                    alert(error.responseText);
                }
            });
        });







        $('#bail').niceSelect();
        $('#lgt').niceSelect();

        $("#phone").keyup(function (event) {
            if (/\D/g.test(this.value)) {
                //Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });

        var inputPhone = document.querySelector("#phone");
        window.intlTelInput(inputPhone, {
            initialCountry: 'ci',
            utilsScript: "<?=$cdn_domaine?>/assets/libs/intltelinput/js/utils.js"
        });
        var iti = window.intlTelInputGlobals.getInstance(inputPhone);
        var countryData = iti.getSelectedCountryData();
        $('#isoPhone').val(countryData["iso2"]);
        $('#dialPhone').val(countryData["dialCode"]);
        inputPhone.addEventListener("countrychange", function() {
            var iti = window.intlTelInputGlobals.getInstance(inputPhone);
            var countryData = iti.getSelectedCountryData();
            $('#isoPhone').val(countryData["iso2"]);
            $('#dialPhone').val(countryData["dialCode"]);
        });


        $('#payerModalCenter').on('show.bs.modal', function (e) {
            var userId = $(e.relatedTarget).data('id');
            var userName = $(e.relatedTarget).data('name');
            $('#userId').val(userId);
            $('#nom').html(userName);

        });




        table_locataire_mobile = $('#table_locataire_mobile').DataTable({
            "ajax": {
                "type": "post",
                "url": "<?=$domaine?>/controle/locataire-mobile.liste",
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



        table_locataire = $('#table_locataire').DataTable({
            "ajax": {
                "type": "post",
                "url": "<?=$domaine?>/controle/locataire.liste",
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

        table_historique_mobile = $('#table_historique_mobile').DataTable({
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

        table_historique = $('#table_historique').DataTable({
            "ordering": false,
            "pageLength": 25,
            "oLanguage": {
                "sProcessing": "Traitement en cours ...",
                "sLengthMenu": '<h3>Historique des paiement</h3>',
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


    })
</script>