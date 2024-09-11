<?php

namespace App\Lib\FastSpring;

class OrderClass
{
    public $fastSpring = null;

    public function __construct()
    {
        $this->fastSpring = new FastSpring();
    }

    /**
     * Order Detail by id
     */
    public function getOrderDetail($order_id)
    {

        if ($order_id == '' || $order_id == null) {
            return false;
        }
        $url = "https://api.fastspring.com/orders/{$order_id}";
        $response = $this->fastSpring->callFSApi($url, 'GET');

        $orderDetail = json_decode($response, true);
        if ($orderDetail['orders'][0]['result'] == 'error') {
            return false;
        }

        return $orderDetail;
    }

    /**
     * Order Detail
     */
    public function isCompleted(array $order)
    {
        // try {

            if (isset($order['completed'])) {
                return $order['completed'];
            }

            return false;
        // } catch (\Throwable $th) {

        //     return false;
        // }
    }

    /**
     * Get Plan from order detail
     */
    public function getPlan(array $order)
    {
        // try {

            if (isset($order['items'][0]['product'])) {
                return $order['items'][0]['product'];
            }

            return false;
        // } catch (\Throwable $th) {

        //     return false;
        // }
    }

    /**
     * Get Order By plan
     */
    public function ordersByPlan($plan, $limit = 100, $page = 1)
    {

        $url = "https://api.fastspring.com/orders?products={$plan}&limit={$limit}&page={$page}";

        $response = $this->fastSpring->callFSApi($url, 'GET');

        $orderDetail = json_decode($response, true);

        if ($orderDetail['result'] == 'error') {
            return false;
        }

        return $orderDetail;
    }

    /**
     * Check order is subscription
     */
    public function isSubscription($order)
    {
        // try {

            return $order['items'][0]['subscription'];
        // } catch (\Throwable $th) {

        //     return false;
        // }
    }

    /**
     * Get orders by product path AND date range
     */
    public function getOrdersByPlanAndDate($product, $begin_date, $end_date)
    {
        $url = "https://api.fastspring.com/orders?products={$product}&begin={$begin_date}&end={$end_date}";

        $response = $this->fastSpring->callFSApi($url, 'GET');
        $orderDetail = json_decode($response, true);

        if ($orderDetail['result'] == 'error') {
            return false;
        }

        return $orderDetail;
    }

    public function getSubscriptionDetail($subscription_id)
    {
        $url = "https://api.fastspring.com/subscriptions/{$subscription_id}";

        $response = $this->fastSpring->callFSApi($url, 'GET');
        $subscriptionDetail = json_decode($response, true);

        return $subscriptionDetail;
    }

    public function updateSubscriptionDetail($subscription_id, $product)
    {
        $url = 'https://api.fastspring.com/subscriptions';
        $post_data = json_encode([
            'subscriptions' => [
                [
                    'subscription' => $subscription_id,
                    'product' => $product,
                    'quantity' => 1,
                ],
            ],
        ]);
        $response = $this->fastSpring->callPostFieldFSApi($url, 'POST', $post_data);

        return json_decode($response, true);
    }
}
