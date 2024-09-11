<?php

namespace App\Lib\FastSpring;

class AccountClass
{
    public $fastSpring = null;

    public function __construct()
    {
        $this->fastSpring = new FastSpring();
    }

    /**
     * Order Detail by id
     */
    public function getAccount($account_id)
    {

        $url = "https://api.fastspring.com/accounts/{$account_id}";
        $response = $this->fastSpring->callFSApi($url, 'GET');

        $orderDetail = json_decode($response, true);

        if ($orderDetail['result'] != 'success') {
            return false;
        }

        return $orderDetail;
    }
}
