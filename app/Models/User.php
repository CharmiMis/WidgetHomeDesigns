<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use DateTime;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function subscription()
    {
        // $today = Carbon::now()->toDateString();
        // // return $this->hasOne(UserSubscription::class, 'user_id')
        // //     // ->where(function ($query) use ($today) {
        // //     //     $query->whereNull('exp_date');
        // //     //     $query->orWhere('exp_date', '>', $today);
        // //     // })
        // //     ->where('is_active', 1)->where('is_api_plan', 0)->latest();
        // return $this->hasOne(UserSubscription::class, 'user_id')
        //     ->where('is_active', 1)->where('is_api_plan', 0)
        //     ->whereNotIn('plan_name', ['homedesignsai-extra-room-types', 'homedesignsai-extra-styles', 'premium-precision-upgrade-plus', 'premium-precision-upgrade'])->latest();
        $today = Carbon::now()->toDateString();

        return $this->hasOne(UserSubscription::class, 'user_id')
            ->where(function ($query) use ($today) {
                $query->whereNull('exp_date');
                $query->orWhere('exp_date', '>', $today);
            })
            ->where('is_active', 1)->where('is_api_plan', 0)
            ->whereNotIn('plan_name', ['homedesignsai-extra-room-types', 'homedesignsai-extra-styles', 'premium-precision-upgrade-plus', 'premium-precision-upgrade'])
            ->latest();
    }

    public function activeSubscription()
    {
        return $this->hasOne(UserSubscription::class, 'user_id');
    }

    public function activePlan()
    {
        $subscription = $this->subscription;
        if ($subscription && $subscription->plan_name != 'free') {
            return $subscription->plan_name;
        }

        return 'free';
        // return null;
    }

    public function getEmailStatusAttribute()
    {
        return ($this->email_verified_at != null) ? 'Yes' : 'No';
    }

    // public function details()
    // {
    //     return $this->hasOne(UserDetail::class);
    // }

    public function subscriptions()
    {
        return $this->hasMany(UserSubscription::class, 'user_id');
    }

    public function dailyUsage()
    {
        return $this->hasMany(DailyUsages::class, 'user_id');
    }

    public function publicGallery()
    {
        return $this->hasMany(PublicGallery::class, 'user_uid', 'uid');
    }

    // public function userServey()
    // {
    //     return $this->hasMany(UserServey::class, 'user_id');
    // }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    // public function sendEmailVerificationNotification()
    // {
    //     Log::info('CALL');
    //     // $this->notify(new UserVerifyNotification);
    //     $this->notify(new CustomVerifyEmail());
    //     Log::info('after mail send');
    // }

    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new CustomResetPassword($token)); // Use custom reset password notification
    // }

    public function isPrecisionPlan($plan)
    {
        $createdAtDate = new DateTime(auth()->user()->created_at);
        $comparisonDate = new DateTime('2023-08-05');
        $premiumPlan = auth()->user()->is_premium_plan;
        $precisionUser = false;
        if ($createdAtDate >= $comparisonDate) {
            if ($premiumPlan == 1 || $plan == 'premium-precision-upgrade-plus-ds') {
                $precisionUser = false;
            } else {
                $precisionUser = true;
            }
        } else {
            $precisionUser = false;
        }

        return $precisionUser;
    }

    // public function apiAccessToken()
    // {
    //     return $this->hasOne(ApiAccessToken::class, 'user_id')->latest();
    // }

    public function isApiUser($user)
    {
        $apiUser = false;
        if ($user->is_api_user == 1) {
            $apiUser = false;
        } else {
            $apiUser = true;
        }

        return $apiUser;
    }

    public function crossShellPlan()
    {
        $subscription = $this->subscription;
        $orderBumps = [];
        if ($subscription) {
            $otherOrders = User::where('id', $subscription->user_id)
                ->select('is_extra_style_bumps', 'is_extra_room_bumps', 'is_premium_plan')
                ->first();
            if ($otherOrders->is_premium_plan == 1) {
                $orderBumps[] = 'Premium';
            }
            if ($otherOrders->is_extra_style_bumps == 1 && $otherOrders->is_extra_room_bumps == 1) {
                $orderBumps[] = 'Extra Styles';
                $orderBumps[] = 'Extra Rooms';
            } elseif ($otherOrders->is_extra_style_bumps == 1) {
                $orderBumps[] = 'Extra Styles';
            } elseif ($otherOrders->is_extra_room_bumps == 1) {
                $orderBumps[] = 'Extra Rooms';
            }

            return $orderBumps;
        }

        return 'free';
    }

    public function freeTrialPlan()
    {
        $subscription = $this->subscription;
        $authId = auth()->user()->id;
        $planNames = ['homedesignsai-pro-7-days-trial', 'homedesignsai-pro-7-days-trial-yearly-new', 'homedesignsai-pro-7-days-trial-yearly-facebook', 'homedesignsai-pro-7-days-trial-facebook'];
        if ($subscription && ($subscription->plan_name == 'homedesignsai-pro-7-days-trial-yearly-new' || $subscription->plan_name == 'homedesignsai-pro-7-days-trial' || $subscription->plan_name == 'homedesignsai-pro-7-days-trial-yearly-facebook' || $subscription->plan_name == 'homedesignsai-pro-7-days-trial-facebook')) {
            $freeTrialPlanCount = UserSubscription::whereIn('plan_name', $planNames)
                ->where('user_id', $authId)
                ->count();

            return $freeTrialPlanCount;
        }

        return 'free';
    }

    public function getCountOfCloseButton()
    {
        $proYearlyModel = ProYearlyModel::where('user_id', $this->id)->first();

        return $proYearlyModel ? $proYearlyModel->close_button_count : 0;
    }

    public function activeBumpsPlan()
    {
        $bumpsPlan = $this->crossShellPlan();
        if (isset($bumpsPlan) && ! empty($bumpsPlan)) {
            return $bumpsPlan;
        }

        return 'No Bumps Plan Added';
    }

    public function activePlanDetails()
    {
        $subscription = $this->subscription;

        if ($subscription && $subscription->plan_name != 'free') {
            return $subscription;
        }

        return 'free';
    }
}
