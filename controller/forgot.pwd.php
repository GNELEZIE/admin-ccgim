<?php
if(isset($_POST['email']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    $email = htmlentities(trim(addslashes(strip_tags($email))));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['register'] = 'Votre adresse email n\'est pas correct';
    }else{
        $result = $utilisateur->getUtilisateurByEmail($email);
        if($data = $result->fetch()){

            $mailToken = str_replace('+','-',my_encrypt($email));
            $name 	 = 'APP CCGIM';
            $subject = trim('Modification du mot de passe');
            include_once $mail.'/upd-pwd-mail.php';
            sendMailNoReply($email,$subject,$message);
            $tab = array(
                "email" => $email,
            );
            $_SESSION['_updPwd'] = $tab;
            header('location:' .$domaine.'/update-pwd-no-valid');
            exit();
        }else{
            $errors['message'] = 'Cette adresse email n\'existe pas';
        }

    }

}