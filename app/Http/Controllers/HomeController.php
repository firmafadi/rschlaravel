<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __invoke()
    {
        return [
            'app'    => config('app.name'),
            'server' => gethostname(),
            'description' => 'Application is Running -- on test firm0',
            'error' => false
        ];
    }
}
