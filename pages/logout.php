<?php
if(isset($_COOKIE['_ccgim_cookie'])) {
    setcookie('_ccgim_cookie',null,time()-60*60*24*30,'/',$cookies_domaine,true,true);
}
unset($_SESSION['_ccgim_201']);
header('location:'.$domaine.'/connexion');
exit();