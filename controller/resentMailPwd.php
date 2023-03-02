<?php
if(isset($_SESSION['_updPwd'])){

        $email = $_SESSION['_updPwd']['email'];
        $result = $utilisateur->getUtilisateurByEmail($email);

        if($data = $result->fetch()){

            $mailToken = str_replace('+','-',my_encrypt($email));
            $name 	 = 'APP CCGIM';
            $subject = trim('Modification du mot de passe');
            include_once $mail.'/upd-pwd-mail.php';
            sendMailNoReply($email,$subject,$message);
            echo 'ok';
        }else{
            $errors['message'] = 'Cette adresse email n\'existe pas';
        }



}