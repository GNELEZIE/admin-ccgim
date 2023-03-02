<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['id']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    $id = my_decrypt($id);

    if(!empty($_FILES['photos']['name'])){
        $extensionValide = array('jpeg', 'jpg', 'png');
        $photo_ext = explode('.',$_FILES['photos']['name']);
        $photo_ext = strtolower(end($photo_ext));
        if (in_array($photo_ext, $extensionValide)){
            $result = $logement->getLogementById($id);
            if($dat = $result->fetch()){
                $photo = uniqid().'.'.$photo_ext;
                $destination = $cdn.'/media/lgts/'.$photo;
                $tmp_name = $_FILES['photos']['tmp_name'];

                if(move_uploaded_file($tmp_name,$destination)){
                    $save = $galerie->addGalerie($id,$dateGmt,$photo);
                    if($save > 0){
                        echo 'ok';
                    }
                }
            }

        }
    }
}