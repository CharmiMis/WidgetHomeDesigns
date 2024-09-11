<?php

namespace App\Lib\Curl;

class CurlRequestClass
{
    public function __construct()
    {

    }

    /**
     * Order Detail by id
     */
    public function curlRequests($url, $headers, $data, $method)
    {
        $curloptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 70,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ];

        if (isset($headers) && (count($headers) > 0)) {
            $curloptions[CURLOPT_HTTPHEADER] = $headers;
        }
        if (isset($data) && (! empty($data))) {
            $curloptions[CURLOPT_POSTFIELDS] = $data;
        }
        $curl = curl_init();
        curl_setopt_array($curl, $curloptions);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            \Log::error('curl-error from CurlRequestClass====>'.$err);

            return ['success' => false, 'message' => $err];
        } else {
            $response = json_decode($response);
            if (isset($response->error)) {
                \Log::error('api-error from CurlRequestClass====>'.json_encode($response));

                return ['success' => false, 'message' => $response->error];
            } else {
                return $response;
            }
        }
    }

    public function serverLessCurlRequests($url, $payload)
    {
        set_time_limit(320);
        $bearer_token = config('app.RUNPOD_SERVERLESS_TOKEN');

        $headers = [
            'Authorization: Bearer '.$bearer_token,
            'Content-Type: application/json',
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 320);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($error == CURLE_OPERATION_TIMEDOUT) {
            return ['success' => false, 'message' => 'Maximum Execution timeout Error'];
        }

        // if ($http_status == 200) {
        //     $data = json_decode($response, true);
        //     return $data;
        // } else {
        //     $data = json_decode($response, true);
        //     return $data;
        // }
        return json_decode($response, true);
    }

    public function serverLessMultiCurlRequests(array $urls, array $payloads)
    {
        set_time_limit(320);
        $bearer_token = config('app.RUNPOD_SERVERLESS_TOKEN');
        $headers = [
            'Authorization: Bearer '.$bearer_token,
            'Content-Type: application/json',
        ];

        $multiHandler = curl_multi_init();
        $ch = [];
        $responses = [];
        foreach ($urls as $index => $url) {
            $ch[$index] = curl_init($url);
            curl_setopt($ch[$index], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch[$index], CURLOPT_POST, true);
            curl_setopt($ch[$index], CURLOPT_POSTFIELDS, json_encode($payloads[$index]));
            curl_setopt($ch[$index], CURLOPT_HTTPHEADER, $headers);
            curl_multi_add_handle($multiHandler, $ch[$index]);
        }

        $active = null;
        do {
            $status = curl_multi_exec($multiHandler, $active);
            if ($status > 0) {
                // Handle error
                break;
            }
        } while ($active);

        foreach ($urls as $index => $url) {
            $response = curl_multi_getcontent($ch[$index]);
            $http_status = curl_getinfo($ch[$index], CURLINFO_HTTP_CODE);
            if ($http_status == 200) {
                $data = json_decode($response, true);
                $responses[$index] = $data;
            } else {
                $data = json_decode($response, true);
                $responses[$index] = $data;
            }
            curl_multi_remove_handle($multiHandler, $ch[$index]);
            curl_close($ch[$index]);
        }

        curl_multi_close($multiHandler);

        return $responses;
    }
}
