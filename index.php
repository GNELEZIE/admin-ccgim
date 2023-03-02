<?php
require_once 'layout/init.php';

$slug = trim(utf8_decode(trim(substr($_SERVER["REQUEST_URI"], strlen(dirname($_SERVER["SCRIPT_NAME"]))))), "/");

$doc = explode('/',$slug);
$lien = $doc[0];
if(isset($_GET)){
    $g = explode('?',$lien);
    $lien = $g[0];
    $page = $lien;
}
if($lien =='' || $lien =='index'){
    $lien = 'dashboard';
    $page = $lien;
}else{
    $page = $lien;
}

if(!file_exists($pages.'/'.$lien.'.php')){
    header('location:'.$domaine.'/error');
}else{
    require_once $pages.'/'.$lien.'.php';
}