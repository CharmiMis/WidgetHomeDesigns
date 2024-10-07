<?php

namespace App\Class;

use App\Models\DailyUsages;
use Carbon\Carbon;

class DailyUsagesClass
{
    public function getDailyCount($user_id)
    {

        $today = Carbon::now()->toDateString();
        $counts = DailyUsages::select('count')->where('user_id', $user_id)->whereDate('date', $today)->first();

        if (empty($counts)) {
            return 0;
        }

        return $counts->count;
    }

    public function addCount($user_id)
    {

        $today = Carbon::now()->toDateString();
        $counts = DailyUsages::select('count')->where('user_id', $user_id)->whereDate('date', $today)->first();

        if (! empty($counts)) {

            DailyUsages::select('count')->where('user_id', $user_id)->whereDate('date', $today)->increment('count');
        } else {

            DailyUsages::insert([
                'user_id' => $user_id,
                'count' => 1,
                'date' => $today,
            ]);
        }
    }

    public function noOfGeneratedDesigns(array $data)
    {

        $count_query = DailyUsages::query();

        $count_query->when(isset($data['user_id']), function ($query) use ($data) {
            $query->where('user_id', $data['user_id']);
        });

        $count_query->when(isset($data['start_date']), function ($query) use ($data) {
            $query->whereDate('date', '>=', $data['start_date']);
        });

        $count_query->when(isset($data['end_date']), function ($query) use ($data) {
            $query->whereDate('date', '<=', $data['end_date']);
        });

        return $count_query->sum('count');
    }
}
