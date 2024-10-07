<?php

namespace App\Class;

use App\Lib\ConvertKit\ConvertKit;
use App\Models\UserSubscription;

class UserSubClass
{
    public $user;

    public $convertKit;

    public function __construct($user)
    {
        $this->user = $user;
        $this->convertKit = new ConvertKit();
    }

    public function apply()
    {
        $this->addPlan('free');
    }

    public function addPlan($plan_name, $clickBankFreeTagPlan = 0)
    {
        $UserSubscription = [
            'user_id' => $this->user->id,
            'plan_id' => 0,
            'plan_name' => $plan_name,
            'order_id' => '',
            'is_active' => 1,
            'exp_date' => null,
        ];

        UserSubscription::create($UserSubscription);

        $ck_sub = [
            'email' => $this->user->email,
            'name' => $this->user->name,
        ];
        if ($clickBankFreeTagPlan == 1) {
            $tag_id = config('app.CLICK_FREE_TAG');
        } else {
            $tag_id = $this->convertKit->getTagIdByPlanName($plan_name);
        }
        if ($this->user->email_verified_at !== null) {
            $this->convertKit->addSubscriber($tag_id, $ck_sub);
        }
    }

    public function getSubscription($id)
    {
        return UserSubscription::find($id);
    }

    public function inActiveUserSubscription($id)
    {
    }

    public function sendProvelyNotification($user)
    {

        $post_data = [
            'first_name' => $user->name,
            'last_name' => '',
            'email' => $user->email,
            'ip' => request()->ip(),
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://app.provely.io/api/webhooks/495bfa80-320d-46dc-adc2-a40aadf091d6/custom',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_data,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
