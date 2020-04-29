<?php if(!defined('DIR_API')) die;
/**
 * PHP Script Reniec_Sunat
 * @author Erick Meza
 * @package cURL_Json_on_Cache
 * @version beta-0.1
 */

// Remote data from SUNAT or RENIEC
class Remote_Json{

    // vars
    protected static $time   = 604800;
    protected static $reniec = 'https://api.reniec.cloud/dni/';
    protected static $sunat  = 'https://api.sunat.cloud/ruc/';

    // get data
    public static function get_data($zone = '', $idnun = ''){
        // Set response
        $response = [];
        // yes only yes
        if($zone == 'reniec' || $zone == 'sunat'){
            if(is_numeric($idnun)){
                // Set Label file
                $filen    = $zone.'/'.$idnun;
                $response = self::get_cache($filen);
                // Is cache
                if(!$response){
                    // Switching API URL
                    switch ($zone) {
                        case 'reniec':
                            $api_data = self::api_curl(self::$reniec.$idnun);
                            $api_rest = json_decode($api_data);
                            $api_rest = !empty($api_rest->cui) ? true : false;
                            break;

                        case 'sunat':
                            $api_data = self::api_curl(self::$sunat.$idnun);
                            $api_rest = json_decode($api_data);
                            $api_rest = !empty($api_rest->ruc) ? true : false;
                            break;
                    }
                    // Verify Api Rest
                    if(!$api_rest){
                        $response = [
                            'success' => false,
                            'message' => 'id_number_invalid'
                        ];
                    } else {
                        self::set_cache($filen,$api_data);
                        $response = $api_data;
                    }
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'only_numerical_value'
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'unknown_zone'
            ];
        }
        // The Response
        return $response;
    }

    // Get Data On cache
    private static function get_cache($label = ''){
        if(self::is_cached($label)){
            return file_get_contents(DIR_CCH.$label);
        }
        return false;
    }

    // Update cache
    private static function set_cache($label = '', $data = ''){
        file_put_contents(DIR_CCH.$label, $data);
    }

    // Is cached
    private static function is_cached($label = ''){
        $file = DIR_CCH.$label;
        if(file_exists($file) && (filemtime($file) + self::$time >= time())) return true;
        return false;
    }

    // Remote data
    private static function api_curl($url = ''){
        if(function_exists("curl_init")){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			$content = curl_exec($ch);
			curl_close($ch);
			return $content;
		} else {
			return file_get_contents($url);
		}
    }
}


// End Script
