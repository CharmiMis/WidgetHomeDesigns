<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProYearlyModel extends Model
{
    use HasFactory;

    public $table = 'upgrade_to_pro_yearly';

    protected $fillable = [
        'user_id',
        'upgrade_button_count',
        'close_button_count',
    ];
}
