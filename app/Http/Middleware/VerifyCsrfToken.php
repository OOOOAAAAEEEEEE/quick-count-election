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
        '/admin/dataLengkap/delete/*',
        '/admin/dashboard/delete/*',
        '/admin/master-kecamatan/delete/*',
        '/admin/master-kelurahan/delete/*',
        '/admin/master-caleg/delete/*',
        '/admin/master-partai/delete/*',
        '/admin/master-user/delete/*',
        '/member/dataLengkap/delete/*'
    ];
}
