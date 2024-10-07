<?php

namespace App\Class;

class WebhookClass
{
    public function getEventType($data)
    {
        if (isset($data['events'][0]['type'])) {
            return $data['events'][0]['type'];
        }
    
        return false;
    }

    public function subscriptionId($data)
    {
        if (isset($data['events'][0]['data']['id'])) {
            return $data['events'][0]['data']['id'];
        }
    
        return false;
    }

    public function customerDetails($data)
    {
        if($data['events'][0]['data']['customer']){
            $customers = [
                'first_name' => $data['events'][0]['data']['customer']['first'] ?? '',
                'last_name' => $data['events'][0]['data']['customer']['last'] ?? '',
                'email' => $data['events'][0]['data']['customer']['email'] ?? '',
            ];

            return $customers;
        }

        return false;
    }
}
