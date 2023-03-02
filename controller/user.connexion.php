<?php
if( isset($_SESSION['myformkey'])  and isset($_POST['email']) AND isset($_POST['password']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    $email = htmlentities(trim(addslashes(strip_tags($email))));
    $password = htmlentities(trim(addslashes($password)));
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = $utilisateur->getUtilisateurByEmail($email);
        if ($data = $result->fetch()) {
            $errors['connec'] = '';
            if (password_verify($password, $data['mot_de_passe'])) {
                if ($data['bloquer'] == 0) {
                    $userEmail = my_encrypt($data['email']);
                    $_SESSION['_ccgim_201'] = $data;
                    if(isset($_POST['remember'])) {
                        setcookie('_ccgim_cookie', $userEmail, time() + 60 * 60 * 24 * 30, '/', $cookies_domaine, false, false);
                    }
                    if(isset($_GET['return'])){
                        header('location:' . str_replace('-', '+', my_decrypt($_GET['return'])));
                    }else{
                        header('location:' . $domaine . '/compte/dashboard');
                    }
                    /* if ($data['email_valid'] == 0) {
                         $mailToken = str_replace('+', '-', my_encrypt($email));
                         $subject = trim('Vérification de votre email.');
                         include_once $email . '/valid-email.php';
                         sendMailNoReply($email, $subject, $message);
                     }*/

                } else {
                    $errors['connec'] = 'Votre compte a été bloqué';
                }
            } else {
                $errors['connec'] = 'Email ou mot de passe incorrecte';
            }
        } else {
            $errors['connec'] = 'Email ou mot de passe incorrecte';
        }
    } else {
        $errors['connec'] = 'Votre adresse email n\'est pas correcte.';
    }
}