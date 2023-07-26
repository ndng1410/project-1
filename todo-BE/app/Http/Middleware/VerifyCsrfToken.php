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
        // 'http://127.0.0.1:8000/task/delete/9',
        // 'http://127.0.0.1:8000/task/delete/10',
        'http://127.0.0.1:8000/task',
        'http://127.0.0.1:8000/tasks',
        'http://127.0.0.1:8000/tasks/5',
        'http://127.0.0.1:8000/task/delete/5',
    ];
}
