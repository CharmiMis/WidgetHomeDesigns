<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/widgetData/*',
        '/widget/*',
        'runpodWidget/*',
        '/runpodWidget/beautiful_redesign/*',
        'webWidget/**',
        '/runpod/*',
        '/runpod/getMasking/*',
        'runpodWidget/getMasking/*',
        'get-base64',
        '/runpodWidget/fullHD'
    ];
}
