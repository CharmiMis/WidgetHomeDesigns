<?php

namespace App\Lib\FastSpring;

use Exception;

class FastSpring
{
    public $api_username = 'KYOYQFAFTJGRETSQCD77PQ';

    public $api_password = '336rEjxFQCmNiXiz6J0OQQ';

    public function __construct()
    {
        $this->api_password = config('app.FS_USERNAME');
        $this->api_password = config('app.FS_PASSWORD');
    }

    public function callFSApi($url, $type = 'GET')
    {

        $curl = curl_init();

        $apiCredential = $this->apiCredential();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_HTTPHEADER => [
                'accept: application/json',
                "authorization: Basic {$apiCredential}",
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            throw new Exception($err);
        }

        curl_close($curl);

        return $response;
    }

    /**
     * encode username password
     */
    public function apiCredential()
    {

        return base64_encode($this->api_username.':'.$this->api_password);
    }

    public function callPostFieldFSApi($url, $type, $post_data)
    {
        $curl = curl_init();
        $apiCredential = $this->apiCredential();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => [
                'accept: application/json',
                "authorization: Basic {$apiCredential}",
                'content-type: application/json',
            ],
        ]);

        $response = curl_exec($curl);

        // if ($response === false) {
        // 	$error = curl_error($curl);
        // 	throw new Exception("cURL error: " . $error);
        // }

        // $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // if ($http_code >= 400) {
        // 	$error_message = json_decode($response, true);
        // 	throw new Exception("API Error: " . $error_message['error']['message']);
        // }

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            throw new Exception($err);
        } else {
            return $response;
        }
    }
}
