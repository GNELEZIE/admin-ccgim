<?php
$dateGmt = gmdate('Y-m-d H:i');
// page active
$domaine_sit = 'https://www.cabinet-ccgim.com';


if(!function_exists('gain')){
    function gain($mont,$taux){
        $ts = ($mont*$taux)/100;
        $rs = $mont-$ts;
        return $rs;
    }
}

if(!function_exists('getIp')){
    function getIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
if(!function_exists('page_active')){
    function page_active2($page){
        $urlSlug = trim(utf8_decode(trim(substr($_SERVER["REQUEST_URI"], strlen(dirname($_SERVER["SCRIPT_NAME"]))))), "/");
        $d = explode('/',$urlSlug);
        $i = $d[0];
        if(isset($_GET)){
            $g = explode('?',$i);
            $i = $g[0];
        }
        if($page == $i and !isset($d[1])){
            return 'box-header-menu-active';
        }else{
            return '';
        }

    }
}
if(!function_exists('page_active')){
    function page_active($page){
        $urlSlug = trim(utf8_decode(trim(substr($_SERVER["REQUEST_URI"], strlen(dirname($_SERVER["SCRIPT_NAME"]))))), "/");
        $d = explode('/',$urlSlug);
        $i = $d[0];
        if(isset($_GET)){
            $g = explode('?',$i);
            $i = $g[0];
        }
        if($page == $i){
            return 'active';
        }else{
            return '';
        }

    }
}
if(!function_exists('dash_active')){
    function dash_active($page){
        $urlSlug = trim(utf8_decode(trim(substr($_SERVER["REQUEST_URI"], strlen(dirname($_SERVER["SCRIPT_NAME"]))))), "/");
        $d = explode('/',$urlSlug);
        $i = $d[1];
        if(isset($_GET)){
            $g = explode('?',$i);
            $i = $g[0];
        }
        if($page == $i){
            return 'actives';
        }else{
            return '';
        }

    }
}

if(!function_exists('mob_menu_active')){
    function mob_menu_active($page){
        $urlSlug = trim(utf8_decode(trim(substr($_SERVER["REQUEST_URI"], strlen(dirname($_SERVER["SCRIPT_NAME"]))))), "/");
        $d = explode('/',$urlSlug);
        $i = $d[0];
        if(isset($_GET)){
            $g = explode('?',$i);
            $i = $g[0];
        }
        if($page == $i){
            return 'mobile-active';
        }else{
            return '';
        }

    }
}

// remplace virgule par .

if(!function_exists('v_p')){
    function v_p($nb){
        $n = str_replace(',','.',$nb);
        return $n;
    }
}
if(!function_exists('p_v')){
    function p_v($nb){
        $n = str_replace('.',',',$nb);
        return $n;
    }
}

// remplace date en fr

if(!function_exists('date_fr2')){
    function date_fr2($date){
        $dc = new DateTime($date);
        $dc = $dc->format('Y-m');
        return $dc;
    }
}
if(!function_exists('date_fr')){
    function date_fr($date){
        $dc = new DateTime($date);
        $dc = $dc->format('d/m/Y');
        return $dc;
    }
}

// remplace date en eng

if(!function_exists('date_eng')){
    function date_eng($date){
        if (DateTime::createFromFormat('d/m/Y', $date) !== FALSE){
            $dc = explode('/',$date);
            $ac = $dc[2]; $mc = $dc[1]; $jc = $dc[0];
            $dc = $ac.'-'.$mc.'-'.$jc;
            return $dc;
        }else{
            return 'error';
        }
    }
}

// remplace dateTime en fr

if(!function_exists('date_time_fr')){
    function date_time_fr($date){
        $dc = new DateTime($date);
        $dc = $dc->format('d/m/Y H:i');
        return $dc;
    }
}

if(!function_exists('date_fr_court')){
    function date_fr_court($date){
        $dc = new DateTime($date);
        $dc = $dc->format('d/m');
        return $dc;
    }
}

// remplace datetime en eng

if(!function_exists('date_time_eng')){
    function date_time_eng($date){
        if (DateTime::createFromFormat('d/m/Y H:i', $date) !== FALSE){
            $dc = explode('/',$date);
            $ac = $dc[2]; $mc = $dc[1]; $jc = $dc[0];
            $dh = explode(' ',$ac);
            $ac = $dh[0];$dm = $dh[1];
            $dc = $ac.'-'.$mc.'-'.$jc.' '.$dm;
            return $dc;
        }else{
            return 'error';
        }
    }
}

// remplace dateTime en fr

if(!function_exists('date_hour')){
    function date_hour($date){
        $dc = new DateTime($date);
        $dc = $dc->format('H:i');
        return $dc;
    }
}

if(!function_exists('reduit_text')){
    function reduit_text($text, $cut, $end = '...'){
        $output = substr($text, 0, $cut);
        if(strlen($text) > $cut){
            $output = $output . $end;
        }

        return $output ;
    }
}

if(!function_exists('reduit_username')){
    function reduit_username($text, $cut){
        $output = substr($text, 0, $cut);
        return $output ;
    }
}

function reduitMot($chaine, $nb_mots, $delim='...') {
    $stringTab = explode(" ", $chaine) ;
    $txt = '';
    for($i=0;$i<$nb_mots;$i++){
        $txt .=" ".$stringTab[$i] ;
    }
    if (count($stringTab) > $nb_mots) $txt.= $delim ;
    return $txt ;
}

/* Remplace caractères accentués d'une chaine */
function remove_accent($str){
    $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
        'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
        'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
        'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
        'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
        'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
        'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
        'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
        'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť',
        'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ',
        'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
        'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');

    $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
        'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
        'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
        'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
        'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
        'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
        'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
        'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
        's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
        'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
        'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
    return str_replace($a, $b, $str);
}


/* Générateur de Slug (Friendly Url) : convertit un titre en une URL conviviale.*/
function create_slug($str){
    return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
        array('', '-', ''),
        remove_accent($str)
    ));
}

if(!function_exists('instant_time')){
    function instant_time($myDate){
        $today = strtotime(date('Y-m-d H:i:s'));
        $date = strtotime($myDate);

        $inactif_time = $today - $date;
        if($inactif_time < 60){
            $inactif_time = 'À l\'instant';
        }elseif($inactif_time > 59 AND $inactif_time < 3600){
            $time = number_format($inactif_time/60,0,'.',' ') ;
            if($time > 2){
                $inactif_time = 'Il y a '.$time.' mins' ;
            }else{
                $inactif_time = 'En ligne';
            }
        }elseif($inactif_time > 3599 AND $inactif_time < 86400){
            $time = number_format($inactif_time/3600,0,'.',' ') ;
            if($time > 1){
                $inactif_time = 'Il y a '.$time.' hrs' ;
            }else{
                $inactif_time = 'Il y a '.$time.' hr' ;
            }
        }elseif($inactif_time > 86399 AND $inactif_time < 1728000){
            $time = number_format($inactif_time/86400,0,'.',' ') ;
            if($time > 1){
                $inactif_time = 'Il y a '.$time.' jrs' ;
            }else{
                $inactif_time = 'Il y a '.$time.' jr' ;
            }
        }else{
            $inactif_time = date_fr($myDate) ;
        }

        return $inactif_time ;

    }
}

if(!function_exists('rmdir_recursive')){
    function rmdir_recursive($dir){
        //Liste le contenu du répertoire dans un tableau
        $dir_content = scandir($dir);
        //Est-ce bien un répertoire?
        if($dir_content !== FALSE){
            //Pour chaque entrée du répertoire
            foreach ($dir_content as $entry){
                //Raccourcis symboliques sous Unix, on passe
                if(!in_array($entry, array('.','..'))){
                    //On retrouve le chemin par rapport au début
                    $entry = $dir . '/' . $entry;
                    //Cette entrée n'est pas un dossier: on l'efface
                    if(!is_dir($entry)){
                        unlink($entry);
                    }
                    //Cette entrée est un dossier, on recommence sur ce dossier
                    else{
                        rmdir_recursive($entry);
                    }
                }
            }
        }
        //On a bien effacé toutes les entrées du dossier, on peut à présent l'effacer
        rmdir($dir);
    }
}

if(!function_exists('verif_username')){
    function verif_username($texte){
        $evite = array('à','â','ç','è','é','ê','î','ô','ù','û','ü','<','>','/',' ');
        $resultat = $texte;
        for ($i = 0; $i < count($evite); $i++){
            if(stristr($texte, $evite[$i])) {
                $resultat = 'non';
                break;
            }
        }
        return $resultat ;
    }
}

if(!function_exists('verif_text')){
    function verif_text($texte){
        $evite = array('<','>','/');
        $resultat = $texte;
        for ($i = 0; $i < count($evite); $i++){
            if(stristr($texte, $evite[$i])) {
                $resultat = 'non';
                break;
            }
        }
        return $resultat ;
    }
}


if(!function_exists('my_encrypt')){
    function my_encrypt($data) {
        $key = 'sk_aHGEcdfU_8nUBGReT!euCSSndllInfdd!dsf!AhdYFr<<<à@zsez=';
        $encryption_key = base64_decode($key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }
}
if(!function_exists('my_decrypt')){
    function my_decrypt($data) {
        $key = 'sk_aHGEcdfU_8nUBGReT!euCSSndllInfdd!dsf!AhdYFr<<<à@zsez=';
        $encryption_key = base64_decode($key);
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }
}

if(!function_exists('kilo')){
    function kilo($data) {
        $nbre = $data;
        if($nbre > 1000){
            $nbre = number_format($nbre / 1000,1,',',' ');
            $nbre = $nbre.' k';
        }
        return $nbre;
    }
}

if(!function_exists('getDataByUrl')){
    function getDataByUrl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_close($ch);
        return curl_exec($ch);
    }
}

if(!function_exists('sendSms')){
    function sendSms($smsNumber,$code){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.floppy.ai/sms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>
                'to='.$smsNumber.'&from=IvoireBox&dcs=8&text=Votre code de vérification est : '.$code.'. Ne communiquez ce code à personne.',
            CURLOPT_HTTPHEADER => array(
                'x-api-key: 4c5269ed1103',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        curl_close($curl);
        return curl_exec($curl);
    }
}

if(!function_exists('sendOTPSms')){
    function sendOTPSms($smsNumber,$code){
        $curl = curl_init();
        $data = array(
            "application_id" => "29013",
            "application_token" => "KQXKpwecFWdlh01qx7R0urzghtjPSWtvQvQ3XhYBsgkKepMzQK",
            "number" => $smsNumber,
            "text" => "Bonjour, votre code de vérification est: ".$code.". Ne communiquez ce code à personne.",
            "sender_id" => "gText",
            "sender_id_value" => "IvoireBox"
        );

        $post_data = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://portal.bulkgate.com/api/1.0/simple/transactional",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

if(!function_exists('getCountryByCode')){
    function getCountryByCode($code){
        $code = strtoupper($code);
        $countryList = array(
            "BD" => "Bangladesh",
            "BE" => "Belgique",
            "BF" => "Burkina Faso",
            "BG" => "Bulgarie",
            "BA" => "Bosnie-Herzégovine",
            "BB" => "Barbade ",
            "WF" => "Wallis et Futuna",
            "BL" => "Saint Barthélémy",
            "BM" => "Bermudes",
            "BN" => "Brunei",
            "BO" => "Bolivie",
            "BH" => "Bahreïn",
            "BI" => "Burundi",
            "BJ" => "Bénin",
            "BT" => "Bhoutan",
            "JM" => "Jamaïque",
            "BV" => "Île Bouvet",
            "BW" => "Botswana",
            "WS" => "Samoa",
            "BQ" => "Pays-Bas caribéens",
            "BR" => "Brésil",
            "BS" => "Bahamas",
            "JE" => "Jersey",
            "BY" => "Belarus",
            "BZ" => "Belize",
            "RU" => "Russie",
            "RW" => "Rwanda",
            "RS" => "Serbia",
            "TL" => "Timor-Leste",
            "RE" => "Reunion",
            "TM" => "Turkménistan",
            "TJ" => "Tadjikistan",
            "RO" => "Roumanie",
            "TK" => "Tokelau",
            "GW" => "Guinée-Bissau",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GS" => "Géorgie du Sud et les Îles Sandwich du Sud",
            "GR" => "Grèce",
            "GQ" => "Guinée équatoriale",
            "GP" => "Guadeloupe",
            "JP" => "Japon",
            "GY" => "Guyane",
            "GG" => "Guernesey",
            "GF" => "Guyane française",
            "GE" => "Géorgie",
            "GD" => "Grenade",
            "GB" => "Royaume-Uni",
            "GA" => " Gabon",
            "SV" => "El Salvador",
            "GN" => "Guinée",
            "GM" => "Gambie",
            "GL" => "Groenland",
            "GI" => "Gibraltar",
            "GH" => "Ghana",
            "OM" => "Oman",
            "TN" => "Tunisie",
            "JO" => "Jordanie",
            "HR" => "Croatie",
            "HT" => "Haïti",
            "HU" => "Hongrie",
            "HK" => "Hong Kong",
            "HN" => "Honduras",
            "HM" => "Îles Heard-et-MacDonald",
            "VE" => "Venezuela",
            "PR" => "Porto Rico",
            "PS" => "Palestine",
            "PW" => "Palau",
            "PT" => "Portugal",
            "SJ" => "Svalbard et Jan Mayen",
            "PY" => "Paraguay",
            "IQ" => "Irak",
            "PA" => "Panama",
            "PF" => "Polynésie française",
            "PG" => "Papouasie-Nouvelle-Guinée",
            "PE" => "Pérou",
            "PK" => "Pakistan",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Pologne",
            "PM" => "Saint Pierre et Miquelon",
            "ZM" => "Zambie",
            "EH" => "Sahara occidental",
            "EE" => "Estonie",
            "EG" => "Egypte",
            "ZA" => "Afrique du Sud",
            "EC" => "Equateur",
            "IT" => "Italie",
            "VN" => "Vietnam",
            "SB" => "Iles Salomon",
            "ET" => "Ethiopie",
            "SO" => " Somalie",
            "ZW" => "Zimbabwe",
            "SA" => "Arabie Saoudite",
            "ES" => "Espagne",
            "ER" => "Erythrée",
            "ME" => "Monténégro",
            "MD" => "Moldova ",
            "MG" => "Madagascar",
            "MF" => "Saint Martin",
            "MA" => "Maroc",
            "MC" => "Monaco",
            "UZ" => "Ouzbékistan",
            "MM" => "Myanmar",
            "ML" => "Mali",
            "MO" => "Macao",
            "MN" => "Mongolie",
            "MH" => "Îles Marshall",
            "MK" => "Macedonia",
            "MU" => "Maurice",
            "MT" => "Malte",
            "MW" => "Malawi",
            "MV" => "Maldives",
            "MQ" => "Martinique",
            "MP" => "Îles Mariannes du Nord",
            "MS" => "Montserrat",
            "MR" => "Mauritanie",
            "IM" => "Île de Man",
            "UG" => "Ouganda",
            "TZ" => "Tanzanie",
            "MY" => "Malaisie",
            "MX" => "Mexico",
            "IL" => "Israël",
            "FR" => "France",
            "IO" => "Territoire britannique de l'océan Indien",
            "SH" => "Sainte-Hélène",
            "FI" => "Finlande",
            "FJ" => "Fidji",
            "FK" => "Iles Falkland",
            "FM" => "Micronésie",
            "FO" => "Iles Féroé",
            "NI" => "Nicaragua",
            "NL" => "Pays-Bas",
            "NO" => "Norvège",
            "NA" => "Namibie",
            "VU" => "Vanuatu",
            "NC" => "Nouvelle-Calédonie",
            "NE" => "Niger",
            "NF" => "Norfolk Island",
            "NG" => "Nigeria",
            "NZ" => " Nouvelle-Zélande",
            "NP" => "Népal",
            "NR" => "Nauru",
            "NU" => "Niué",
            "CK" => "Îles Cook",
            "XK" => "Kosovo",
            "CI" => " Côte d'Ivoire",
            "CH" => "Suisse",
            "CO" => "Colombie",
            "CN" => "Chine",
            "CM" => "Cameroun",
            "CL" => "Chili",
            "CC" => "Iles Cocos",
            "CA" => "Canada",
            "CG" => "République du Congo",
            "CF" => "République Centrafricaine",
            "CD" => "République Démocratique du Congo",
            "CZ" => "République Tchèque",
            "CY" => "Chypre",
            "CX" => "Île Christmas",
            "CR" => "Costa Rica",
            "CW" => "Curaçao",
            "CV" => "Cap-Vert",
            "CU" => "Cuba",
            "SZ" => "Swaziland",
            "SY" => "Syrie",
            "SX" => "Sint Maarten",
            "KG" => "Kirghizistan",
            "KE" => "Kenya",
            "SS" => "Sud Soudan",
            "SR" => "Suriname",
            "KI" => "Kiribati",
            "KH" => "Cambodge",
            "KN" => "Saint-Kitts-et-Nevis",
            "KM" => "Comores",
            "ST" => "Sao Tomé-et-Principe",
            "SK" => "Slovaquie",
            "KR" => "Corée du Sud",
            "SI" => "Slovénie",
            "KP" => "Corée du Nord",
            "KW" => "Koweït",
            "SN" => "Sénégal",
            "SM" => "Saint-Marin",
            "SL" => "Sierra Leone",
            "SC" => "Seychelles",
            "KZ" => "Kazakhstan",
            "KY" => "Iles Caïmans",
            "SG" => "Singapour",
            "SE" => "Suède",
            "SD" => "Soudan",
            "DO" => "République dominicaine",
            "DM" => "Dominique",
            "DJ" => "Djibouti",
            "DK" => "Danemark",
            "VG" => "Îles Vierges britanniques",
            "DE" => "Allemagne",
            "YE" => "Yémen",
            "DZ" => "Algérie",
            "US" => " États-Unis",
            "UY" => "Uruguay",
            "YT" => "Mayotte",
            "UM" => "Îles mineures éloignées des États-Unis",
            "LB" => "Liban",
            "LC" => "Sainte Lucie",
            "LA" => "Laos",
            "TV" => "Tuvalu",
            "TW" => "Taiwan",
            "TT" => "Trinité-et-Tobago",
            "TR" => "Turquie",
            "LK" => "Sri Lanka",
            "LI" => "Liechtenstein",
            "LV" => "Lettonie",
            "TO" => "Tonga",
            "LT" => "Lituanie",
            "LU" => "Luxembourg",
            "LR" => "Liberia",
            "LS" => "Lesotho",
            "TH" => "Thaïlande",
            "TF" => "Terres australes françaises",
            "TG" => "Togo",
            "TD" => "Tchad",
            "TC" => "Îles Turks et Caïques",
            "LY" => "Libye",
            "VA" => "Vatican",
            "VC" => "Saint-Vincent-et-les Grenadines",
            "AE" => "Emirats Arabes Unis",
            "AD" => "Andorre",
            "AG" => "Antigua-et-Barbuda",
            "AF" => "Afghanistan",
            "AI" => "Anguilla",
            "VI" => "Iles Vierges Américaines",
            "IS" => "Islande",
            "IR" => "Iran",
            "AM" => "Arménie",
            "AL" => "Albanie",
            "AO" => "Angola",
            "AQ" => "Antarctique",
            "AS" => "Samoa américaines",
            "AR" => "Argentine",
            "AU" => "Australie",
            "AT" => "Autriche ",
            "AW" => "Aruba",
            "IN" => "Inde",
            "AX" => "Îles Aland",
            "AZ" => "Azerbaïdjan",
            "IE" => "Irlande",
            "ID" => "Indonésie",
            "UA" => "Ukraine",
            "QA" => "Qatar",
            "MZ" => "Mozambique"
        );

        if (!$countryList[$code]) return $code;
        else return $countryList[$code];
    }
}


    if(!function_exists('getUrlPagination')){
        function getUrlPagination(){
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                $url = "https";
            }else{
                $url = "http";
            }
            $url .= "://";
            $url .= $_SERVER['HTTP_HOST'];
            $url .= $_SERVER['REQUEST_URI'];

            if(isset($_GET['page'])){
                $url = explode('&', $url);
                array_pop($url);
                $url = implode('&', $url);
            }
            $url = $url.'&page=';
            return $url;
        }
    }

    if(!function_exists('getDatesFromRange')){
        function getDatesFromRange($start,$end){
            $period = new DatePeriod(
                new datetime($start),
                new DateInterval('P1D'),
                new DateTime($end)
            );
            return $period;
        }
    }



if(!function_exists('getCommune')){
    function getCommune($code){
        $code = strtoupper($code);
        $communeList = array(
            "1" => "ABOBO",
            "2" => "ADJAME",
            "3" => "ANYAMA",
            "4" => "ATTECOUBE",
            "5" => "BASSAM",
            "6" => "BINGERVILLE ",
            "7" => "COCODY",
            "8" => "KOUMASSI",
            "9" => "MARCORY",
            "10" => "PLATEAU",
            "11" => "PORT BOUET",
            "12" => "TREICHVILLE",
            "13" => "YOPOUGON"

        );

        if (!$communeList[$code]) return $code;
        else return $communeList[$code];
    }
}


if(!function_exists('getFrais')){
    function getFrais($code){
        $code = strtoupper($code);
        $fraisList = array(
            "1" => 1000, //ABOBO
            "2" => 1000, //ADJAME
            "3" => 1500, //ANYAMA
            "4" => 1000, //ATTECOUBE
            "5" => 2000, //BASSAM
            "6" => 1500, //BINGERVILLE
            "7" => 1000, //COCODY
            "8" => 1000, //KOUMASSI
            "9" => 1000, //MARCORY
            "10" => 1000, //PLATEAU
            "11" => 1500, //PORT BOUET
            "12" => 1000, //TREICHVILLE
            "13" => 1000, //YOPOUGON

        );

        if (!$fraisList[$code]) return $code;
        else return $fraisList[$code];
    }
}


if(!function_exists('getEtatCourse')){
    function getEtatCourse($code){
        $code = strtoupper($code);
        $etatList = array(
            "0" => '<span class="badge-red">En attente</span>',
            "1" => '<span class="badge-blue">En cours</span>',
            "2" => '<span class="badge-green">Livrée</span>',
            "3" => '<span class="badge-grey">Non livrée</span>'
        );

        if (!$etatList[$code]) return $code;
        else return $etatList[$code];
    }
}

if(!function_exists('getUserStatut')){
    function getUserStatut($code){
        $code = strtoupper($code);
        $etatList = array(
            "0" => 'Editeur',
            "1" => 'Admin'
        );

        if (!$etatList[$code]) return $code;
        else return $etatList[$code];
    }
}

if(!function_exists('getStatutCmd')){
    function getStatutCmd($code){
        $code = strtoupper($code);
        $etatList = array(
            "0" => '<span class="badge-red">En attente</span>',
            "1" => '<span class="badge-blue">En cours</span>',
            "2" => '<span class="badge-green">Livrée</span>',
        );

        if (!$etatList[$code]) return $code;
        else return $etatList[$code];
    }
}