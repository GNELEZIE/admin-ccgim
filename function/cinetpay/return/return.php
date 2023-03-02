<?php
    require_once $function.'/cinetpay/src/new-guichet.php';
    require_once $function.'/cinetpay/commande.php';

     include_once $function.'/cinetpay/marchand.php';
if (isset($_POST['transaction_id']) || isset($_POST['token'])) {

    $commande = new Commande();
    $id_transaction = $_POST['transaction_id'];

    try {
        // Verification d'etat de transaction chez CinetPay
        $CinetPay = new CinetPay($marchand["site_id"], $marchand["apikey"]);

        $CinetPay->getPayStatus($id_transaction, $marchand["site_id"]);
        $message = $CinetPay->chk_message;
        $code = $CinetPay->chk_code;

        //recuperer les info du clients pour personnaliser les reponses.
        /* $commande->getUserByPayment(); */



        // redirection vers une page en fonction de l'état de la transaction
        if ($code == '00') {
            echo 'Felicitation, votre paiement a été effectué avec succès';
//            header('Location: '.$commande->getCurrentUrl().'/');
        }
        else {
            header('Location: '.$commande->getCurrentUrl().'/echec');
//            echo 'Echec, votre paiement a échoué';
            die();
        }

    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }
} else {
    echo 'transaction_id non transmis';
    die();

}