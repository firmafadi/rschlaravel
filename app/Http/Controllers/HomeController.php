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
<<<<<<< HEAD
            'description' => 'Application is Running -- on test firma100-master'
=======
            'description' => 'Application is Running -- on test firma100-master01',
>>>>>>> 10a04e145702090ed2234331dd97cd4dd150fd0c
            'error' => false
        ];
    }
}
