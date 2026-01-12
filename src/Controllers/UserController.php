<?php

namespace App\Controllers;

class UserController {
    private $apiKey;
    private $urlTemplate;

    public function __construct() {
        $this->apiKey = $_ENV['IP2LOCATION_API_KEY'];
        $this->urlTemplate = 'https://api.ip2location.io/?ip=%s&key=' . $this->apiKey . '&format=json';
    }

    public function getIPAddress() {  
        if(isset($_SERVER['HTTP_CLIENT_IP'])) {  
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];  
        }  
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        else{  
            $ipAddress = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ipAddress;  
    }

    public function getUserLocation() {
        $ipAddress = $this->getIPAddress();

        if(isset($_SESSION['userLocation']) && 
            (isset($_SESSION['userLocation']['ipAddress']) && $_SESSION['userLocation']['ipAddress'] == $ipAddress)) 
        {
            return $_SESSION['userLocation'];
        } else {
            $urlToCall = sprintf( $this->urlTemplate, $ipAddress);
            $rawJson = file_get_contents( $urlToCall );
            $data = json_decode( $rawJson, true );

            if (isset($data['city_name'])) {
                if ($data['city_name'] != '-') {
                    $this->setUserLocationSession($data);
                    return $data;
                }
                else {
                    $data = array('ipAddress' => $ipAddress, 'city_name' => 'Localhost', 'region_name' => 'Localhost', 'country_name' => 'Localhost');
                    $this->setUserLocationSession($data);
                    return array($data);
                }
            } else {
                die('IP Address parsing error!');
            }
        }
    }

    private function setUserLocationSession($data) {
        $_SESSION['userLocation'] = $data;
    }
}