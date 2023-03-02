<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mailer/vendor/phpmailer/src/Exception.php';
require 'mailer/vendor/phpmailer/src/PHPMailer.php';
require 'mailer/vendor/phpmailer/src/SMTP.php';

require 'mailer/vendor/autoload.php';


if(!function_exists('sendMailNoReply')){
    function sendMailNoReply($to,$subject,$message){
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host       = 'mail56.lwspanel.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'test@aeek-kassere.com';
            $mail->Password   = 'xF1-2_nXJABV4$a';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            $mail->setFrom('test@aeek-kassere.com', 'Aeek Kassere');
            $mail->addAddress($to);
            $mail->addReplyTo('test@aeek-kassere.com', 'Aeek Kassere');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->send();
            return 'send';
        } catch (Exception $e) {
            return $mail->ErrorInfo;
        }
    }
}

if(!function_exists('sendMailTo')){
    function sendMailTo($to,$subject,$message){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host       = 'email.logetex.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'support@logetex.com';
            $mail->Password   = 'm9OWVqlVI2cu';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('support@logetex.com', 'Logetex');
            $mail->addAddress($to);
            $mail->addReplyTo('support@logetex.com', 'Logetex');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
           return 'send';
        } catch (Exception $e) {
            return $mail->ErrorInfo;
        }
    }
}

if(!function_exists('sendMailToMe')){
    function sendMailToMe($from,$fromName,$subject,$message){
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0;
            $mail->setFrom($from, $fromName);
            $mail->addReplyTo($from, $fromName);
            $mail->addAddress('support@logetex.com', 'Logetex');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
           return 'send';
        } catch (Exception $e) {
            return $mail->ErrorInfo;
        }
    }
}

