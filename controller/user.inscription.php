<?php
if(isset($_POST['email']) and isset($_POST['password']) and isset($_POST['typ_compte']) and  isset($_POST['cpassword']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $email = htmlentities(trim(addslashes(strip_tags($email))));
    $typ_compte = htmlentities(trim(addslashes(strip_tags($typ_compte))));
    $password = htmlentities(trim(addslashes($password)));
    $cpassword = htmlentities(trim(addslashes($cpassword)));

    $verifMail = $utilisateur->getUtilisateurByEmail($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['register'] = 'Votre adresse email n\'est pas correct';
    } elseif ($verifMail->rowCount() > 0) {
        $errors['register'] = 'Votre adresse email existe déjà';
    } elseif (strlen($_POST['password']) < 8) {
        $errors['register'] = 'Le mot de passe est trop court, il doit faire 8 caractères minimum';
    } elseif ($password != $cpassword) {
        $errors['register'] = 'Erreur lors de la confirmation du mot de passe';
    } else {
        $options = ['cost' => 12];
        $mdpCript = password_hash($password, PASSWORD_BCRYPT, $options);
        $idUser = $utilisateur->addUtilisateur($dateGmt, $email, $mdpCript,$typ_compte);
        if ($idUser > 0) {
           /* $mailToken = str_replace('+', '-', my_encrypt($email));
            $subject = trim('Vérification de votre email.');
            include_once $email.'/valid-email.php';
            sendMailNoReply($email, $subject, $message);*/
            $result = $utilisateur->getUtilisateurByEmail($email);
            if ($data = $result->fetch()) {
                $_SESSION['_ccgim_201'] = $data;
                header('location:' .$domaine.'/compte/profil');
            }
        } else {
            $errors['register'] = 'Une erreur s\'est produite, veuillez réessayer.';
        }
    }
}