<?php

namespace App\Lib\FastSpring;

class APIClass
{
    public $fastSpring = null;

    public function __construct()
    {
        $this->fastSpring = new FastSpring();
    }

    /**
     * Subscription Detail by id
     */
    public function getAllPlans()
    {

        $url = 'https://api.fastspring.com/products';
        $response = $this->fastSpring->callFSApi($url, 'GET');

        return json_decode($response, true);
    }

    public function getRevenueReport($columns = [], $startDate = null, $endDate = null, $groupBy = [], $pageCount = 50, $pageNumber = 0, $async = false)
    {
        $url = 'https://api.fastspring.com/data/v1/revenue';
        $post_data = [];
        if (count($columns) > 0) {
            $post_data['reportColumns'] = $columns;
        }
        if (! empty($startDate) && ! empty($endDate)) {
            $post_data['filter']['startDate'] = $startDate;
            $post_data['filter']['endDate'] = $endDate;

        }
        if (count($groupBy) > 0) {
            $post_data['groupBy'] = $groupBy;
        }
        $post_data['pageCount'] = $pageCount;
        $post_data['pageNumber'] = $pageNumber;
        $post_data['async'] = $async;
        $response = $this->fastSpring->callPostFieldFSApi($url, 'POST', json_encode($post_data));

        return json_decode($response, true);
    }

    public function getProductByPath($path)
    {

        $url = 'https://api.fastspring.com/products/'.$path;
        $response = $this->fastSpring->callFSApi($url, 'GET');

        return json_decode($response, true);
    }

    public function getAPISubscriptionDetailsByFromToDate($fromDate, $toDate, $event, $scope, $products = [])
    {
        $url = "https://api.fastspring.com/subscriptions?event={$event}&begin={$fromDate}&end={$toDate}&products=".implode(',', $products)."&scope={$scope}";
        $response = $this->fastSpring->callFSApi($url, 'GET');

        return json_decode($response, true);
    }
}
