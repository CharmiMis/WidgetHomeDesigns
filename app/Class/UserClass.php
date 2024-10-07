<?php

namespace App\Class;

use App\Lib\ConvertKit\ConvertKit;
use App\Lib\FastSpring\APIClass;
use App\Lib\FastSpring\OrderClass;
use App\Lib\FastSpring\SubscriptionClass;
use App\Models\PublicGallery;
use App\Models\TestApiToken;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserSubscription;
use App\Notifications\RegistrationDetailsNotification;
use App\Trait\AppTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class UserClass
{
    use AppTrait;

    public $convertKit;

    public $subscriptionClass;

    public $orderClass;

    public $apiClass;

    protected $addonplans = ['homedesignsai-extra-room-types', 'homedesignsai-extra-styles', 'premium-precision-upgrade-plus', 'premium-precision-upgrade'];

    public function __construct()
    {
        $this->convertKit = new ConvertKit();
        $this->subscriptionClass = new SubscriptionClass();
        $this->orderClass = new OrderClass();
        $this->apiClass = new APIClass();
        $this->addonplans = ['homedesignsai-extra-room-types', 'homedesignsai-extra-styles', 'premium-precision-upgrade-plus', 'premium-precision-upgrade'];
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function detail($id)
    {
        return User::where('id', $id)->with('subscription')->first();
    }

    public function subscriptions($id)
    {
        return UserSubscription::where('user_id', $id)->orderBy('created_at', 'desc')->get();
    }

    public function createNew(array $data)
    {
        $stub = $this->userStub($data);
        $user = User::create($stub);
        $user->uid = $user->id;
        $user->save();

        return $user;
    }

    public function update(array $data, $id)
    {

        $user = $this->findById($id);

        $stub = $this->userStub($data);

        $user->update($stub);

        return $user->refresh();
    }

    public function userStub(array $data)
    {

        $stub_data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'exclude_fair_usage' => $data['exclude_fair_usage'] ?? 0,
            'available_credits' => $data['available_credits'] ?? 0,
        ];

        if (isset($data['password'])) {
            $stub_data['password'] = Hash::make($data['password']);
        }

        return $stub_data;
    }

    public function delete(string $id)
    {
        try {
            $user = $this->findById($id);
            //Delete user's extra details
            $user->details()->delete();

            // Delete subscriptions
            $user->subscriptions->each(function ($subscription) {
                $subscription->delete();
            });

            // Delete daily usage data
            $user->dailyUsage()->delete();

            //Delete Public galley
            $user->publicGallery()->delete();

            $user->delete();
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'Failed to soft delete user and related data.'], 500);
        }
    }

    public function updatePlan($user_id, $new_plan, array $data = [])
    {
        $user = $this->findById($user_id);

        $order_id = $data['order_id'] ?? null;
        $is_active = $data['is_active'] ?? 1;
        $exp_date = $data['exp_date'] ?? null;

        if ($new_plan == 'homedesignsai-individual' || $new_plan == 'homedesignsai-individual-2' || $new_plan == 'homedesignsai-pro' || $new_plan == 'homedesignsai-pro-2' || $new_plan == 'homedesignsai-teams' || $new_plan == 'api-bronze' || $new_plan == 'api-silver' || $new_plan == 'api-gold' || $new_plan == 'standard-sme-new' || $new_plan == 'standard-sme-500-api-calls-mo' || $new_plan == 'standard-sme-1000-api-calls-mo' || $new_plan == 'standard-sme-3000-api-calls-mo' || $new_plan == 'standard-sme-10000-api-calls-mo') {
            $exp_date = Carbon::now()->addMonth()->toDateString();
        } elseif ($new_plan == 'pro-yearly') {
            $exp_date = Carbon::now()->addYear()->toDateString();
        }

        $UserSubscription = [
            'user_id' => $user_id,
            'plan_name' => $new_plan,
            'order_id' => $order_id,
            'is_active' => $is_active,
            'exp_date' => $exp_date,
            'is_api_plan' => 0,
        ];
        if ($new_plan == 'api-bronze' || $new_plan == 'api-silver' || $new_plan == 'api-gold' || $new_plan == 'standard-sme' || $new_plan == 'standard-sme-new' || $new_plan == 'standard-sme-500-api-calls-mo' || $new_plan == 'standard-sme-1000-api-calls-mo' || $new_plan == 'standard-sme-3000-api-calls-mo' || $new_plan == 'standard-sme-10000-api-calls-mo') {
            $UserSubscription['is_api_plan'] = 1; // set the api plan 1 if plan is related to API
        }

        if ($new_plan == 'standard-sme-500-api-calls-mo') {
            $UserSubscription['total_plan_credit'] = 500;
        } elseif ($new_plan == 'standard-sme-1000-api-calls-mo') {
            $UserSubscription['total_plan_credit'] = 1000;
        } elseif ($new_plan == 'standard-sme-3000-api-calls-mo') {
            $UserSubscription['total_plan_credit'] = 3000;
        } elseif ($new_plan == 'standard-sme-10000-api-calls-mo') {
            $UserSubscription['total_plan_credit'] = 10000;
        }
        UserSubscription::create($UserSubscription);
        $this->syncUserPlanTag($user, $new_plan);
    }

    public function syncUserPlanTag($user, $newPlan)
    {
        $userArray = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        $this->convertKit->syncPlanTag($userArray, $newPlan);

        $this->convertKit->removeTagByEmail($this->getCKTagId('TAG_FREE_LIMIT_REACHED'), $user->email);
    }

    public function cancelPlan($user_sub_id)
    {
        try {

            $user_subscription = UserSubscription::findOrFail($user_sub_id);
            if ($user_subscription->order_id != '' && $user_subscription->plan_name != 'individual') {

                $order_detail = $this->orderClass->getOrderDetail($user_subscription->order_id);
                $subscription = $this->orderClass->isSubscription($order_detail);

                if ($subscription) {
                    $this->subscriptionClass->cancelSubscription($subscription);
                }
            } else {
                $user_subscription->is_active = 0;
            }
            $user_subscription->is_canceled = 1;
            $user_subscription->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function filterUsers($filters)
    {
        $user_query = User::query()->select([
            'users.id',
            'users.name',
            'users.email',
            'users.total_designs',
            'users.servery_confirmation',
            'users.created_at',
            'users.email_verified_at',
            DB::raw('IFNULL(user_subscriptions.plan_name,"free") as plan_name'),
        ]);

        if (isset($filters['count_daily_count']) && $filters['count_daily_count'] == 1) {
            $user_query->leftJoin('user_daily_usages', function ($join) use ($filters) {
                $join->on('user_daily_usages.user_id', '=', 'users.id');

                if (isset($filters['count_start_date'])) {
                    $join->where('user_daily_usages.date', '>=', $filters['count_start_date']);
                }

                if (isset($filters['count_end_date'])) {
                    $join->where('user_daily_usages.date', '<=', $filters['count_end_date']);
                }
            });

            if (isset($filters['min_count'])) {
                $user_query->havingRaw('IFNULL(sum(user_daily_usages.count),0) >= ?', [$filters['min_count']]);
            }

            if (isset($filters['max_count'])) {
                $user_query->havingRaw('IFNULL(sum(user_daily_usages.count),0) <= ?', [$filters['max_count']]);
            }

            $user_query->addSelect(DB::raw('IFNULL(sum(user_daily_usages.count),0) as daily_designs'));
        }

        $user_query->leftJoin('user_subscriptions', function ($query) {
            $query->on('user_subscriptions.user_id', '=', 'users.id')
                ->whereRaw('user_subscriptions.id IN (select MAX(a2.id) from user_subscriptions as a2 join users as u2 on u2.id = a2.user_id where a2.is_active = 1 and a2.is_api_plan = 0 group by u2.id)');
        });

        if (isset($filters['plan_name'])) {
            $user_query->whereRaw('IFNULL(user_subscriptions.plan_name,"free") = ?', [$filters['plan_name']]);
        }

        $user_query->groupBy('users.id');

        if (isset($filters['user_created_at_start'])) {
            $user_query->whereDate('users.created_at', '>=', $filters['user_created_at_start']);
        }

        if (isset($filters['user_created_at_end'])) {
            $user_query->whereDate('users.created_at', '<=', $filters['user_created_at_end']);
        }

        $verified = $filters['verified'] ?? null;
        if ($verified == 'yes') {
            $user_query->whereNotNull('users.email_verified_at');
        }
        if ($verified == 'no') {
            $user_query->whereNull('users.email_verified_at');
        }

        if (isset($filters['search'])) {
            $user_query->where(function ($q) use ($filters) {
                $q->where('users.name', 'like', '%'.$filters['search'].'%');
                $q->orWhere('users.email', 'like', '%'.$filters['search'].'%');
            });
        }

        $orderOn = $filters['sort_on'] ?? 'id';
        $orderBy = $filters['sort_by'] ?? 'desc';

        if (in_array($orderOn, ['registration_date'])) {
            if ($orderOn == 'registration_date') {
                $user_query->orderBy('users.created_at', $orderBy);
            }
        } else {
            $user_query->orderBy($orderOn, $orderBy);
        }

        return $user_query;
    }

    public function adminUsersPanel($request, $extraWhereConditions = [], $is_deleted_users = false)
    {
        ini_set('memory_limit', '1280M');
        $user_ids = false;
        $filters = $request->all();
        $length = $filters['length'] ?? 25;
        $start = (int) ($filters['start'] ?? 0);


        $user_query = User::select([
            'id',
            'name',
            'email',
            'total_designs',
            // 'servery_confirmation',
            'created_at',
            'email_verified_at',
        ]);
        foreach ($extraWhereConditions as $fieldname => $value) {
            $user_query->addSelect($fieldname);
        }

        if (count($extraWhereConditions) == 0) {
            $user_query->with('subscription:user_id,plan_name');
        }
        // $user_query->with('userServey:user_id,question_id,value');

        if (count($extraWhereConditions) > 0) {
            foreach ($extraWhereConditions as $key => $value) {
                $user_query->where($key, $value);
            }
        }
        if ($is_deleted_users) {
            $recordsTotal = User::onlyTrashed()->count('id');
            $user_query->onlyTrashed();
        } elseif (count($extraWhereConditions) > 0) {
            $count_query = User::select('id');
            foreach ($extraWhereConditions as $columnname => $value) {
                $count_query->where($columnname, $value);
            }
            $recordsTotal = $count_query->count();
        // dd($recordsTotal);
        } else {
            $recordsTotal = User::count('id');
        }

        if ($request->route()->getName() == 'admin.users.index') {
            $user_query->where('is_api_user', 0);
        }

        if (isset($filters['user_created_at_start'])) {
            $user_query->whereDate('created_at', '>=', $filters['user_created_at_start']);
        }

        if (isset($filters['user_created_at_end'])) {
            $user_query->whereDate('created_at', '<=', $filters['user_created_at_end']);
        }

        $verified = $filters['verified'] ?? null;
        if ($verified == 'yes') {
            $user_query->whereNotNull('email_verified_at');
        }
        if ($verified == 'no') {
            $user_query->whereNull('email_verified_at');
        }

        if (isset($filters['search']) && $filters['search']['value'] != '') {
            $user_query->where(function ($user_query) use ($filters) {
                if (isset($filters['search_by'])) {
                    if ($filters['search_by'] == 'id') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);
                    } elseif ($filters['search_by'] == 'name') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'email') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'total_designs') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'created_at') {
                        $user_query->whereDate($filters['search_by'], date('Y-m-d', strtotime($filters['search']['value'])));
                    }
                } else {
                    $user_query->where('email', 'like', '%'.$filters['search']['value'].'%');
                    $user_query->where('name', 'like', '%'.$filters['search']['value'].'%');
                    $user_query->orWhere('email', 'like', '%'.$filters['search']['value'].'%');
                    $user_query->orWhere('total_designs', 'like', '%'.$filters['search']['value'].'%');
                    $user_query->orWhere('created_at', 'like', '%'.$filters['search']['value'].'%');
                }
            });
        }

        if (isset($filters['plan_name']) || (isset($filters['order'][0]['column']) && ($filters['columns'][$filters['order'][0]['column']]['data'] == 'plan_name'))) {
            // $user_ids = true;
            // if($filters['plan_name'] == "free"){
            $user_query->whereHas('subscription', function ($user_query) use ($filters) {
                if (isset($filters['plan_name']) && ! empty($filters['plan_name'])) {
                    $user_query->where('plan_name', $filters['plan_name']);
                    // $user_query->whereNotIn('plan_name', $this->addonplans);
                }
                if (isset($filters['order'][0]['column']) && ($filters['columns'][$filters['order'][0]['column']]['data'] == 'plan_name')) {
                    // $user_query->orderBy($filters['columns'][$filters['order'][0]['column']]['data'], $filters['order'][0]['dir']);
                }
            });
            // ->with(['subscription'=>  function ($user_query) use($filters){
            //     if(isset($filters['plan_name']) && !empty($filters['plan_name'])){
            //         $user_query->where('plan_name', $filters['plan_name']);
            //         $user_query->whereNotIn('plan_name', $this->addonplans);
            //     }
            // }]);

            // } else {
            //     $userids = UserSubscription::select('user_id')->where('plan_name', $filters['plan_name']);
            //     $user_query->whereIn('id', $userids);
            // }
        }

        if (isset($filters['order'][0]['column']) && ($filters['columns'][$filters['order'][0]['column']]['data'] != 'plan_name')) {
            $orderOn = $filters['sort_on'] ?? 'id';
            $orderBy = isset($filters['order']) ? $filters['order'][0]['dir'] : $filters['sort_by'];
            if (in_array($orderOn, ['registration_date'])) {
                if ($orderOn == 'registration_date') {
                    $user_query->orderBy('created_at', $orderBy);
                }
            } else {
                $user_query->orderBy($filters['columns'][$filters['order'][0]['column']]['data'], $orderBy);
            }
        }
        $recordsFiltered = $user_query->count('id');
        $user_query->skip($start)->limit($length);
        $users = $user_query->get()->map(function ($user) {
            $user->encrypted_id = encrypt($user->id);

            return $user;
        });

        // if(isset($filters['plan_name']) && !empty($filters['plan_name']) && ($user_ids)){
        //     $users->map(function ($user) use($filters){
        //         $user->plan_name = $filters['plan_name'];
        //         return $user;
        //     });
        // }
        // return $data = [
        //     'users' => $users
        // ];
        // dd($users);
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $users,
        ]);
    }

    public function adminAPIUsersPanel($request)
    {
        ini_set('memory_limit', '1280M');
        $user_ids = false;
        $filters = $request->all();
        $length = $filters['length'] ?? 25;
        $start = (int) ($filters['start'] ?? 0);
        $page = 1;
        $recordsTotal = User::where(['is_api_user' => 1, 'is_widget_user' => 0])->count('id');
        if (isset($filters['page'])) {
            $page = (int) $filters['page'];
        }
        $user_query = User::select([
            'id',
            'name',
            'email',
            'created_at',
            'email_verified_at',
            'is_premium_plan',
            'is_extra_room_bumps',
            'is_extra_style_bumps',
        ]);

        $user_query->where(['is_api_user' => 1, 'is_widget_user' => 0]);
        $user_query->skip(($page) * $length)->take($length);

        if (isset($filters['user_created_at_start'])) {
            $user_query->whereDate('created_at', '>=', $filters['user_created_at_start']);
        }

        if (isset($filters['user_created_at_end'])) {
            $user_query->whereDate('created_at', '<=', $filters['user_created_at_end']);
        }

        if (isset($filters['search']['value']) && is_numeric($filters['search']['value']) && filter_var($filters['search']['value'], FILTER_VALIDATE_INT) !== false) {
            $filters['search']['value'] = (int) $filters['search']['value'];
        }
        if (isset($filters['search']) && $filters['search'] != '') {
            $user_query->where(function ($user_query) use ($filters) {
                if (isset($filters['search_by'])) {
                    if ($filters['search_by'] == 'id') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);
                    } elseif ($filters['search_by'] == 'name') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'email') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'created_at') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'email_verified_at') {
                        if ($filters['search'] == 'yes' || $filters['search'] == 'yes' || $filters['search']['value'] == 'true') {
                            $user_query->where($filters['search_by'], '!=', null);
                        } else {
                            $user_query->where($filters['search_by'], null);
                        }
                    }
                } else {
                    if (is_int($filters['search']['value'])) {
                        $user_query->where('id', 'like', '%'.$filters['search']['value'].'%');
                        $user_query->orWhere('total_designs', 'like', '%'.$filters['search']['value'].'%');
                    } elseif (is_string($filters['search']['value'])) {
                        $user_query->Where('email', 'like', '%'.$filters['search']['value'].'%');
                        $user_query->orWhere('name', 'like', '%'.$filters['search']['value'].'%');
                        $user_query->orWhere('created_at', 'like', '%'.$filters['search']['value'].'%');
                    }
                }
            });
        }

        if (isset($filters['search']['value']) && $filters['search']['value'] != '') {
            $user_query->WhereHas('activeSubscription', function ($user_query) use ($filters) {
                $user_query->where('is_api_plan', 1);
                $user_query->whereNotIn('plan_name', $this->addonplans);
                if (isset($filters['search_by'])) {
                    if (isset($filters['search_by']) && $filters['search_by'] == 'total_plan_credit') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);

                    } elseif (isset($filters['search_by']) && $filters['search_by'] == 'used_credit') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);

                    } elseif (isset($filters['search_by']) && $filters['search_by'] == 'plan_name') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);
                    }
                } else {
                    if (is_int($filters['search']['value'])) {
                        $user_query->where(function ($user_query) use ($filters) {
                            $user_query->orWhere('total_plan_credit', $filters['search']['value']);
                            $user_query->orWhere('used_credit', $filters['search']['value']);
                        });
                    }
                }
                $user_query->select('user_id', 'plan_name', 'total_plan_credit', 'used_credit');
                // $user_query->groupBy('user_id');
                $user_query->orderBy('created_at', 'desc');
            });
        } else {
            $user_query->whereHas('activeSubscription', function ($user_query) {
                $user_query->where('is_api_plan', 1);
                $user_query->whereNotIn('plan_name', $this->addonplans);
                $user_query->select('user_id', 'plan_name', 'total_plan_credit', 'used_credit');
                $user_query->groupBy('user_id');
                $user_query->orderBy('created_at', 'desc');
            });
        }
        $user_query->with(['activeSubscription' => function ($user_query) {
            $user_query->where('is_api_plan', 1);
            $user_query->whereNotIn('plan_name', $this->addonplans);
            $user_query->select('user_id', 'plan_name', 'total_plan_credit', 'used_credit');
            // $user_query->groupBy('user_id');
            $user_query->orderBy('created_at', 'desc');
        }])->with('subscription');
        // $orderOn = $filters['sort_on'] ?? 'id';
        // $orderBy = $filters['sort_by'] ?? 'desc';

        // if (in_array($orderOn, ['registration_date'])) {
        //     if ($orderOn == 'registration_date') {
        //         $user_query->orderBy('created_at', $orderBy);
        //     }
        // } else {
        //     $user_query->orderBy($orderOn, $orderBy);
        // }
        if (isset($filters['order'][0]['column'])) {
            $orderOn = $filters['sort_on'] ?? 'id';
            $orderBy = isset($filters['order']) ? $filters['order'][0]['dir'] : $filters['sort_by'];
            if (in_array($orderOn, ['registration_date'])) {
                if ($orderOn == 'registration_date') {
                    $user_query->orderBy('created_at', $orderBy);
                }
            } else {
                $user_query->orderBy($filters['columns'][$filters['order'][0]['column']]['data'], $orderBy);
            }
        }
        $user_query->skip($start)->limit($length);
        $recordsFiltered = $user_query->count('id');
        $users = $user_query->get()->map(function ($user) {
            $user->encrypted_id = encrypt($user->id);

            return $user;
        });
        // $sql = $user_query->toSql();

        // // Get the bindings
        // $bindings = $user_query->getBindings();

        // // Output the SQL query and bindings
        // dd($sql, $bindings);
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => $users,
        ]);
    }

    public function is_email($input)
    {
        // Define the regular expression pattern for email validation
        $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';

        // Use preg_match to check if the input matches the pattern
        if (preg_match($pattern, $input)) {
            return true; // Input is a valid email address
        } else {
            return false; // Input is not a valid email address
        }
    }

    public function activeSubscriber()
    {
        // $user_query = User::query()->select([
        //     'users.id',
        //     'users.name',
        //     'users.email',
        //     'users.total_designs',
        //     'users.created_at',
        //     'users.email_verified_at',
        //     DB::raw('IFNULL(user_subscriptions.plan_name,"free") as plan_name')
        // ]);
        // $activeSubscriber = $user_query->leftJoin('user_subscriptions', function ($query) {
        //     $query->on('user_subscriptions.user_id', '=', 'users.id')
        //         ->whereRaw('user_subscriptions.id IN (select MAX(a2.id) from user_subscriptions as a2 join users as u2 on u2.id = a2.user_id where a2.is_active = 1 and a2.is_api_plan = 0 group by u2.id)');
        // })->whereRaw('IFNULL(user_subscriptions.plan_name,"free") != "free"')->count();

        // $activeSubscriber = User::count();

        $activeSubscriber = UserSubscription::where('is_active', 1)
            ->where('is_api_plan', 0)
            ->where('plan_name', '!=', 'free')
            ->distinct('user_id')
            ->count();

        // if ($activeSubscriber < 1000) {
        //     return $activeSubscriber;
        // } elseif ($activeSubscriber < 1000000) {
        //     return number_format($activeSubscriber / 1000, 2) . 'K';
        // } elseif ($activeSubscriber < 1000000000) {
        //     return number_format($activeSubscriber / 1000000, 2) . 'M';
        // } elseif ($activeSubscriber < 1000000000000) {
        //     return number_format($activeSubscriber / 1000000000, 2) . 'B';
        // } else {
        //     return number_format($activeSubscriber / 1000000000000, 2) . 'T';
        // }

        return $activeSubscriber;
    }

    public function activeDesign()
    {
        $sumOfDesign = PublicGallery::count();
        if ($sumOfDesign < 1000) {
            return $sumOfDesign;
        } elseif ($sumOfDesign < 1000000) {
            return number_format($sumOfDesign / 1000, 2).'K';
        } elseif ($sumOfDesign < 1000000000) {
            return number_format($sumOfDesign / 1000000, 2).'M';
        } elseif ($sumOfDesign < 1000000000000) {
            return number_format($sumOfDesign / 1000000000, 2).'B';
        } else {
            return number_format($sumOfDesign / 1000000000000, 2).'T';
        }
    }

    /**
     * Assign Inactive tag to user.
     *
     * Update in database and add inactive tag in ConverterKit
     */
    public function assignInActiveTag(User $user)
    {
        if (! $user->details) {
            UserDetail::insert(['user_id' => $user->id]);
        }

        $user->refresh();

        $ck = $this->convertKit->assignTag($this->getCKTagId('TAG_INACTIVE'), $user->email);

        $user->details->inactive_tag = 1;
        $user->details->save();

    }

    public function updateCredit($user_id, $new_credit)
    {
        try {

            $user = $this->findById($user_id);
            $user->available_credits = $new_credit;
            $user->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function searchUsers(array $filters)
    {

        $users_query = User::query()->with('subscription');

        if (isset($filters['search'])) {
            $users_query->where(function ($q) use ($filters) {
                $q->where('users.name', 'like', '%'.$filters['search'].'%');
                $q->orWhere('users.email', 'like', '%'.$filters['search'].'%');
            });
        }

        if (isset($filters['plan'])) {
            $users_query->whereHas('subscription', function ($q) use ($filters) {
                $q->where('plan_name', $filters['plan']);
            });
        }

        return $users_query->latest();
    }

    /**
     * Function to get current users's plan
     */
    public function getCurrentPlan($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();

        if (! $user->subscription) {

            $userSubClass = new UserSubClass($user);
            $userSubClass->addPlan('free');

            $user = User::where('id', $user_id)->first();
        }

        return $user->subscription;
    }

    public function generatePassword($length = 10)
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');

        return substr($random, 0, $length);
    }

    public function updateEmail($id, $email)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->email = $email;

                return $user->save();
            }

            return false;
        } catch (\Exception $e) {
            report($e);

            return false;
        }
    }

    public function createUserWithPlan($name, $email, $plan)
    {
        try {
            $route = 'login';
            $baseUrl = config('app.url').$route;
            $userPassword = $this->generatePassword(10);
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($userPassword),
            ]);
            $user->uid = $user->id;
            $user->email_verified_at = now()->format('Y-m-d H:i:s');
            $user->save();
            FacadesNotification::route('mail', [
                $user->email => $user->name,
            ])->notify(new RegistrationDetailsNotification($user->email, $userPassword, $baseUrl));

            return $user;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function updateClickBankPlan($user_id, $new_plan, array $data = [])
    {
        $user = $this->findById($user_id);
        $user->curr_bank = config('app.CLICK_BANK_USER');
        $user->save();
        $order_id = $data['order_id'] ?? null;
        $is_active = $data['is_active'] ?? 1;
        $exp_date = $data['exp_date'] ?? null;

        $UserSubscription = [
            'user_id' => $user_id,
            'plan_name' => $new_plan,
            'order_id' => $order_id,
            'is_active' => $is_active,
            'exp_date' => $exp_date,
        ];
        UserSubscription::create($UserSubscription);
    }

    public function upgradeProrated($sub_id, $product)
    {
        if ($sub_id) {
            $data = $this->subscriptionClass->getProratedPlanChange($sub_id, $product);

            return $data;
        }
    }

    public function getActiveSubscription($user_id)
    {
        $response = [];
        $subscription = UserSubscription::where([
            'user_id' => $user_id,
            'is_active' => 1,
            'is_api_plan' => 0,
        ])
            ->whereNotIn('plan_name', ['homedesignsai-extra-room-types', 'homedesignsai-extra-styles', 'premium-precision-upgrade-plus', 'premium-precision-upgrade'])
            ->latest()->first();
        $response['subscription'] = $subscription;
        if ($subscription) {
            $response['activeSubscriptionDetails'] = $this->orderClass->getOrderDetail($subscription->order_id);
        }

        return $response;
    }

    public function getActiveSubscriptionFromFastSpring($subscription_id)
    {
        $subscription = $this->orderClass->getSubscriptionDetail($subscription_id);
        if (isset($subscription['error'])) {
            return response()->json(['success' => false, 'message' => $subscription['error']['subscription']]);
        }

        return response()->json(['success' => true, 'data' => $subscription]);
    }

    public function updateActiveSubscriptionToFastSpring($subscription_id, $product, $user_id)
    {
        $subscription = $this->orderClass->updateSubscriptionDetail($subscription_id, $product);
        if (isset($subscription['error'])) {
            return response()->json(['success' => false, 'message' => $subscription['error']['subscription']]);
        }

        return response()->json(['success' => true, 'data' => $subscription]);
    }

    public function getProductByPathFS($roduct)
    {
        $product = $this->apiClass->getProductByPath($roduct);
        if (isset($product['error'])) {
            return response()->json(['success' => false, 'message' => $product['error']['subscription']]);
        }

        return response()->json(['success' => true, 'data' => $product]);
    }

    public function pauseSubscription($request)
    {
        $product = $this->subscriptionClass->pauseActiveSubscription($request->subscription_id, $request->pausePeriodCount);
        if (isset($product['error'])) {
            return response()->json(['success' => false, 'message' => $product['error']]);
        }

        return response()->json(['success' => true, 'data' => $product]);
    }

    public function cancelSchduledPausedSubscription($request)
    {
        $subscription = $this->subscriptionClass->cancelPausedSubscription($request->subscription_id);
        if (isset($subscription['error'])) {
            return response()->json(['success' => false, 'message' => $subscription['error']]);
        }

        return response()->json(['success' => true, 'data' => $subscription]);
    }

    public function cancelSubscription($request)
    {
        $subscription = $this->subscriptionClass->cancelActiveSubscription($request->subscription_id);
        if (isset($subscription['error'])) {
            return response()->json(['success' => false, 'message' => $subscription['error']]);
        }

        return response()->json(['success' => true, 'data' => $subscription]);
    }

    public function resumeCancelledSubscription($request)
    {
        $subscription = $this->subscriptionClass->resumeCancelledSubscription($request->subscription_id, $request->deactivation);
        if (isset($subscription['error'])) {
            return response()->json(['success' => false, 'message' => $subscription['error']]);
        }

        return response()->json(['success' => true, 'data' => $subscription]);
    }

    public function getAPIUsersByDate($fromDate, $toDate)
    {
        $user_query = User::select([
            'id',
            'name',
            'email',
            'created_at',
        ]);

        $user_query->where('is_api_user', 1);
        // $user_query->whereBetween("created_at", [$fromDate, $toDate]);
        $user_query
            ->whereHas('activeSubscription', function ($user_query) use ($fromDate, $toDate) {
                $user_query->where('is_api_plan', 1);
                // $user_query->where('order_id', "!=", null);
                $user_query->whereBetween('created_at', [$fromDate, $toDate]);
                $user_query->whereNotIn('plan_name', $this->addonplans);
            })
            ->with(['activeSubscription' => function ($user_query) use ($fromDate, $toDate) {
                $user_query->where('is_api_plan', 1);
                // $user_query->where('order_id', "!=", null);
                $user_query->whereBetween('created_at', [$fromDate, $toDate]);
                $user_query->whereNotIn('plan_name', $this->addonplans);
                $user_query->select('user_id', 'plan_name', 'used_credit', 'is_canceled', 'created_at');
                $user_query->groupBy('user_id');
            }]);
        $registered_users = $user_query->get();
        // load canceled API users
        $cancelled_user_query = User::select([
            'id',
            'name',
            'email',
            'created_at',
        ]);

        $cancelled_user_query->where('is_api_user', 1);

        $cancelled_user_query
            ->whereHas('activeSubscription', function ($cancelled_user_query) use ($fromDate, $toDate) {
                $cancelled_user_query->where('is_api_plan', 1);
                $cancelled_user_query->where('is_canceled', 1);
                $cancelled_user_query->where('order_id', '!=', null);
                $cancelled_user_query->whereBetween('created_at', [$fromDate, $toDate]);
                $cancelled_user_query->whereNotIn('plan_name', $this->addonplans);
            })
            ->with(['activeSubscription' => function ($cancelled_user_query) use ($fromDate, $toDate) {
                $cancelled_user_query->where('is_api_plan', 1);
                $cancelled_user_query->where('is_canceled', 1);
                $cancelled_user_query->where('order_id', '!=', null);
                $cancelled_user_query->whereBetween('created_at', [$fromDate, $toDate]);
                $cancelled_user_query->whereNotIn('plan_name', $this->addonplans);
                $cancelled_user_query->select('user_id', 'plan_name', 'used_credit', 'is_canceled', 'created_at');
                $cancelled_user_query->groupBy('user_id');
            }]);
        $registered_users_canceled = $cancelled_user_query->get();

        return ['success' => true, 'data' => ['registered_users' => $registered_users, 'registered_users_canceled' => $registered_users_canceled]];
    }

    public function adminTestAPITokensPanel($request)
    {
        ini_set('memory_limit', '1280M');
        $filters = $request->all();
        $length = $request->length ?? 10;
        $page = 1;
        if (isset($filters['page'])) {
            $page = (int) $filters['page'];
        }
        $user_query = TestApiToken::select([
            'id',
            'name',
            'email',
            'token',
            'usage_count',
            'created_at',
        ]);

        $user_query->skip(($page) * $length)->take($length);

        if (isset($filters['created_at'])) {
            $user_query->whereDate('created_at', '>=', $filters['created_at']);
        }

        if (isset($filters['search']) && is_numeric($filters['search']) && filter_var($filters['search'], FILTER_VALIDATE_INT) !== false) {
            $filters['search'] = (int) $filters['search'];
        }
        if (isset($filters['search']) && $filters['search'] != '') {
            $user_query->where(function ($user_query) use ($filters) {
                if (isset($filters['search_by'])) {
                    if ($filters['search_by'] == 'id') {
                        $user_query->where($filters['search_by'], $filters['search']);
                    } elseif ($filters['search_by'] == 'name') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search'].'%');
                    } elseif ($filters['search_by'] == 'email') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search'].'%');
                    } elseif ($filters['search_by'] == 'created_at') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search'].'%');
                    }
                } else {
                    if (is_string($filters['search'])) {
                        $user_query->Where('email', 'like', '%'.$filters['search'].'%');
                        $user_query->orWhere('name', 'like', '%'.$filters['search'].'%');
                        $user_query->orWhere('created_at', 'like', '%'.$filters['search'].'%');
                    }
                }
            });
        }

        $orderOn = $filters['sort_on'] ?? 'id';
        $orderBy = $filters['sort_by'] ?? 'desc';

        if (in_array($orderOn, ['registration_date'])) {
            if ($orderOn == 'registration_date') {
                $user_query->orderBy('created_at', $orderBy);
            }
        } else {
            $user_query->orderBy($orderOn, $orderBy);
        }
        $users = $user_query->paginate($length);

        return $users;
    }

    public function getAPIUsersByDateFromFastSpring($fromDate, $toDate, $event, $scope, $products)
    {
        $response = $this->apiClass->getAPISubscriptionDetailsByFromToDate($fromDate, $toDate, $event, $scope, $products);
        if (isset($response['result']) && ($response['result'] == 'success')) {
            if ($response['total'] > 0) {
                foreach ($response['subscriptions'] as $key => $subscription) {
                    $userdetails = UserSubscription::where('order_id', $subscription['initialOrderId'])->with('user')->first();
                    if ($userdetails) {
                        $response['subscriptions'][$key]['subscriptiondetailsfromDB'] = $userdetails->toArray();
                    }
                }
            }
        }

        return $response;
    }

    public function adminWidgetUsersPanel($request)
    {
        ini_set('memory_limit', '1280M');
        $user_ids = false;
        $filters = $request->all();
        $length = $filters['length'] ?? 25;
        $start = (int) ($filters['start'] ?? 0);
        $page = 1;
        $recordsTotal = User::where(['is_api_user' => 1, 'is_widget_user' => 1])->count('id');
        if (isset($filters['page'])) {
            $page = (int) $filters['page'];
        }
        $user_query = User::select([
            'id',
            'name',
            'email',
            'created_at',
            'email_verified_at',
            'is_premium_plan',
            'is_extra_room_bumps',
            'is_extra_style_bumps',
        ]);

        $user_query->where(['is_api_user' => 1, 'is_widget_user' => 1]);
        $user_query->skip(($page) * $length)->take($length);

        if (isset($filters['user_created_at_start'])) {
            $user_query->whereDate('created_at', '>=', $filters['user_created_at_start']);
        }

        if (isset($filters['user_created_at_end'])) {
            $user_query->whereDate('created_at', '<=', $filters['user_created_at_end']);
        }

        if (isset($filters['search']['value']) && is_numeric($filters['search']['value']) && filter_var($filters['search']['value'], FILTER_VALIDATE_INT) !== false) {
            $filters['search']['value'] = (int) $filters['search']['value'];
        }
        if (isset($filters['search']) && $filters['search'] != '') {
            $user_query->where(function ($user_query) use ($filters) {
                if (isset($filters['search_by'])) {
                    if ($filters['search_by'] == 'id') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);
                    } elseif ($filters['search_by'] == 'name') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'email') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'created_at') {
                        $user_query->where($filters['search_by'], 'like', '%'.$filters['search']['value'].'%');
                    } elseif ($filters['search_by'] == 'email_verified_at') {
                        if ($filters['search'] == 'yes' || $filters['search'] == 'yes' || $filters['search']['value'] == 'true') {
                            $user_query->where($filters['search_by'], '!=', null);
                        } else {
                            $user_query->where($filters['search_by'], null);
                        }
                    }
                } else {
                    if (is_int($filters['search']['value'])) {
                        $user_query->where('id', 'like', '%'.$filters['search']['value'].'%');
                        $user_query->orWhere('total_designs', 'like', '%'.$filters['search']['value'].'%');
                    } elseif (is_string($filters['search']['value'])) {
                        $user_query->Where('email', 'like', '%'.$filters['search']['value'].'%');
                        $user_query->orWhere('name', 'like', '%'.$filters['search']['value'].'%');
                        $user_query->orWhere('created_at', 'like', '%'.$filters['search']['value'].'%');
                    }
                }
            });
        }

        if (isset($filters['search']['value']) && $filters['search']['value'] != '') {
            $user_query->WhereHas('activeSubscription', function ($user_query) use ($filters) {
                $user_query->where('is_api_plan', 1);
                $user_query->whereNotIn('plan_name', $this->addonplans);
                if (isset($filters['search_by'])) {
                    if (isset($filters['search_by']) && $filters['search_by'] == 'total_plan_credit') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);

                    } elseif (isset($filters['search_by']) && $filters['search_by'] == 'used_credit') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);

                    } elseif (isset($filters['search_by']) && $filters['search_by'] == 'plan_name') {
                        $user_query->where($filters['search_by'], $filters['search']['value']);
                    }
                } else {
                    if (is_int($filters['search']['value'])) {
                        $user_query->where(function ($user_query) use ($filters) {
                            $user_query->orWhere('total_plan_credit', $filters['search']['value']);
                            $user_query->orWhere('used_credit', $filters['search']['value']);
                        });
                    }
                }
                $user_query->select('user_id', 'plan_name', 'total_plan_credit', 'used_credit');
                $user_query->orderBy('created_at', 'desc');
            });
        } else {
            $user_query->whereHas('activeSubscription', function ($user_query) {
                $user_query->where('is_widget_user', 1);
                $user_query->whereNotIn('plan_name', $this->addonplans);
                $user_query->select('user_id', 'plan_name', 'total_plan_credit', 'used_credit');
                $user_query->groupBy('user_id');
                $user_query->orderBy('created_at', 'desc');
            });
        }
        $user_query->with(['activeSubscription' => function ($user_query) {
            $user_query->where('is_api_plan', 1);
            $user_query->whereNotIn('plan_name', $this->addonplans);
            $user_query->select('user_id', 'plan_name', 'total_plan_credit', 'used_credit');
            $user_query->orderBy('created_at', 'desc');
        }])->with('subscription');
        if (isset($filters['order'][0]['column'])) {
            $orderOn = $filters['sort_on'] ?? 'id';
            $orderBy = isset($filters['order']) ? $filters['order'][0]['dir'] : $filters['sort_by'];
            if (in_array($orderOn, ['registration_date'])) {
                if ($orderOn == 'registration_date') {
                    $user_query->orderBy('created_at', $orderBy);
                }
            } else {
                $user_query->orderBy($filters['columns'][$filters['order'][0]['column']]['data'], $orderBy);
            }
        }
        $user_query->skip($start)->limit($length);
        $recordsFiltered = $user_query->count('id');
        $users = $user_query->get()->map(function ($user) {
            $user->encrypted_id = encrypt($user->id);

            return $user;
        });

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => $users,
        ]);
    }
}
