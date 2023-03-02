<?php
if(!isset($_SESSION['_ccgim_201'])){
    header('location:'.$domaine.'/connexion');
    exit();

}
require_once $controller.'/logement.description.save.php';
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
include_once $layout.'/auth/header.php'?>

<div class="container-fluid py-5 bg-gray-color pd-section">
    <div class="container py-5">
        <div class="header-box">
            Publiez votre logement en 4 étapes
        </div>
        <div class="bg-white-color pd25 mes-addlgts">
            <div id="msform">
                <ul id="progressbar">
                    <li class="active" id="description"><strong>Description</strong></li>
                    <li id="localissation"><strong>Localisation</strong></li>
                    <li id="galerie"><strong>Galerie</strong></li>
                    <li id="tarifs"><strong>Tarifs</strong></li>
                </ul>
                <div class="form-card box-form  box-shadow-none" style="background: none">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="fs-title">Description</h2>
                        </div>
                    </div>
                    <form id="logtDescForm" method="post" style="text-align: left !important;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom_lgt">Nom du logement <i class="required"></i> </label>
                                    <input type="text" name="nom_lgt" id="nom_lgt" class="form-control input-style input-height" placeholder="Nom du logement"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categorie">Catégorie <i class="required"></i> </label>
                                    <select name="categorie" id="categorie" class="form-control input-style input-height"  required>
                                        <option value="">Choisir une catégorie</option>
                                        <option value="1">Chambre</option>
                                        <option value="2">Maison</option>
                                        <option value="3">Villa</option>
                                        <option value="4">Hôtel</option>
                                        <option value="5">Bungalow</option>
                                        <option value="6">Mobil-home</option>
                                        <option value="7">Chalet</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="superficie">Superficie <i class="required"></i> </label>
                                    <input type="number" name="superficie" id="superficie" class="form-control input-style input-height" placeholder="Superficie"  required style="padding-right: 33px;" step="any">
                                    <span class="icon-m2">m<sup>2</sup></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chambre">Chambres  <i class="required"></i> </label>
                                    <input type="text" name="chambre" id="chambre" class="form-control input-style input-height" placeholder="Chambres" required style="padding-right: 33px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="salles_bain">Salles De Bain  </label>
                                    <input type="text" name="salles_bain" id="salles_bain" class="form-control input-style input-height" placeholder="Salles De Bain">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lit">Lits  (1 Lit = 1 Pers) </label>
                                    <input type="text" name="lit" id="lit" class="form-control input-style input-height" placeholder="Lits  (1 Lit = 1 Pers)" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descriptions">Description de la propriété <i class="required"></i> </label>
                                    <textarea name="descriptions" id="descriptions" class="form-control" rows="5" placeholder="Description de la propriété"  required> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="supplementaire">Informations supplémentaires </label>
                                    <textarea name="supplementaire" id="supplementaire" class="form-control" rows="3" placeholder="Informations supplémentaires"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center pt-5">
                                <input type="hidden" class="form-control" name="formkeyDesc" value="<?=$token?>">
                                <button  class="next mybtn-next btn-next mt-3 border-none" id="description-btn"> <i class="loadAdd"></i> Suivant <i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once $layout.'/auth/footer.php'?>

<script>
    $(document).ready(function(){
        $('#logtDescForm').submit(function(){
            $('.loadAdd').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        });
    });
</script>
