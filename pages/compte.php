<?php
$slug = trim(utf8_decode(trim(substr($_SERVER["REQUEST_URI"], strlen(dirname($_SERVER["SCRIPT_NAME"]))))), "/");

$file = explode('/',$slug);
$filesName = strtolower(end($file));
if(isset($_GET)){
    $g = explode('?',$filesName);
    $filesName = $g[0];
}

if(isset($file[1]) and !isset($file[2])){
    if(!file_exists($pages.'/account/'.$filesName.'.php')){
        header('location:'.$domaine.'/error');
    }else{
        require_once $pages.'/account/'.$filesName.'.php';
    }
}else{
    header('location:'.$domaine.'/error');
}

