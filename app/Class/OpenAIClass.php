<?php

namespace App\Class;

use App\Trait\AppTrait;

class OpenAIClass
{
    use AppTrait;

    // public $convertKit;
    // public $subscriptionClass;
    // public $orderClass;
    // public function __construct()
    // {
    //     $this->convertKit = new ConvertKit();
    //     $this->subscriptionClass = new SubscriptionClass();
    //     $this->orderClass = new OrderClass();
    // }
    public function openAICurlRequests($url, $headers, $data, $method)
    {
        $curloptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 70,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ];

        if (isset($headers) && (count($headers) > 0)) {
            $curloptions[CURLOPT_HTTPHEADER] = $headers;
        }
        if (isset($data) && (! empty($data))) {
            $curloptions[CURLOPT_POSTFIELDS] = json_encode($data);
        }
        $curl = curl_init();
        curl_setopt_array($curl, $curloptions);

        $response = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return ['success' => false, 'message' => $err];
        } else {
            $response = json_decode($response);
            if (isset($response->error)) {
                return ['success' => false, 'message' => $response->error->message];
            } else {
                return ['success' => true, 'data' => $response];
            }
        }
    }
}
