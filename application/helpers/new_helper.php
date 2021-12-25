<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('ReturnJsonSimple'))
{
    function ReturnJsonSimple(bool $success, string $head, string $text)
    {
        header('Content-Type: application/json');
        $arr =    array(
            "success" => $success,
            "head" => $head,
            "text" => $text,
            );
        echo json_encode( $arr );
        return;
    }
   
}
if ( ! function_exists('LoadDataAwal'))
{
    function LoadDataAwal($pageTitle)
    {
        $CI = &get_instance();
        $data['page_title'] = $pageTitle;
        $data['nama'] = $CI->session->userdata('nama');
        $data['status'] = $CI->session->userdata('status');
        $data['userid'] = $CI->session->userdata('userid');
        $data['tokoid'] = $CI->session->userdata('tokoid');
        $data['username'] = $CI->session->userdata('username');
        $data['email'] = $CI->session->userdata('email');
        $data['error'] = $CI->session->flashdata('error');
        return $data;
    }  
   
}

if ( ! function_exists('NumberNice'))
{
    function NumberNice($n) {
        // first strip any formatting;
        $n = (0+str_replace(",","",$n));
       
        // is this a number?
        if(!is_numeric($n)) return false;
       
        // now filter it;
        if($n>1000000000000) return round(($n/1000000000000),1).' T';
        else if($n>1000000000) return round(($n/1000000000),1).' M';
        else if($n>1000000) return round(($n/1000000),1).' Juta';
        else if($n>1000) return round(($n/1000),1).' Ribu';
       
        return number_format($n);
    }
   
}