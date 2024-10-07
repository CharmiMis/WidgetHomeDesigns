<?php

namespace App\Class;

use App\Lib\ConvertKit\ConvertKit;
use App\Models\User;
use App\Models\UserSubscription;

class OrderReturnWebhook
{
    public function process($payload)
    {
        try {
            $order = $this->originalOrder($payload);
            $order_id = $order['id'];

            $order_data = $this->inactivePlan($order_id);
            if ($order_data) {
                $this->removeUserFromCK($order_data->user_id);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function originalOrder($data)
    {
        if (isset($data->events[0]['data']['original'])) {
            return $data->events[0]['data']['original'];
        }
        return null;
    }

    public function customer($data)
    {
        if (isset($data->events[0]['data']['customer'])) {
            return $data->events[0]['data']['customer'];
        }
        return null;
    }

    public function inactivePlan($order_id)
    {

        try {
            if ($order_id) {
                $order_detail = UserSubscription::where('order_id', $order_id)->first();
                if ($order_detail) {
                    $order_detail->is_active = 0;
                    $order_detail->save();

                    return $order_detail;
                }

                return null;
            }

            return null;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function removeUserFromCK($user_id)
    {

        try {

            $user = User::where('id', $user_id)->first();
            $ck = new ConvertKit();
            $ck->unsubscribe($user->email);

            return true;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
