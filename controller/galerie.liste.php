<?php
$data_list = '';
if(isset($_SESSION['_ccgim_201']) and isset($_POST['id']) and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){
    extract($_POST);
    $id = my_decrypt($id);
    $liste = $galerie->getGalerieByLgtId($id);

    while($data = $liste->fetch()) {

        if($data['photo'] != ''){
            $data_list .= '
                    <div class="col-md-3 position-relative mobile-w-50 pb-4">
                        <a href="javascript:void(0)" class="btn-del" onclick="supPhoto('.$data['id_galerie'].')"><i class="fa fa-trash"></i></a>
                        <img src="'.$cdn_domaine.'/media/lgts/'.$data['photo'].'" class="gal-cover" alt=""/>
                    </div>
            ';
        }

    }
}

$data_list .= '
        <div class="col-md-3 position-relative mobile-w-50 pb-4 gal-load">
            <img src="'.$cdn_domaine.'/media/lgts/defaut.png" class="gal-cover photo-blur loadImg"/>
            <i class="fa fa-circle-o-notch fa-spin" style="font-size: 30px;color: #F29F05;position: absolute; top:38%; left: 43%"></i>
        </div>
        <div class="col-md-3 mobile-w-50">
            <div class="upload-form" onclick="uploadImg()">
                <span class="file-msg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera mb-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg><br/>
                    Cliquez pour ajouter une photo
                </span>
            </div>
        </div>
        ';
$output = array(
    'galerieList' => $data_list
);
echo json_encode($output);