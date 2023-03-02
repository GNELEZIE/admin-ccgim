<?php
$slug = trim(utf8_decode(trim(substr($_SERVER["REQUEST_URI"], strlen(dirname($_SERVER["SCRIPT_NAME"]))))), "/");

$file = explode('/',$slug);

if(isset($file[0]) and !isset($file[1])){
    if(!file_exists($pages.'/addlgts/new-annonce.php')){
        header('location:'.$domaine.'/error');
    }else{
        require_once $pages.'/addlgts/new-annonce.php';
    }
}elseif(isset($file[2]) and !isset($file[3])){
    $filesName = strtolower($file[1]);
    if(!file_exists($pages.'/addlgts/'.$filesName.'.php')){
        header('location:'.$domaine.'/error');
    }else{
        require_once $pages.'/addlgts/'.$filesName.'.php';
    }
}else{
    header('location:'.$domaine.'/error');
}