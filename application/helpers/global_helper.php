<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

if (! function_exists('hari')) {
    function hari($tanggal)
    {
        $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $hari = date("w", strtotime($tanggal));
        return $seminggu[$hari];
    }
}

if (! function_exists('bulan')) {
    function bulan($tanggal)
    {
        $bulan = array('01' => "Januari", '02' => "Februari", '03' => "Maret", '04' => "April", '05' => "Mei", '06' => "Juni", '07' => "Juli", '08' => "Agustus", '09' => "September", '10' => "Oktober", '11' => "November", '12' => "Desember");
        $exptanggal = explode('-', $tanggal);

        return $bulan[$exptanggal[1]];
    }
}

if (! function_exists('bulan_short')) {
    function bulan_short($tanggal)
    {
        $bulan = array('01' => "Jan", '02' => "Feb", '03' => "Mar", '04' => "Apr", '05' => "Mei", '06' => "Jun", '07' => "Jul", '08' => "Agst", '09' => "Sep", '10' => "Okt", '11' => "Nov", '12' => "Des");
        $exptanggal = explode('-', $tanggal);

        return $bulan[$exptanggal[1]];
    }
}

if (! function_exists('tanggal')) {
    function tanggal($tanggal)
    {
        $bulan = array('01' => "Januari", '02' => "Februari", '03' => "Maret", '04' => "April", '05' => "Mei", '06' => "Juni", '07' => "Juli", '08' => "Agustus", '09' => "September", '10' => "Oktober", '11' => "November", '12' => "Desember");
        $exptanggal = explode('-', $tanggal);

        return $exptanggal[2] . ' ' . $bulan[$exptanggal[1]] . ' ' . $exptanggal[0];;
    }
}

// if (! function_exists('load_languages')) {
//     /**
//      * load bahasa berdasarkan paramater
//      * @param  string $lang
//      */
//     function load_languages($lang) { 
//         $CI =& get_instance();
//         if ($lang === 'en' || $lang === 'id') {
//             $CI->lang->load('message',$lang);
//             $CI->lang->load('template',$lang);
//             $CI->lang->load('form_validation', $lang);
//             $CI->lang->load('calendar', $lang);
//         } else {
//             $CI->lang->load('message',$CI->config->item('language'));
//             $CI->lang->load('template',$CI->config->item('language'));
//             $CI->lang->load('form_validation',$CI->config->item('language'));
//             $CI->lang->load('calendar', $CI->config->item('language'));
//         }
//     }
// }



// if (! function_exists('base_variabel')) {
//     function base_variabel() { 
//         // $CI =& get_instance();
//         // $language = ($CI->uri->segment(1) !== 'en') ? $language = 'id': $language = 'en';
//         // $CI->load->model('info_mod');
        
//         // if($language =='id') { 
//         //     $info_title = 'Info Terbaru'; 
//         // } elseif ($language =='en') { 
//         //     $info_title = 'Latest Info'; 
//         // } elseif ($language == 'jw') { 
//         //     $info_title = 'Info Paling Anyar'; 
//         // }

//         // $data = array(
//         //     'info'          => $CI->info_mod->info_publish($language, 6, 0),
//         //     'info_title'    => $info_title,
//         // );

//         return "xx";
//     }
// }
