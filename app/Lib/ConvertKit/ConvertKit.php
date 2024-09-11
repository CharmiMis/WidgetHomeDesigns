<?php

namespace App\Lib\ConvertKit;

use App\Trait\AppTrait;
use Illuminate\Support\Facades\Log;

class ConvertKit
{
    use AppTrait;

    public $api_base_url = 'https://api.convertkit.com/v3/';

    public $api_key = null;

    public $api_secret = null;

    public function __construct()
    {
        $this->api_key = config('app.CK_KEY');
        $this->api_secret = config('app.CK_SECRET');
    }

    /**
     * Get Tag ID By Tag name
     */
    public function getTagIdByPlanName($plan)
    {
        $tag_id = null;
        switch ($plan) {
            case 'free_plan':
                $tag_id = $this->getCKTagId('TAG_FREE_PLAN');
                break;
            case 'individual':
                $tag_id = $this->getCKTagId('TAG_INDIVIDUAL_PLAN');
                break;
            case 'homedesignsai-pro':
                $tag_id = $this->getCKTagId('TAG_PRO_PLAN');
                break;
            case 'homedesignsai-pro-7-days-trial':
                $tag_id = $this->getCKTagId('TAG_PRO_PLAN');
                break;
            case 'homedesignsai-teams':
                $tag_id = $this->getCKTagId('TAG_TEAMS_PLAN');
                break;
            case 'homedesignsai-teams-seven-days-trial':
                $tag_id = $this->getCKTagId('TAG_TEAMS_PLAN');
                break;
            case 'free_limit_reached':
                $tag_id = $this->getCKTagId('TAG_FREE_LIMIT_REACHED');
                break;
            case 'homedesignsai-individual':
                $tag_id = $this->getCKTagId('TAG_INDIVIDUAL_PLAN');
                break;
            case 'individual-lifetime':
                $tag_id = $this->getCKTagId('TAG_Individual_Plan_Onetime');
                break;
            case 'pro-lifetime':
                $tag_id = $this->getCKTagId('TAG_Pro_Plan_Onetime');
                break;
            case 'teams-lifetime':
                $tag_id = $this->getCKTagId('TAG_Teams_Plan_Onetime');
                break;
            case 'individual-yearly':
                $tag_id = $this->getCKTagId('TAG_INDIVIDUAL_Plan_Yearly');
                break;
            case 'pro-yearly':
                $tag_id = $this->getCKTagId('TAG_Pro_Plan_Yearly');
                break;
            case 'teams-yearly':
                $tag_id = $this->getCKTagId('TAG_Teams_Plan_Yearly');
                break;
            case 'homedesignsai-pro-3-days-trial':
                $tag_id = $this->getCKTagId('TAG_Pro_Plan_3_Days');
                break;
            case 'homedesignsai-teams-three-days-trial':
                $tag_id = $this->getCKTagId('TAG_Teams_Plan_3_Days');
                break;
            case 'premium-precision-upgrade':
                $tag_id = $this->getCKTagId('TAG_Precision_Plan');
                break;
            case 'premium-precision-upgrade-plus':
                $tag_id = $this->getCKTagId('TAG_Premium_Upgrade_Plus');
                break;
            case 'api-bronze':
                $tag_id = $this->getCKTagId('TAG_API_BRONZE');
                break;
            case 'api-silver':
                $tag_id = $this->getCKTagId('TAG_API_SILVER');
                break;
            case 'api-gold':
                $tag_id = $this->getCKTagId('TAG_API_GOLD');
                break;
            case 'homedesignsai-individual-yearly-toggle':
                $tag_id = $this->getCKTagId('TAG_HOMEDESIGNSAI_INDIVIDUAL_YEARLY_TOGGLE');
                break;
            case 'homedesignsai-pro-yearly-toggle':
                $tag_id = $this->getCKTagId('TAG_HOMEDESIGNSAI_PRO_YEARLY_TOGGLE');
                break;
            case 'standard-sme-500-api-calls-mo':
                $tag_id = $this->getCKTagId('TAG_API_PLAN');
                break;
            case 'standard-sme-1000-api-calls-mo':
                $tag_id = $this->getCKTagId('TAG_API_PLAN');
                break;
            case 'standard-sme-3000-api-calls-mo':
                $tag_id = $this->getCKTagId('TAG_API_PLAN');
                break;
            case 'standard-sme-10000-api-calls-mo':
                $tag_id = $this->getCKTagId('TAG_API_PLAN');
                break;
            default:
                $tag_id = $this->getCKTagId('TAG_FREE_PLAN');
                break;
        }

        return $tag_id;
    }

    public function getCancelTagIdByPlanName($plan)
    {
        $cancel_tag_id = null;
        switch ($plan) {
            case 'free_plan':
                $cancel_tag_id = $this->getCKTagId('TAG_CANCEL_TRIAL');
                break;
            case 'individual':
                $cancel_tag_id = $this->getCKTagId('TAG_CANCEL_INDIVIDUAL_PLAN');
                break;
            case 'homedesignsai-pro':
                $cancel_tag_id = $this->getCKTagId('TAG_CANCEL_PRO_PLAN');
                break;
            case 'homedesignsai-teams':
                $cancel_tag_id = $this->getCKTagId('TAG_CANCEL_TEAMS_PLAN');
                break;
            default:
                $cancel_tag_id = $this->getCKTagId('TAG_CANCEL_TRIAL');
                break;
        }

        return $cancel_tag_id;
    }

    public function getTagIdByOptionsValue($value)
    {
        $options_tag_id = null;
        switch ($value) {
            case 'professional':
                $options_tag_id = $this->getCKOptionsTagId('PROFESSIONAL_TAG');
                break;
            case 'personal':
                $options_tag_id = $this->getCKOptionsTagId('PERSONAL_TAG');
                break;
            case 'interior_design':
                $options_tag_id = $this->getCKOptionsTagId('INTERIOR_DESIGN_TAG');
                break;
            case 'architecture':
                $options_tag_id = $this->getCKOptionsTagId('ARCHITECTURE_TAG');
                break;
            case 'real_estate':
                $options_tag_id = $this->getCKOptionsTagId('REAL_ESTATE_TAG');
                break;
            case 'construction':
                $options_tag_id = $this->getCKOptionsTagId('CONSTRUCTION_TAG');
                break;
            case 'landscaping':
                $options_tag_id = $this->getCKOptionsTagId('LANDSCAPING_TAG');
                break;
            case 'furniture_building':
                $options_tag_id = $this->getCKOptionsTagId('FURNITURE_BUILDING_TAG');
                break;
            default:
                $options_tag_id = '';
                break;
        }

        return $options_tag_id;
    }

    /**
     * Add Subscriber to tag by tag id
     */
    public function getTagIdByClickItemNumber($itemNo)
    {
        $click_tag_id = null;
        switch ($itemNo) {
            case '1':
                $click_tag_id = $this->getCKClickTagId('CLICK_INDIVIDUAL_TAG');
                break;
            case '2':
                $click_tag_id = $this->getCKClickTagId('CLICK_PRO_TAG');
                break;
            case '3':
                $click_tag_id = $this->getCKClickTagId('CLICK_PREMIUM_CB_TAG');
                break;
            default:
                $click_tag_id = null;
                break;
        }

        return $click_tag_id;
    }

    public function getPlanNameByClickItemNumber($itemNo)
    {
        $click_plan_name = null;
        switch ($itemNo) {
            case '1':
                $click_plan_name = $this->getPlanNameOfClickBank('CLICK_INDIVIDUAL_TAG');
                break;
            case '2':
                $click_plan_name = $this->getPlanNameOfClickBank('CLICK_PRO_TAG');
                break;
            case '3':
                $click_plan_name = $this->getPlanNameOfClickBank('CLICK_PREMIUM_CB_TAG');
                break;
            default:
                $click_plan_name = null;
                break;
        }

        return $click_plan_name;
    }

    public function addSubscriber($tag_id, array $data = [])
    {

        if ($tag_id == null || $tag_id == '') {
            return [
                'error' => 'Tag id required',
                'error_code' => 'CK_TAG_ADD_SUB_REQUIRED',
            ];
        }

        $params = [
            'api_secret' => $this->api_secret,
            'email' => $data['email'] ?? '',
            'name' => $data['name'] ?? '',
        ];

        $url = "{$this->api_base_url}tags/{$tag_id}/subscribe?".http_build_query($params);

        $response = $this->callCKApi($url, 'POST');

        return $response;
    }

    /**
     * Assign tag to subscriber by email
     */
    public function assignTag($tag_id, string $email)
    {
        $params = [
            'api_secret' => $this->api_secret,
            'email' => $email,
        ];

        // if($plan != null){
        //     $params = ['plan' => $plan];
        // }

        $url = "{$this->api_base_url}tags/{$tag_id}/subscribe?".http_build_query($params);

        $response = $this->callCKApi($url, 'POST');

        return $response;
    }

    /**
     * List subscriptions to a tag
     */
    public function listSubscribers($tag_id)
    {
        $params = [
            'api_secret' => $this->api_secret,
        ];

        $url = "{$this->api_base_url}tags/{$tag_id}/subscriptions?".http_build_query($params);

        $response = $this->callCKApi($url, 'GET');

        return $response;
    }

    /**
     * Remove tag from a subscriber by email
     */
    public function removeTagByEmail($tag_id, $email)
    {
        $params = [
            'api_secret' => $this->api_secret,
            'email' => $email,
        ];

        $url = "{$this->api_base_url}tags/{$tag_id}/unsubscribe?".http_build_query($params);

        $response = $this->callCKApi($url, 'POST');

        return $response;
    }

    /**
     * Call convertkit api
     */
    public function callCKApi($url, $type = 'GET')
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
        ]);

        $response = curl_exec($curl);

        if ($response === false) {
            Log::warning('CURL Error: '.curl_error($curl));
        }

        $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($responseCode >= 400) {
            // Log::error("HTTP Error: " . $responseCode);
        }

        curl_close($curl);

        return $response;
    }

    /**
     * Sync User plan
     */
    public function syncPlanTag(array $user, $new_plan)
    {
        $all_plans = config('app.CK_PLAN_TAGS');

        $tags_to_retain = [
            'premium-precision-upgrade',
            'premium-precision-upgrade-plus',
        ];

        $new_plan_tag_id = $all_plans[$new_plan] ?? null;

        if ($new_plan_tag_id === null) {
            // Handle case where $new_plan does not exist in the configuration
            return;
        }

        foreach ($all_plans as $plan_name => $tag_id) {
            // if ($plan_name == $new_plan) {
            if ($tag_id == $new_plan_tag_id) {
                $this->addSubscriber($tag_id, $user);
            } else {
                if (! in_array($new_plan, $tags_to_retain)) {
                    if (! in_array($plan_name, $tags_to_retain)) {
                        $this->removeTagByEmail($tag_id, $user['email']);
                    }
                }
            }
        }
    }

    /**
     * Remove tag by plan name
     */
    public function removeTagByPlanName($email, $plan_name)
    {
        try {

            $tag_id = $this->getTagIdByPlanName($plan_name);

            $this->removeTagByEmail($tag_id, $email);
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Unsubscribe subscriber
     *
     * Unsubscribe an email address from all your forms and sequences.
     */
    public function unsubscribe($email)
    {
        $params = [
            'api_secret' => $this->api_secret,
            'email' => $email,
        ];

        $url = "{$this->api_base_url}unsubscribe?".http_build_query($params);

        $response = $this->callCKApi($url, 'PUT');

        return $response;
    }
}
