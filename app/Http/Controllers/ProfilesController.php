<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    // index use route binding and compact v1.1
    // namespace 有所以可以在縮寫
    // public function index(\App\User $user)
    public function index(User $user)
    {   
        return view('profile.index', compact('user'));

        // $user = User::findOrFail($user);
        // 用 route model binding 取代
        // return view('profile.index',[
        //     'user'=>$user, 
        // ]);
    }

    // index v1.0
    // public function index($user)
    // {   
    //     // home ( .blade.php -> 後面可以省) 
    //     // dd(User::find($user));
    //     $user = User::findOrFail($user);

    //     return view('profile.index',[
    //         'user'=>$user, 
    //     ]);

    //     //重構一
    //     // return view('home',[
    //     //     'user'=>$user, // 用等於箭頭
    //     // ]);
        
    // }
    
    // 這邊的 $user 來自 Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit'); 的 user
    public function edit(User $user){
        return view('profile.edit', compact('user'));
    }
}
