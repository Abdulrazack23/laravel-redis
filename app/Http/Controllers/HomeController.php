<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cacheKey = 'dashboard_data'; 
        if (Redis::exists($cacheKey)) {
            $data = Redis::get($cacheKey);
            $data = json_decode($data, true); 
        } else {
         
            $data = [
                'productsSold' => 4565,
                'netProfit' => 8541,
              
            ];

            Redis::setex($cacheKey, 600, json_encode($data));
        }
    
        return view('dashboard/dashboard', compact('data'));
    }
    
}

