<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// translation
if ( ! function_exists('trans')):
	function trans($phrase){
        $translate_phrase = $phrase;
	    $ci =& get_instance();
		$ci->load->helper('language');
		$active_language = $ci->language_model->get_active_language();
		$ci->lang->load('site_lang',$active_language);
		$ci->config->set_item('language', $active_language);
        if($ci->lang->line($phrase) === FALSE):
            //$ci->language_model->create_phrase($active_language,$phrase);
            $translate_phrase = ucfirst(str_replace("_", " ", $phrase));         
        else:
            $translate_phrase = $ci->lang->line($phrase,FALSE);
        endif;
	    return $translate_phrase;
    }
endif;

// configuration helper
if (! function_exists('ovoo_config')):
	function ovoo_config($title)
    {
    	$ci =& get_instance();
        return $ci->common_model->get_config($title);
    }
endif;

// theme helper
if (! function_exists('active_theme')):
	function active_theme()
    {
    	$ci =& get_instance();
        return $ci->common_model->get_active_theme();
    }
endif;

//generate slug
if (!function_exists('str_slug')) {
    function str_slug($str)
    {
        return url_title($str, "-", true);
    }
}

function validate_user_menu_for_controller($param=array()) {
     $ci =& get_instance();
    $ci->load->model('common_model');
    $msg='';
  if($ci->session->userdata('publisher_is_login') == 1){
         $result =$ci->common_model->validate_user_menu($param);
       if(!$result){
           return false;
        }
   return TRUE;
   }else  if ($ci->session->userdata('admin_is_login') == 1){
       return true;
   }
}
function validate_user_menu($param,$main_menu=0) {
    $ci =& get_instance();
    $ci->load->model('common_model');
    $msg='';
  if($ci->session->userdata('publisher_is_login') == 1){
         $result =$ci->common_model->validate_user_menu($param);
       if(!$result){
           return 'display:none';
        }
   return '';
   }else  if ($ci->session->userdata('admin_is_login') == 1){
       return 'admin';
   }
}
function clean($string) {
    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}