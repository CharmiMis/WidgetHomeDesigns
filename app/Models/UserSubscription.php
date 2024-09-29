<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSubscription extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'user_subscriptions';

    public $fillable = [
        'user_id',
        'plan_name',
        'order_id',
        'is_active',
        'is_api_plan',
        'total_plan_credit',
        'used_credit',
        'exp_date',
        'total_generation',
        'extra_apis',
        'is_canceled',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
