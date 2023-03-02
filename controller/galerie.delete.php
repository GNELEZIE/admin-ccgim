<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['id'])  and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){
    extract($_POST);

    $id = htmlentities(trim(addslashes(strip_tags($id))));
        $data = $galerie->getGalerieById($id)->fetch();
        $delete = $galerie->deleteGalerie($id);
        if($delete > 0){
            if($data['photo'] != ''){
                $fichier = $cdn.'/media/lgts/'.$data['photo'];
                if(file_exists($fichier)){
                    unlink($fichier);
                }
            }
            echo 'ok';

    }
}