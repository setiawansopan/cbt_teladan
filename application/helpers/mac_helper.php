<?php

function get_mac() {
    //cari mac adress client
    $_IP_SERVER = $_SERVER['SERVER_ADDR'];
    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];

    if($_IP_ADDRESS == $_IP_SERVER)
    {
        ob_start();
        system('ipconfig /all');
        $_PERINTAH  = ob_get_contents();
        ob_clean();
        $_PECAH = strpos($_PERINTAH, "Physical");
        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
        $mac =  $_HASIL;  
    } else {
        $_PERINTAH = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
        ob_clean();
        $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
        $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
        $_HASIL = substr($_PECAH_STRING[1], 0, 17);
        $mac = $_HASIL;
    }

    return $mac;
}
?>