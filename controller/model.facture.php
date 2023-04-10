<style type="text/css">
    table {
        width: 100%;
        color: #515355;
        font-family: helvetica;
        line-height: 5mm;
        border-collapse: collapse;
    }
    h2 { margin: 0;
        padding: 0;
    }
    p {
        margin: 5px;
    }
    .border th {
        padding: 10px;
        font-size: 12px;
        text-align: center;
        color: #67748e;
    }
    .border td {
        padding: 5px 10px;
        text-align: right;
        color: #67748e;
    }
    .no-border {
        border-right: 1px solid #67748e;
        border-left: none;
        border-top: none;
        border-bottom: none;
    }
    .10p { width: 10%; } .15p { width: 15%; }
    .20p { width: 20%; } .25p { width: 25%; }
    .30p { width: 30%; } .35p { width: 35%; }
    .40p { width: 40%; } .50p { width: 50%; }
    .60p { width: 60%; } .65p { width: 65%; }
    .70p { width: 70%; } .75p { width: 75%; }
    .80p { width: 80%; }

    hr{
        color: #67748e;
    }
    strong,span{
        line-height: 25px;
        font-size: 14px;
    }

    .content-pad{
        padding-top: 25px;
        padding-bottom: 25px
    }
    .text-blue{
        color: #67748e;
    }
    .border-right-radius{
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }
    .border-left-radius{
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }
    .ttc{
        font-weight: bold;
    }
    thead tr th{
        border : 1px solid #67748e;
    }
    tbody tr td{
        border : 1px solid #67748e;
    }

    .log{
        font-size: 20px;
        color: #67748e;
        margin-top: 20mm;
        margin-left: 16mm;
        max-width: 170px;
        font-weight: bold;
    }

    .myLogo{
        margin-top: 10mm;
        margin-left: 16mm;
        margin-bottom: 26mm;
        width: 80px;
    }


</style>

<page backtop="15mm" backbottom="15mm" backleft="16mm" backright="16mm">
    <page_header>
        <table>
            <tr>
                <td>
                    <img src="./cdn/media/logo.jpg" class="myLogo" title="logo" alt="logo"/>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td class="text-blue" style="width: 100%; font-size: 10px">
                    <div style="width: 100%; text-align: center">
                        <?=$footerInfo?><br/>
                    </div>
                    <div style="width: 100%; text-align: right">
                        Page [[page_cu]]/[[page_nb]]
                    </div>
                </td>
            </tr>
        </table>
    </page_footer>
    <table style="margin-top: 70px;vertical-align: top;">
        <tr>
            <td class="65p text-blue">
                <span>CCGIM</span><br>
                <span>YOPOUGON attié 9 ième tranche</span><br>
                <span>support@cabinet-ccgim.com</span><br>
                <span>Agent : <?= html_entity_decode(stripslashes($_SESSION['_ccgim_201']['nom']))?></span>
            </td>
            <td class="35p text-blue">
                <span><?= html_entity_decode(stripslashes($users['nom'])) .' '.html_entity_decode(stripslashes($users['prenom']))?></span><br>
                <span><?= html_entity_decode(stripslashes($users['ville']))?></span><br>
                <span><?= html_entity_decode(stripslashes($users['adresse']))?></span><br>
                <span><?= html_entity_decode(stripslashes($users['phone']))?></span>
            </td>
        </tr>
    </table>
    <table style="margin-top: 70px;vertical-align: top;">
        <tr>
            <td class="65p text-blue">
                <span>Facture N° <?= html_entity_decode(stripslashes($datas['ref_paiement']))?></span><br>
                <span>Date d'émission : <?= date_fr($datas['date_tresorerie'])?></span>
            </td>
            <td class="35p text-blue">

            </td>
        </tr>
    </table>
    <table style="margin-top: 20px;" class="border">
        <thead>
        <tr>
            <th class="70p " style="text-align: left">Nom du locataire</th>
            <th class="30p " style="">Montant</th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <td style="text-align: left"><?= html_entity_decode(stripslashes($users['nom'])) .' '.html_entity_decode(stripslashes($users['prenom']))?></td>
                <td style="text-align: right"><?=number_format($datas['debit_transac'],0,',',' ')?> FCFA</td>
            </tr>

        </tbody>
    </table>
    <table style="margin-top: 25px;vertical-align: top;">
        <tr>
            <td>

            </td>
        </tr>
    </table>
    <table style="margin-top: 250px;vertical-align: top;">
        <tr>
            <td class="80p text-blue">

            </td>
            <td class="20p text-blue">
                <strong style="text-decoration: underline">Signature</strong>
            </td>
        </tr>
    </table>

</page>