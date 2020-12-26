<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    // index 方法
    // Route::get('/home', 'HomeController @index')->name('home');
    // public function index()
    // {   
    //     // home ( .blade.php -> 後面可以省) 
    //     return view('home');
    // }
}
