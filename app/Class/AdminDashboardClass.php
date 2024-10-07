<?php

namespace App\Class;

use App\Lib\FastSpring\APIClass;
use App\Lib\FastSpring\OrderClass;
use App\Models\DailyOrderAmount;
use App\Models\DailyUsages;
use App\Models\User;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardClass
{
    protected $fastspringapi;

    public function __construct(public $orderClass = new OrderClass())
    {
        $this->fastspringapi = new APIClass();
    }

    public function usersRegisteredOnDate($date = null)
    {

        $allPlans = config('plans.all');
        unset($allPlans['individual']);

        $user_query = User::query()->select([
            DB::raw('count(users.id) as count'),
            DB::raw('IFNULL(user_subscriptions.plan_name,"free") as plan_name'),
        ]);

        $user_query->leftJoin('user_subscriptions', function ($query) {
            $query->on('user_subscriptions.user_id', '=', 'users.id')
                ->whereRaw('user_subscriptions.id IN (select MAX(a2.id) from user_subscriptions as a2 join users as u2 on u2.id = a2.user_id where a2.is_active = 1 and a2.is_api_plan = 0 group by u2.id)');
        });

        if ($date != null) {
            $user_query->whereDate('users.created_at', $date);
        }

        $usersGroupedByPlan = $user_query->groupBy('plan_name')->get()->pluck('count', 'plan_name')->toArray();

        $user_by_plan = [];
        foreach ($allPlans as $planId => $item) {
            $count = isset($usersGroupedByPlan[$planId]) ? $usersGroupedByPlan[$planId] : 0;
            $user_by_plan[] = [
                'plan' => $item,
                'plan_id' => $planId,
                'count' => $count,
            ];
        }

        return $user_by_plan;
    }

    public function usersCountByPlan($date = null)
    {

        $allPlans = config('plans.all');
        unset($allPlans['individual']);

        // $user_query = User::query()->select([
        //     DB::raw('count(users.id) as count'),
        //     DB::raw('IFNULL(user_subscriptions.plan_name,"free") as plan_name')
        // ]);

        // $user_query->leftJoin('user_subscriptions', function ($query) {
        //     $query->on('user_subscriptions.user_id', '=', 'users.id')
        //         ->whereRaw('user_subscriptions.id IN (select MAX(a2.id) from user_subscriptions as a2 join users as u2 on u2.id = a2.user_id where a2.is_active = 1 and a2.is_api_plan = 0 group by u2.id)');
        // });

        // if ($date != null) {
        //     $user_query->whereDate('users.created_at', $date);
        // }

        // $usersGroupedByPlan = $user_query->groupBy('plan_name')->get()->pluck('count', 'plan_name')->toArray();

        // $user_by_plan = [];
        // foreach ($allPlans as $planId => $item) {
        //     $count = isset($usersGroupedByPlan[$planId]) ? $usersGroupedByPlan[$planId] : 0;
        //     $user_by_plan[] = [
        //         'plan' => $item,
        //         'plan_id' => $planId,
        //         'count' => $count
        //     ];
        // }
        $data = [];
        $allplans = $this->fastspringapi->getAllPlans();
        // dd(implode(',',$allplans['products']));
        $data['all_plans'] = $allplans['products'];
        array_unshift($data['all_plans'], 'free');
        $usersubscription = UserSubscription::select('plan_name', 'user_id');
        if ($date != null) {
            $usersubscription->whereDate('created_at', $date);
        }
        $usersubscription->select('plan_name', DB::raw('count(distinct user_id) as user_count'));
        $user_by_plan = $usersubscription->groupBy('plan_name')->pluck('user_count', 'plan_name')->toArray();
        $data['users'] = $user_by_plan;

        return $data;
    }

    /**
     * get sales of all the plans within date range.
     *
     * @param $begin_date format must be MM/DD/YY
     * @param $end_date format must be MM/DD/YY
     */
    public function getSalesOfDay($date)
    {
        $begin_date = $date;
        $end_date = Carbon::parse($date)->addDay()->toDateString();
        // $end_date =  $date;

        return $this->findTodaySales($begin_date, $end_date);
    }

    public function getSalesReportByFastSpring($date)
    {
        $begin_date = $date;
        $end_date = Carbon::parse($date)->addDay()->toDateString();

        return $this->fastspringapi->getRevenueReport($columns = ['grand_total_in_usd', 'product_name', 'product_display_name', 'product_path'], $begin_date, $end_date, $groupBy = ['product_name']);
    }

    /**
     * get sales of specific plan within date range.
     *
     * @param $plan_id must be valid plan id in Fastspring.
     * @param $begin_date format must be MM/DD/YY
     * @param $end_date format must be MM/DD/YY
     * @property float $amount
     */
    public function totalOrdersByPlanAndDate($planId, $begin_date, $end_date)
    {

        // if begin date is today's date give data from fastspring
        if ($begin_date == now()->toDateString()) {
            $cache_name = implode('_', [$planId, strtotime($begin_date), strtotime($end_date)]);
            $amount = cache()->remember($cache_name, 120, function () use ($planId, $begin_date, $end_date) {
                return $this->getFromFastSpring($planId, $begin_date, $end_date);
            });

            return $amount;
        }

        // Check in table for data existing for given date, if not exist then find in fastspring and save in the daily record table.
        $record = DailyOrderAmount::whereDate('date', $begin_date)->where('plan_id', $planId)->first();
        if (! $record) {

            $amount = $this->getFromFastSpring($planId, $begin_date, $end_date);

            $record = DailyOrderAmount::create([
                'date' => $begin_date,
                'plan_id' => $planId,
                'amount' => $amount,
            ]);
        }

        return $record->amount;
    }

    public function findTodaySales($begin_date, $end_date)
    {

        $salesData = [];
        $allPlans = config('plans.all');

        unset($allPlans['free']);
        unset($allPlans['individual']);

        foreach ($allPlans as $planId => $item) {
            $orderAmount = $this->totalOrdersByPlanAndDate($planId, $begin_date, $end_date);
            $salesData[] = [
                'plan' => $item,
                'plan_id' => $planId,
                'total_amount' => $orderAmount,
            ];
        }

        return $salesData;
    }

    public function getFromFastSpring($planId, $begin_date, $end_date)
    {
        $orderData = $this->orderClass->getOrdersByPlanAndDate($planId, $begin_date, $end_date);
        if (! $orderData) {
            return 0;
        }

        $allOrderAmount = 0;
        if (count($orderData['orders']) > 0) {
            foreach ($orderData['orders'] as $order) {
                if ($order['live'] && $order['completed'] == true && $order['total'] > 0) {
                    $allOrderAmount += $order['total'] ?? 0;
                }
            }
        }

        return $allOrderAmount;
    }

    public function getOrderByDate($start_date, $end_date)
    {
        $records = DailyOrderAmount::select(DB::raw('SUM(amount) as total'), 'date')
        // ->whereDate('date', '>=', $start_date)
        // ->whereDate('date', '<=', $end_date)
            ->whereBetween('date', [$start_date, $end_date])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('total', 'date')->toArray();
        $dayWiseRecords = [];
        $current = strtotime($start_date);
        $last = strtotime($end_date);

        while ($current <= $last) {
            $date = date('Y-m-d', $current);
            $day = date('d M', $current);
            // if (!isset($records[$date])) {

            //     // $salesOfDay = $this->getSalesOfDay($date);

            //     $day_data = DailyOrderAmount::select(DB::raw('SUM(amount) as total'), 'date')
            //         ->whereDate('date', $date)
            //         ->first();

            //     $amount = $day_data->total;
            // } else {
            // $amount = $records[$date];
            // }
            $amount = isset($records[$date]) ? $records[$date] : 0;
            $dayWiseRecords[] = [
                'date' => $date,
                'day' => $day,
                'amount' => number_format($amount, 2, '.', ''),
            ];
            $current = strtotime('+1 day', $current);
        }

        return $dayWiseRecords;
    }

    public function getDownloadsByDate($start_date, $end_date)
    {
        $downloads = DailyUsages::select(DB::raw('SUM(count) as total'), 'date')
        // ->whereDate('date', '>=', $start_date)
        // ->whereDate('date', '<=', $end_date)
            ->whereBetween('date', [$start_date, $end_date])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('total', 'date')->toArray();
        $dayWiseRecords = [];
        $current = strtotime($start_date);
        $last = strtotime($end_date);

        while ($current <= $last) {
            $date = date('Y-m-d', $current);
            $day = date('d M', $current);
            $download_count = $downloads[$date] ?? 0;
            $dayWiseRecords[] = [
                'date' => $date,
                'day' => $day,
                'downloads' => number_format($download_count, 2, '.', ''),
            ];
            $current = strtotime('+1 day', $current);
        }

        return $dayWiseRecords;
    }

    public function addDailyOrders($planId, $begin_date, $amount)
    {
        // Check in table for data existing for given date, if not exist then find in fastspring and save in the daily record table.
        $record = DailyOrderAmount::whereDate('date', $begin_date)->where('plan_id', $planId)->first();
        if (! $record) {

            $record = DailyOrderAmount::create([
                'date' => $begin_date,
                'plan_id' => $planId,
                'amount' => $amount,
            ]);
        }

        return $record->amount;
    }

    public function getRevenueReport($columns, $begin_date, $end_date, $groupBy)
    {
        return $this->fastspringapi->getRevenueReport($columns, $begin_date, $end_date, $groupBy, 1000);
    }
}
