<?php

namespace App\Lib\FastSpring;

use App\Models\UserSubscription;

class SubscriptionClass
{
    public $fastSpring = null;

    public function __construct()
    {
        $this->fastSpring = new FastSpring();
    }

    /**
     * Subscription Detail by id
     */
    public function getSubscription($subscription_id)
    {

        $url = "https://api.fastspring.com/subscriptions/{$subscription_id}";
        $response = $this->fastSpring->callFSApi($url, 'GET');

        return json_decode($response, true);
    }

    /**
     * Is subscription active
     */
    public function isSubActive(array $subscription)
    {
        // try {

            if (isset($subscription['active'])) {
                return $subscription['active'];
            }

            return false;
        // } catch (\Throwable $th) {

        //     return false;
        // }
    }

    /**
     * Get Plan from subscription detail
     */
    public function getPlan(array $subscription)
    {
        // try {

            if (isset($subscription['product'])) {
                return $subscription['product'];
            }

            return 'free_plan';
        // } catch (\Throwable $th) {

        //     return 'free_plan';
        // }
    }

    /** Cancel subscription */
    public function cancelSubscription($subscription_id)
    {
        $url = "https://api.fastspring.com/subscriptions/{$subscription_id}";
        $response = $this->fastSpring->callFSApi($url, 'DELETE');

        return json_decode($response, true);
    }

    public function getPlanCredits($plan)
    {
        $currentLeftCredit = 0;
        // START-- REMOVE CODE THAT ADDING OLD CREDITS WHILE RENEWING THE SUBSCRIPTION PLAN
        // $currentCredit = UserSubscription::select('total_plan_credit', 'used_credit')
        //     ->where('user_id', $userId)
        //     ->where('is_api_plan', 1)
        //     ->latest()->first();
        // if($currentCredit != null){
        //     $currentLeftCredit = $currentCredit->total_plan_credit - $currentCredit->used_credit;
        // }
        // END-- REMOVE CODE THAT ADDING OLD CREDITS WHILE RENEWING THE SUBSCRIPTION PLAN

        $plan_credit = null;
        switch ($plan) {
            case 'api-bronze':
                $plan_credit = $currentLeftCredit + config('app.API_BRONZE_CREDIT');
                break;
            case 'api-silver':
                $plan_credit = $currentLeftCredit + config('app.API_SILVER_CREDIT');
                break;
            case 'api-gold':
                $plan_credit = $currentLeftCredit + config('app.API_GOLD_CREDIT');
                break;
            case 'standard-sme':
                $plan_credit = $currentLeftCredit + config('app.API_SME_CREDIT');
                break;
            case 'standard-sme-new':
                $plan_credit = $currentLeftCredit + config('app.API_SME_NEW_CREDIT');
                break;
            case 'standard-sme-500-api-calls-mo':
                $plan_credit = $currentLeftCredit + config('app.API_SME_500_API_PER_MONTH_CREDIT');
                break;
            case 'standard-sme-1000-api-calls-mo':
                $plan_credit = $currentLeftCredit + config('app.API_SME_1000_API_PER_MONTH_CREDIT');
                break;
            case 'standard-sme-3000-api-calls-mo':
                $plan_credit = $currentLeftCredit + config('app.API_SME_3000_API_PER_MONTH_CREDIT');
                break;
            case 'standard-sme-10000-api-calls-mo':
                $plan_credit = $currentLeftCredit + config('app.API_SME_10000_API_PER_MONTH_CREDIT');
                break;
            default:
                $plan_credit = 0;
                break;
        }

        return $plan_credit;
    }

    public function getProratedPlanChange($subscription_id, $product)
    {
        $url = 'https://api.fastspring.com/subscriptions';
        // $post_data = json_encode([
        // 	'subscription' => $subscription_id,
        //     "prorate" => true,
        // 	'product' => $product,
        // ]);
        $post_data = json_encode([
            'subscriptions' => [
                [
                    'subscription' => $subscription_id,
                    'prorate' => 'true',
                    'product' => $product,
                ],
            ],
        ]);
        $response = $this->fastSpring->callPostFieldFSApi($url, 'POST', $post_data);

        return json_decode($response, true);
    }

    public function pauseActiveSubscription($subscription_id, $pausePeriodCount)
    {
        $url = 'https://api.fastspring.com/subscriptions/'.$subscription_id.'/pause';
        $post_data = json_encode([
            'pausePeriodCount' => $pausePeriodCount,
        ]);
        $response = $this->fastSpring->callPostFieldFSApi($url, 'POST', $post_data);

        return json_decode($response, true);
    }

    public function cancelPausedSubscription($subscription_id)
    {
        $url = 'https://api.fastspring.com/subscriptions/'.$subscription_id.'/resume';
        $post_data = json_encode([]);
        $response = $this->fastSpring->callPostFieldFSApi($url, 'POST', $post_data);

        return json_decode($response, true);
    }

    public function cancelActiveSubscription($subscription_id)
    {
        $url = 'https://api.fastspring.com/subscriptions/'.$subscription_id;
        $response = $this->fastSpring->callPostFieldFSApi($url, 'DELETE', null);

        return json_decode($response, true);
    }

    public function resumeCancelledSubscription($subscription_id, $deactivation = null)
    {
        $url = 'https://api.fastspring.com/subscriptions/'.$subscription_id;
        $post_data = json_encode([
            'subscriptions' => [
                [
                    'subscription' => $subscription_id,
                    'deactivation' => $deactivation,
                ],
            ],
        ]);
        $response = $this->fastSpring->callPostFieldFSApi($url, 'POST', $post_data);

        return json_decode($response, true);
    }

    // public function SetAnEndDateAndNumberOfRemainingPeriodsForSubscription($subscription_id, $end = null, $remainingPeriods = 4){
    //     $url = "https://api.fastspring.com/subscriptions/".$subscription_id;
    //     $post_data = json_encode([
    //         "subscriptions" => [
    //             [
    //                 "subscription" => $subscription_id,
    //                 "end" => $end,
    //                 "isEndDateSet" => true,
    //                 // "remainingPeriods" => $remainingPeriods
    //             ]
    //         ]
    //     ]);
    //     $response = $this->fastSpring->callPostFieldFSApi($url,'POST',$post_data);
    //     return json_decode($response, true);
    // }

    public function DelayNextBillingCycle($subscription_id, $next = null, $remainingPeriods = 4)
    {

        $url = 'https://api.fastspring.com/subscriptions/'.$subscription_id;
        $post_data = json_encode([
            'subscriptions' => [
                [
                    'subscription' => $subscription_id,
                    'next' => $next,
                    'isEndDateSet' => true,
                    // "remainingPeriods" => $remainingPeriods
                ],
            ],
        ]);
        $response = $this->fastSpring->callPostFieldFSApi($url, 'POST', $post_data);

        return json_decode($response, true);
    }
}
