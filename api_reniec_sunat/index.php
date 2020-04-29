<?php
/**
 * PHP Script Reniec_Sunat
 * @author Erick Meza
 * @package cURL_Json_on_Cache
 * @version beta-0.1
 */

// Define constants
if(!defined('DIR_API')) define('DIR_API', dirname(__FILE__));
if(!defined('DIR_CCH')) define('DIR_CCH', DIR_API.'/cache/');

// Load Script
require_once DIR_API.'/remote.php';

// Get Info
$zone = isset($_REQUEST["zone"]) ? $_REQUEST["zone"] : '';
$idnu = isset($_REQUEST["idnu"]) ? $_REQUEST["idnu"] : '';

// Verify GET or POST data
if(!$zone || !$idnu){
    $response = [
        'success' => false,
        'message' => 'incomplete_data'
    ];
} else {
    $response = Remote_Json::get_data($zone,$idnu);
}

// Filter Response
if(is_array($response)){
    $response = json_encode($response);
}

// Json PHP header
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");
header("Cache-Control: no-cache, must-revalidate");

// The Response
echo $response;

// Kill proccess
die();
