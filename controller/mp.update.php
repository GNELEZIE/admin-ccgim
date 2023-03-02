<?php
if(isset($_SESSION['_ccgim_201']) and isset($_POST['password']) and isset($_POST['passwordC'])  and isset($_POST['passwordA']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $password = htmlentities(trim(addslashes($password)));
    $passwordA = htmlentities(trim(addslashes($passwordA)));
    $passwordC = htmlentities(trim(addslashes($passwordC)));

    $result = $utilisateur->getUtilisateurById($_SESSION['_ccgim_201']['id_utilisateur']);
    if(strlen($_POST['password']) >= 8){
        if($password == $passwordC){
            if($data = $result->fetch()){
                if(password_verify($passwordA,$data['mot_de_passe'])){
                    $options = ['cost' => 12];
                    $mdpCript = password_hash($password,PASSWORD_BCRYPT,$options);
                    $update = $utilisateur->updatePassword($mdpCript,$_SESSION['_ccgim_201']['id_utilisateur']);
                    if($update >0){
                        $success['success'] = 'Votre mot de passe a été modifié avec succès';
                    }
                }else{
                    $errors['connect'] = 'L\'ancien mot de passe n\'est pas correct';
                }
            }else{
                $errors['connect'] = 'Une erreur s\'est produite lors du traitement des données';
            }
        }else{
            $errors['connect'] = 'Le mot de passe ne correspond pas';
        }
    }else{
        $errors['connect'] = 'Le mot de passe est trop court, il doit faire 8 caractères minimum';
    }
}