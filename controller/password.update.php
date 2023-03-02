<?php
if(isset($descryToken) and isset($_POST['password']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $password = htmlentities(trim(addslashes($password)));
    $confpassword = htmlentities(trim(addslashes($confpassword)));

    $result = $utilisateur->getUtilisateurByEmail($descryToken);

    if($data = $result->fetch()){
            if($password == $confpassword){
                $options = ['cost' => 12];
                $mdpCript = password_hash($password,PASSWORD_BCRYPT,$options);
                $update = $utilisateur->updatePassword($mdpCript,$data['id_utilisateur']);
                if($update > 0){
                    $success['message'] = 'Votre mot de passe a été modifié avec succès !<br> <a href="'.$domaine.'/connexion" class="color-blue">Cliquer ici pour vous connecter</a>';
                    //unset($_SESSION['_updPwd']);
                }
            }else{
                $errors['connect'] = 'Erreur de confirmation du mot de passe';
            }

    }else{
        $errors['connect'] = 'Une erreur s\'est produite lors du traitement des données';
    }
}