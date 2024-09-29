<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyUsages extends Model
{
    use HasFactory;

    public $table = 'user_daily_usages';

    public $fillable = ['user_id', 'count', 'date'];

    public $timestamps = false;
}
