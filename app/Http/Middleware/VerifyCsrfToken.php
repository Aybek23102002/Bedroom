<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api/booking',
        '/api/admin/bedrooms',
        '/api/admin/floors',
        '/api/admin/sections',
        '/api/admin/rooms',
        '/api/admin/bedroom/admin/create',
        '/api/admin/admins',

    ];
}
