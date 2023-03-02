<!doctype html>
<html  lang="fr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <title>CCGIM - <?=ucfirst($page)?></title>
    <link rel="icon" type="image/png" href="<?=$cdn_domaine?>/media/log01.png">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/fonts/fonts.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/css/plugins.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/css/colors.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/css/widht.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/css/btn.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/css/font-size.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/css/padding.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/sweetalert/sweetalert.css" type="text/css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/datatable/datatables.min.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/intltelinput/css/intlTelInput.min.css"/>
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/toast/jquery.toast.min.css"/>
    <script src="<?=$cdn_domaine?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/intltelinput/css/intlTelInput.min.css"/>
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/datatable/datatables.min.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/font-awesome/css/all.css">
    <link rel="stylesheet" href="<?=$cdn_domaine?>/assets/libs/font-awesome/css/v4-shims.css">
<!--    <link rel="stylesheet" href="--><?//=$cdn_domaine?><!--/assets/css/wizard-style.css">-->
    <style>

        a , p ,h1,h2,h3,h4,h5{
            font-family: sans-serif, Verdana !important;
        }
        .header-bottom-content.style-two .top-navigation .menu-list > li > a {
            letter-spacing: normal;
            text-transform: inherit;
            padding: 10px 10px;
            font-weight:normal;
        }

        .menu-list li:hover > a, .menu-list > li > a:hover, .menu-list > li > a.active {
            background: #18a3f412 !important;
            color: #18a3f4 !important;
        }
        .btn-register{
            background: #18a3f4;
            color: #fff !important;
        }
        .btn-register:hover{
            background: #158cd1;
        }
        .title1{
            position: absolute;
            left: 207px;
            top: 75px;
            font-weight: bold;
            color: #181af4;
            font-size: 50px;
            padding: 2px 17px;
            border-radius: 6px;
            background: #ffffff96;
        }
        .form-content select {
            width: 100%;
        }

        .nice-select{
            line-height: 23px;
            border: solid 1px #ced4da;
            background-color: #F1F5FF;
            font-size: 14px;
            border-radius: 10px;
            transition: all ease 0.5s;
        }
        .nice-select:active, .nice-select.open, .nice-select:focus {
            border-color: #F29F05;
        }
        .nice-select .list {
            margin-top: 5px;
            top: 100%;
            border-top: 0;
            border-radius: 0 0 5px 5px;
            max-height: 300px;
            overflow-y: scroll;
            padding: 50px 0 0
        }
        .nice-select .nice-select-search-box {
            box-sizing: border-box;
            position: absolute;
            width: 100%;
            margin-top: 5px;
            top: 100%;
            left: 0;
            z-index: 8;
            padding: 5px;
            background: #FFF;
            opacity: 0;
            pointer-events: none;
            border-radius: 5px 5px 0 0;
            box-shadow: 0 0 0 1px rgba(68, 88, 112, .11);
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: scale(.75) translateY(-21px);
            -ms-transform: scale(.75) translateY(-21px);
            transform: scale(.75) translateY(-21px);
            -webkit-transition: all .2s cubic-bezier(.5, 0, 0, 1.25), opacity .15s ease-out;
            transition: all .2s cubic-bezier(.5, 0, 0, 1.25), opacity .15s ease-out
        }

        .no-nice-select-search-box .nice-select-search-box {
            display: none;
        }
        .no-nice-select-search-box .list{
            padding: 0 !important;
        }
        .nice-select .list li:first-child {
            display: none !important;
        }
        .nice-select .nice-select-search {
            box-sizing: border-box;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-shadow: none;
            color: #333;
            display: inline-block;
            vertical-align: middle;
            padding: 7px 12px;
            margin: 0 10px 0 0;
            width: 100%!important;
            min-height: 36px;
            line-height: 22px;
            height: auto;
            outline: 0!important
        }

        .nice-select.open .nice-select-search-box {
            opacity: 1;
            z-index: 10;
            pointer-events: auto;
            -webkit-transform: scale(1) translateY(0);
            -ms-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0)
        }
        .nice-select.wide {
            width: 100%;
        }
        #locataire{
            display: block !important;
            opacity: 0;
            position: absolute;
            width: 50px
        }
        footer li{
            list-style: none;
        }
        .pd-section{
            padding: 100px 0;
        }
        .offset-3{
            margin-left: 25%;
        }
        .offset-4{
            margin-left: 33.33%;
        }
        .cd-form {
           border-radius: 6px;
        }
        .m-0{
            margin: 0 !important;
        }
        .cd-form input.has-padding {
            padding: 7px 15px 7px 11px !important;
        }
        .cd-form input.has-border {
            border: 2px solid #d2d8d8;
        }
        .cd-form label {
            font-size: 13px;
        }
        .user-inscription{
            width: 100%;
            border: 0;
            background: #278211;
            border-radius: 6px;
            font-size: 17px;
            padding: 9px;
        }
        .user-inscription:hover{
            background: #2cdd11;
        }
        .text-gr{
         color: #2cdd11 !important;
        }

        .loader-btn {
            display: inline-block;
            width: 0.9rem;
            height: 0.9rem;
            vertical-align: middle;
            border: 0.2em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner-border .75s linear infinite;
            animation: spinner-border .75s linear infinite;
            align-self: center;
        }
        .required:before {
            content: "*";
            color: red;
        }
        .alert-pd{
            margin-top: 10px;
            margin-bottom: 0 !important;
            padding: 9px !important;
        }
        .cd-form input.has-padding {
            padding: 7px 15px 7px 11px !important;
        }
        .cd-form input.has-border {
            border: 1px solid #d2d8d8;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
        }
        input, select, textarea {
            font-size: 80% !important;
        }

        .cd-form input.has-border {
            border: 2px solid #d2d8d8 !important;
        }

        .position-relative{
            position: relative !important;
        }
        .cd-form .hide-password {
            top: 70% !important;
        }
        .d-flex{
            display: flex;
        }

        .w20{
            width: 20%;
        }
        .w25{
            width: 25%;
        }
        .w30{
            width: 30%;
        }
        .w40{
            width: 40%;
        }
        .w50{
            width: 50% !important;
        }
        .w60{
            width: 60%;
        }
        .w70{
            width: 70%;
        }
        .w80{
            width: 80%;
        }
        .w100{
            width: 100%;
        }
        .text-right{
            text-align: right;
        }
        .font-15{
            font-size: 15px !important;
        }
        .header-bottom-content.style-two .top-navigation .menu-list > li > a span {
            color: #ffffff;
        }
        .header-box {
            background: #18a3f4;
            color: #ffffff;
            border-radius: 6px 6px 0 0;
            padding: 15px 20px;
        }
        .img-profil{
            border-radius: 6px 6px 0 0;
        }
        .btn-a{
            padding: 23px 0;
        }
        .btn-a a{

            padding: 4px 15px;
            border-radius: 6px;
            color: #fff;
        }
        .btn-a a:hover{
            background: #20daf4;
        }
        .dash{
            padding-top: 31px !important;
        }
        .dash a{
            background: rgba(24, 163, 244, 0.21);
            color: #18a3f4;
        }
        .dash a:hover{
            background: #18a3f4;
            color: #FFFFFF;
        }
        .img-profil{
            object-fit: cover;
            height: 240px;
            width: 100%;
        }
        .radius-6{
            border-radius: 6px !important;
        }
        .iti{
            width: 100% !important;
        }
        .cd-form input {
            border-radius: 6px !important;
        }
        .pt15{
            padding-top: 15px;
        }
        .pd25{
            padding: 25px !important;
        }
        .ts-box{
            box-shadow: rgba(0, 0, 0, 0.16) 0 1px 4px;
            border-radius: 6px;
            text-align: center;
            padding: 10px 10px;
            margin-bottom: 20px;
        }
        .ts-box-green{
            background: rgb(0 128 0 / 12%);
            color: #008000;
            box-shadow: rgba(0, 0, 0, 0.16) 0 1px 4px;
            border-radius: 6px;
            text-align: center;
            padding: 10px 10px;
            margin-bottom: 20px;
        }
        .ts-box-red{
            background: rgb(255 0 0 / 6%);
            color: #FF0000;
            box-shadow: rgba(0, 0, 0, 0.16) 0 1px 4px;
            border-radius: 6px;
            text-align: center;
            padding: 10px 10px;
            margin-bottom: 20px;
        }
        .myicon-home{
            padding: 14px 13px;
            border-radius: 50px;
            font-size: 18px;
        }
        .nbLgt h2{
            margin: 0;
            font-weight: 600;
            padding-top: 9px;
            font-size: 15px;
            font-family: sans-serif !important;
        }
        .nbLgt p{
           margin: 0;
        }
        .my-icon-dashboard-blue{
            background: #18a3f47a;
            color: #18a3f4;
        }
        .my-icon-dashboard-green{
            background: rgba(0, 128, 0, 0.24);
            color: #008000;
        }
        .my-icon-dashboard-red{
            background: rgba(255, 0, 0, 0.21);
            color: #FF0000;
        }
        .myicon-user {
            padding: 13px 14px;
            border-radius: 50px;
            font-size: 18px;
        }

        .myicon-dollar {
            padding: 13px 17px;
            border-radius: 50px;
            font-size: 18px;
        }
        .myicon-trend {
            padding: 16px 15px;
            border-radius: 50px;
            font-size: 15px;
        }
        .m30{
            margin: 30px;
        }
        .pb30{
            padding-bottom: 30px;
        }
        .table1 {
            border: 0 !important;
        }
        .table1 th, td {
            border: 0;
            padding: 10px;
        }
        .link{

        }
        .link a{
            padding: 9px 10px;
            width: 100%;
            display: flex;
        }
        .link a.actives{
            background: rgb(24 163 244 / 11%);
            color: #18a3f4;
        }
        .link a:hover {
            background: rgb(24 163 244 / 11%);
            color: #18a3f4;
        }
        .mes-lgts{
            padding: 30px;
        }
        .apartments-content .text-content .bottom-content {
            padding: 0 20px 8px !important;
        }
        .apartments-content .image-content {
            border-radius: 0;
        }

        .owl-carousel .owl-nav button.owl-prev{
            position: absolute;
            top: 77px;
            left: 5px;
            background: #00000057;
            padding: 5px 13px !important;
            border-radius: 50px;
            color: #fff;
            font-size: 26px;
        }
       .owl-carousel .owl-nav button.owl-next{
            position: absolute;
            top: 77px;
            right: 5px;
            background: #00000057 !important;
            padding: 5px 13px !important;
            border-radius: 50px !important;
            color: #fff !important;
            font-size: 26px !important;
        }
        .owl-carousel .owl-nav button.owl-prev:hover, .owl-carousel .owl-nav .owl-next:hover{
            background: #000 !important;
            color: #fff !important;
        }
        .owl-dots{
            position: absolute;
        }
        .text-box-home h3{
            margin-bottom: 0;
            margin-top: 9px;
        }
        table.dataTable.no-footer {
            border-bottom: 0 !important;
        }
        table.dataTable thead th, table.dataTable thead td {
            border-bottom: 0 !important;
        }
        th {
            border: 0 !important;
        }
        table{
            border: 0 !important;
        }
        table > tbody > tr > td, table > tbody > tr > td > a, .dataTables_info {
            border: none;
            background: transparent;
            -webkit-transition: all 0.1s ease;
            transition: all 0.1s ease;
            color: #849ab9 !important;
            font-size: 13px !important;
        }
         table > thead > tr > th {
            text-transform: initial;
            border: none;
            -webkit-transition: all 0.1s ease;
            transition: all 0.1s ease;
            background: #e3e9f0;
            color: #576682;
            font-size: 15px;
            font-family: 'Jost', sans-serif;
            font-weight: 500;
        }
        table > thead > tr > th:first-child {
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
        }
        table > thead > tr > th:last-child {
            border-bottom-right-radius: 6px;
            border-top-right-radius: 6px;
        }

        .table-seach {
            position: absolute;
            right: 10px;
            top: 10px;
            color: #7d93b2;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            box-shadow: none;
            border-radius: 50%;
            background: #f1f2f3;
            color: #849ab9 !important;
            pointer-events: none;
            cursor: auto;
            border-color: #f1f2f3;
            padding: 5px 13px !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #f83600 !important;
            color: #fff !important;
            border-color: #f83600 !important;
            border-radius: 50%;
            padding: 5px 13px !important;
        }
        .dataTable tbody th, table.dataTable tbody td {
            vertical-align: middle !important;
        }
        table.dataTable tbody th, table.dataTable tbody td {
            padding: 15px 10px;
        }
        table tr{
           border-radius: 6px !important;
        }
        table tr:hover{
            background-color: rgba(227, 233, 240, 0.54) !important;
        }
        li{
            list-style: none !important;
        }
        .btn-action{
            background: #f8360047;
            color: #f83600;
            padding: 5px 10px;
            align-items: center;
            /* display: inherit; */
            border-radius: 6px;
        }
        .badge-blue{
            color: #4ba6ef;
            background-color: rgba(75, 166, 239, 0.13);
            border-radius: 6px;
            transition: all 0.2s ease-in-out;
            font-size: 11px;
            font-weight: 500;
            padding: 2px 5px;
            vertical-align: middle;
            border: none;
        }

        .badge-disable{
            background-color: rgba(192, 198, 205, 0.13);
            border-radius: 6px;
            transition: all 0.2s ease-in-out;
            font-size: 11px;
            font-weight: 500;
            padding: 2px 5px;
            vertical-align: middle;
            border: none;
        }

        .badge-green{
            color: #2ab57d;
            background-color: rgba(42, 181, 125, 0.13);
            border-radius: 6px;
            transition: all 0.2s ease-in-out;
            font-size: 11px;
            font-weight: 500;
            padding: 2px 5px;
            vertical-align: middle;
            border: none;
        }

        .badge-red{
            color: #fd625e;
            background-color: rgba(253, 98, 94, 0.13);
            border-radius: 6px;
            transition: all 0.2s ease-in-out;
            font-size: 11px;
            font-weight: 500;
            padding: 2px 5px;
            vertical-align: middle;
            border: none;
        }

        .badge-grey{
            color: #888ea8;
            background-color: rgba(192, 198, 205, 0.13);
            border-radius: 6px;
            transition: all 0.2s ease-in-out;
            font-size: 11px;
            font-weight: 500;
            padding: 2px 5px;
            vertical-align: middle;
            border: none;
        }

        .badge-jaune{
            color: #F29F05;
            background-color: #f29f052b;
            border-radius: 6px;
            transition: all 0.2s ease-in-out;
            font-size: 11px;
            font-weight: 500;
            padding: 2px 5px;
            vertical-align: middle;
            border: none;
        }
        .btn-payer{
            color: #fff !important;
            background-color: #2ab57d !important;
            border-radius: 6px;
            padding: 3px 7px;
        }
        .btn-payer-maintenant{
            color: #fff !important;
            background-color: #2ab57d !important;
            border-radius: 6px;
            padding: 9px 7px;
        }
        .btn-payer-maintenant:hover{
            background-color: #2eb174 !important;
        }
        .btn-payer:hover{
            background-color: #3afbae;
        }
        .btn-voir {
            color: #fff !important;
            background-color: #4ba6ef !important;
            border-radius: 6px;
            padding: 3px 7px;
        }
        .btn-add-payer {
            color: #4ba6ef !important;
            background-color: #4ba6ef36 !important;
            border-radius: 6px;
            padding: 9px 10px;
        }
        .btn-add-payer:hover{
            color: #fff !important;
            background-color: #4ba6ef !important;
        }
        .btn-add-locataire {
            color: #4ba6ef !important;
            background-color: #4ba6ef36 !important;
            border-radius: 6px;
            padding: 8px 10px;
        }
        .btn-add-locataire:hover{
            color: #fff !important;
            background-color: #4ba6ef !important;
        }
        .btn-red-transparent{
            color: #ac2925;
            background: #ac292529;
        }
        .btn-red-transparent:hover{
            color: #fff;
            background: #ac2925;
        }

        .btn-voir:hover{
            color: #fff !important;
            background-color: #4db4ff !important;
        }

        .modal {
            top: 20%;
        }
        .modal-header .close {
            margin-top: -80px;
            margin-right: -51px;
            background: #000;
            padding: 8px 11px;
            border-radius: 50px;
            color: #fff;
            font-size: 16px;
        }
        .input-height {
            height: 45px !important;
        }
        .input-height40 {
            height: 40px !important;
        }
        .input-style{
            border: 2px solid #d2d8d8 !important;
            padding: 7px 15px 7px 11px !important;
            border-radius: 6px !important;
        }
        .btn-closed{
            border-radius: 6px;
            padding: 9px 10px;
        }
        .btn-white{
            background: #fff;
            border-radius: 6px;
            padding: 8px 15px;
            color: #18a3f4;
        }
        .align-items-center{
            align-items: center !important;
        }
        .nav-tabs {
            border-bottom: 0 !important;
        }
        .myTabsUl .active a{
            background-color: #18a3f430 !important;
            border: 0 !important;
            border-radius: 6px !important;
            color: #18a3f4 !important;
        }
        .myTabsUl li a:hover{
            background-color: #18a3f430 !important;
            border: 0 !important;
            border-radius: 6px !important;
            color: #18a3f4 !important;
        }
        .pInfo p {
            padding: 7px 0;
            border-bottom: 1px solid #eee;
        }

/*Wizard*/
        #msform {
            padding-top: 25px;
            text-align: center;
            position: relative;
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: #ffffff;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea,
        #msform select, select2{
            border: 2px solid #ccc;
            border-radius: 7px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            border: 2px solid #999191;

        }

        #msform .action-button {
            width: 100px;
            background: #18a3f4;
            font-weight: bold;
            color: white;
            border: 0 none;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }


        #msform .action-button-previous {
            width: 100px;
            background: #000000;
            color: white;
            border: 0 none;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }



        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative;
            z-index: 9;

        }

        #progressbar #description:before {
            font-family: FontAwesome;
            content: "1"
        }

        #progressbar #localissation:before {
            font-family: FontAwesome;
            content: "2"
        }

        #progressbar #galerie:before {
            font-family: FontAwesome;
            content: "3"
        }

        #progressbar #tarifs:before {
            font-family: FontAwesome;
            content: "4"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: #d3d3d3;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: #d3d3d3;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #18a3f4
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204px;
            height: 104px;
            border-radius: 0;
            background: #18a3f4;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
        .icon-m2 {
            position: absolute;
            right: 26px;
            top: 41px;
            background: #fff;
        }
        .icon-m {
            position: absolute;
            right: 18px;
            top: 41px;
            background: #fff;
        }
        .mybtn-next {
            width: 12%;
            border: 0;
            background: #18a3f4;
            border-radius: 6px;
            font-size: 17px;
            padding: 9px;
        }
        .mybtn-prev {
            width: 21%;
            border: 0;
            background: #18a3f41c;
            border-radius: 6px;
            font-size: 17px;
            padding: 9px;
            margin-right: 23px;
            color: #18a3f4 !important;
        }

        /*End wizard*/

        .upload-form{
            text-align: center;
            align-items: center;
            justify-content: center;
            padding: 30px;
            border: 2px dashed #888ea8;
            border-radius: 6px;
            transition: 0.2s;
            min-height: 200px;
            background: no-repeat center;
            background-size: contain;
            cursor: pointer;
        }
        .upload-form:hover{
            background-color: #fafafa;
        }

        .file-msg {
            text-align: center;
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
        }

        .input-galerie{
            display: none !important;
        }
        .btn-del{
            position: absolute;
            top: 10px;
            right: 20px;
            color: red;
            background: #fff;
            padding: 0 5px;
            border-radius: 3px;
        }
        .btn-del:hover{
            box-shadow: 0 0 6px rgb(35 173 255);
        }
        .gal-cover{
            object-fit: cover;
            height: 200px;
            width: 100%;
            border-radius: 10px;
            border: 1px solid #CAD6F2;
        }
        .photo-blur {
            filter: blur(5px);
            -webkit-filter: blur(5px);
        }
        .gal-load{
            display: none;
        }
        .pb-4{
            padding-bottom: 15px;
        }
        .text-white{
            color:  #fff !important;
        }
        .icon-check{
            width: 100px;
        }
       .pagination>li>span {
            padding: 9px 12px !important;
        }
        .pagination-link ul li.active a {
            background-color: #18a3f4 !important;
        }
        .pagination-link ul li a {
            border-radius: 26px !important;
        }
        .pagination>li>a{
            padding: 9px 18px !important;
        }
        .apartments-content .text-content .top-content h3 a:hover {
            color: #18a3f4 !important;
        }
        ::selection {
            background-color: #18a3f4 !important;
        }
        .heading-content-one.border h2.title:before{
            z-index: 0 !important;
        }
        .bg-search{
            background-color: #18a3f4 !important;
            padding: 52px 0 90px 0;
        }
        .bg-lgts{
            background-color: #18a3f4 !important;
            padding: 52px 0;
        }
        .title-search{
            margin: 0;
            text-align: center;
            color: #fff;
        }

        .heading-content-one h5.sub-title {
            text-transform: inherit !important;
        }
        .apartments-content a{
            font-weight: normal !important;
        }
        .apartments-content .text-content .bottom-content .rent-price {
            font-size: 13px !important;
        }
        .p79-0{
            padding: 79px 0 !important;
        }
        .family-apartment-content .apartment-description {
            font-size: 16px !important;
            font-weight: normal !important;
        }
        .apartment-sidebar2{
            box-shadow: rgb(0 0 0 / 16%) 0 1px 4px !important;
        }

        .widget_rental_search .advance_search_query .form-title{
            text-transform: inherit !important;
        }
        .form-content label {
            text-transform: inherit;
            margin-bottom: 3px !important;
        }

        .form-bg.seven .form-group {
            margin-bottom: 15px !important;
        }
        .contact .input-style{
            border: 2px solid #d2d8d8 !important;
            border-radius: 6px !important;
        }
        .form-bg.seven {
            box-shadow: none;
            padding: 15px;
        }
        .default-gradient-before:before {
            background: #18a3f4;
            background: -moz-linear-gradient(left, #18a3f4 0%, #1487ca 100%);
            background: -webkit-linear-gradient(left, #18a3f4 0%, #18a3f4 100%);
            background: linear-gradient(to right, #18a3f4 0%, #18a3f4 100%);
            filter:
        }
        .button{
            text-transform: inherit !important;
        }

        .highlight {
            font-weight: normal;
            font-size: 37px;
        }
        .milestone-details {
            font-weight: normal;
            font-size: 32px;
            color: #fff;
            padding-top: 10px;
        }
        .heading-content-two {
            max-width: inherit !important;
        }
        .testimonial-area .testimonial-heading-content h2.sub-title {
            text-transform: inherit;
        }
        .item .cover77{
            object-fit: cover !important;
            height: 77px !important;
        }
        .nice-select {
            line-height: 28px !important;
        }
        .pd15{
            padding-top: 15px !important;
        }
        .myLogo{
            width: 81px;
        }
        .myLogoAuth{
            width: 100px;
        }
        .p30{
            padding: 30px;
        }
        .pb12{
           padding-bottom: 12px;
        }
        .pt13{
           padding-top: 13px !important;
        }
        .w90{
            width: 90%;
        }
        .w80{
            width: 80%;
        }
        .w70{
            width: 70%;
        }
        .w60{
            width: 60%;
        }
        .w50{
            width: 50%;
        }
        .w40{
            width: 40%;
        }
        .w30{
            width: 30%;
        }
        .w20{
            width: 20%;
        }
        .w10{
            width: 10%;
        }
        .nb-box{
            background: #18a3f4;
            color: #fff;
            padding: 5px 8px;
            border-radius: 50px;
            text-align: center;
            font-size: 11px;
        }
        label {
            font-size: 13px !important;
        }
        .btn.active.focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn:active:focus, .btn:focus {
            outline: 0 !important;
        }
        .locataire-input{
            display: none;
        }
        .pt50{
            padding-top: 50px;
        }
        #loginForm{
            margin: 30px !important;
        }
        #updPwdForm{
            margin: 30px !important;
        }
        #updPwdsForm{
            margin: 30px !important;
        }
        #formRegister, .formForgot{
            margin: 30px !important;
        }
        .color-blue{
            color: #18a3f4 !important;
        }

        .font-7{
            font-size: 7px !important;
        }
        .cdform{
            padding: 2em;
            background-color: #fff;
            border-radius: 6px;
        }
        .footer-area .bottom-content {
            border-top: 0 !important;
            margin-top: 51px !important;
        }
        .bg-white{
            background: #ffffff;
        }
        .pb15{
            padding-bottom : 15px;
        }
        .pt10{
            padding-top : 15px;
        }

        .pc-none{
            display: none;
        }
        .mobile-none{
            display: bloc;
        }
        .site-logo a{
            padding: 0 !important;
        }
        #formRegister, .form-group{
           padding: 0 !important;
        }
        #formRegister{
           padding: 20px !important;
        }
        #formRegister .nice-select {
            line-height: 41px !important;
        }
        #formRegister.cd-form .hide-password {
            top: 75% !important;
        }







        @media(max-width: 767px) {
            .cd-form input.has-padding {
                padding: 16px 20px 16px 50px;
            }

            .cd-form input.has-padding {
                padding: 12px 20px 12px 50px;
            }

            .cd-form input.full-width {
                width: 100%;
            }

            .cd-form input {
                margin: 0;
                padding: 0;
                border-radius: 0.25em;
            }

            .offset-3, .offset-4, .offset-2 {
                margin-left: 0;
            }

            #loginForm {
                margin: 0 !important;
            }
            #updPwdForm {
                margin: 0 !important;
            }
            #updPwdsForm {
                margin: 0 !important;
            }

            #formRegister, .formForgot {
                margin: 0 !important;
            }
            #formRegister .form-content .form-group{
                padding: 0 !important;
            }

            .pc-none{
                display: block;
            }
            .mobile-none{
                display: none;
            }

            .animated-arrow span, .animated-arrow span:before, .animated-arrow span:after{
                background: #18a3f4;
            }
            .menu-mobile{
                position: absolute;
                right: -59px;
                top: 12px;
                font-size: 23px;
            }
            .mobile-header-block .logo-area{
                text-align: right !important;
            }
            .pd-mobile{
                padding: 10px !important;
            }
            .pd-section {
                padding: 21px 0;
            }
            .p30{
                padding: 11px !important;
            }
            .mycol50{
                width: 50% !important;
            }
            .m5{
                margin: 5px !important;
            }
            .mb10{
                margin-bottom: 10px !important;
            }























        }

    </style>
</head>

<body>

