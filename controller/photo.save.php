<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    $data_info = '';
    $data_photo = '';
    extract($_POST);

    $res = $utilisateur->getUtilisateurById($_SESSION['_ccgim_201']['id_utilisateur'])->fetch();

    $ex_photo = $res['photo'];
    if(empty($_FILES['userImg']['name'])){
        $photo = $res['photo'];
    }else{
        $extensionValide = array('jpeg', 'jpg', 'png');
        $photo_ext = explode('.',$_FILES['userImg']['name']);
        $photo_ext = strtolower(end($photo_ext));

        if (in_array($photo_ext, $extensionValide)) {
            $photo = uniqid().'.'.$photo_ext;
            $destination = $cdn.'/media/users/' . $photo;
            $tmp_name = $_FILES['userImg']['tmp_name'];

            if(move_uploaded_file($tmp_name,$destination)){
                if($ex_photo  != ''){
                    $destination = $cdn.'/media/users/' . $ex_photo;
                    if(file_exists($fichier)){
                        unlink($fichier);
                    }
                }
            }
        }
    }
    $update = $utilisateur->updateUtilisateurPhoto($photo,$_SESSION['_ccgim_201']['id_utilisateur']);
    if($update >0){
        $data = $utilisateur->getUtilisateurById($_SESSION['_ccgim_201']['id_utilisateur'])->fetch();
        $data_info = 'ok';
        $data_photo = $cdn_domaine.'/media/users/'.$data['photo'];
    }
    $output = array(
        'data_info' => $data_info,
        'data_photo' => $data_photo
    );
    echo json_encode($output);
}
