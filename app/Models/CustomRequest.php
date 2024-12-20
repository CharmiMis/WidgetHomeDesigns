<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fullname',
        'email',
        'custom_credit',
        'description',
    ];
}
