<?php

namespace App\Class;

use App\Models\AdminSetting;

class AdminSettingClass
{
    public $model;

    public function __construct()
    {
        $this->model = new AdminSetting();
    }

    public function get()
    {
        $setting = $this->model->first();

        if (empty($setting)) {
            $setting = $this->createDefault();
        }

        return $setting;
    }
    /**
     * @property int $is_daily_free_active
     */
    
    public function createDefault()
    {
        $setting = new AdminSetting();
        $setting->is_daily_free_active = 0;
        $setting->save();

        return $setting;
    }

    public function update($data = [])
    {
        $setting = $this->get();
        $setting->is_daily_free_active = $data['is_daily_free_active'] ?? 0;
        $setting->save();

        return $setting;
    }
}
