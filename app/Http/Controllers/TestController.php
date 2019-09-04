<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class TestController extends Controller
{
    /**
     * Method for test view
     *
     * @return Factory|View
     */
    public function view()
    {
        return view('welcome');
    }

    public function api()
    {
        return response()->json([
            'api' => 'response',
        ]);
    }
}
