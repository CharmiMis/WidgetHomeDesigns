<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetUserData extends Model
{
    use HasFactory;

    protected $table = 'widget_user_data';

    protected $fillable = [
        'user_id',
        'logo',
        'domain_name',
        'website_name',
        'accessible_features',
        'access_url',
    ];
}
