<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * File name: Code Helper File
 * Created date: 12/10/2018
 * Author: Youness Bougteb
 * License: Sky Time Digital
 * Website: www.skytimedigital.com
 */

if ( ! function_exists('csn'))
{
    function csn($lib)
    {
        $code =& get_instance();
        $code->load->library($lib);       
        return $code;
    }
}
if ( ! function_exists('image_check'))
{
    function image_check($path, $image)
    {
        $file = $path.$image;
        $fallback = $path.'avatar.png';
        $result = getimagesize($file);
        $mime = $result["mime"];
        $allowed['image/gif'] = 'gif';
        $allowed['image/png'] = 'png';
        $allowed['image/jpeg'] = 'jpg';
        $allowed['image/jpeg'] = 'jpeg';

        if(file_exists($file) && $mime != '' && isset($allowed[strToLower($mime)])) {
            $type = $allowed[strToLower($mime)];
        } else {
            $file = $fallback;
            $type = 'image/png';
        }
        
        header("Content-type: {$type}");
        return readfile($file);
    }
}
/*
 * text message and alert is bootstrap class 
 * (e.g., success)
 */

if ( ! function_exists('alert'))
{
	function alert($message, $alert)
	{
        $flash = array(
            'message'   => $message,
            'class'     => $alert
        );
        return csn('session')->session->set_flashdata($flash);
    }
}

// form fields validation
if ( ! function_exists('rules'))
{
    function rules($field, $name, $condition)
    {
        return csn('form_validation')->form_validation->set_rules($field, $name, $condition);
    }
}

// hashing password after determining the appropriate cost
if ( ! function_exists('hashed'))
{
    function hashed($password)
    {
        $options = ['cost' => 10];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}

if ( ! function_exists('auth'))
{

    function auth($selected_page_name = "") 
    {
        if(!csn('session')->session->userdata('is_logged_in'))
		{
            alert('Access Denied!','danger');
			redirect('user/login');
			exit;
        }
	}
}