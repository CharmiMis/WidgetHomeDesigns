<?php

namespace App\Trait;

use Exception;

trait AppTrait
{
    public function getCKTagId($tag)
    {
        $ck_tags = config('app.CK_TAGS');

        if (isset($ck_tags[$tag]) && $ck_tags[$tag] != '') {
            return $ck_tags[$tag];
        }

        throw new Exception('Tag id not found');
    }

    public function getCKOptionsTagId($tag)
    {
        $ck_tags = config('app.CK_OPTIONS_TAGS');

        if (isset($ck_tags[$tag]) && $ck_tags[$tag] != '') {
            return $ck_tags[$tag];
        }

        throw new Exception('Tag id not found');
    }

    public function getCKClickTagId($tag)
    {
        $ck_tags = config('app.CK_CLICK_BANK_TAGS');
        if (isset($ck_tags[$tag]) && $ck_tags[$tag] != '') {
            return $ck_tags[$tag];
        }

        throw new Exception('Tag id not found');
    }

    public function getPlanNameOfClickBank($tag)
    {
        $plan_name = config('app.CK_CLICK_BANK_PLANS_NAME');
        if (isset($plan_name[$tag]) && $plan_name[$tag] != '') {
            return $plan_name[$tag];
        }

        throw new Exception('Tag id not found');
    }
}
