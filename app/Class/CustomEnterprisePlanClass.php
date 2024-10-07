<?php

namespace App\Class;

use App\Models\CustomEnterprisePlan;

class CustomEnterprisePlanClass
{
    public function __construct()
    {
    }

    public function adminCustomEnterprisePlanPanel($request)
    {
        $columns = ['id', 'fullname', 'workemail', 'companyemail', 'companysize', 'usecase', 'developmentteam', 'created_at'];
        $totalData = CustomEnterprisePlan::count();

        $query = CustomEnterprisePlan::select($columns);
        if ($request->has('search') && $request->input('search.value') != '') {
            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%'.$request->input('search.value').'%');
            }
        }
        $perPage = $request->input('length', 10); // Number of records per page
        $page = $request->input('start', 0) / $perPage + 1; // Calculate current page based on start index
        $query = $query->limit($request->input('length'))
            ->skip(($page - 1) * $perPage)->take($perPage)
            ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'))
            ->get();

        // $filteredData = $query->count();

        // Prepare response in DataTables format
        $response = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalData,
            'data' => $query,
        ];

        return response()->json($response);
    }
}
