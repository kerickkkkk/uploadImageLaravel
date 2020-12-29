<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{

    // index use route binding and compact v1.1
    // namespace 有所以可以在縮寫
    // public function index(\App\User $user)
    public function index(User $user)
    {   
        $follows =( auth()->user() )? auth()->user()->following->contains($user->id) : false;

        // $postCount = $user->posts->count();
        $postCount = Cache::remember(
            'count.posts.' . $user->id, 
            now()->addSeconds(30),
            function () use($user) {
                return $user->posts->count();
            }); 
        

        // $followersCount = $user->profile->followers->count();
        $followersCount = Cache::remember(
            'count.followers' . $user->id,
            now()->addSeconds(30) , 
            function () use($user) {
                $user->profile->followers->count();
            });

        // $followingCount = $user->following->count();
        $followingCount = Cache::remember(
            'count.following' . $user->id,
            now()->addSeconds(30) , 
            function () use($user) {
                $user->following->count();
            });

        return view('profile.index', compact('user', 'follows' ,'postCount','followersCount','followingCount'));

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
        $this->authorize('update' , $user->profile);
        return view('profile.edit', compact('user'));
    }

    public function update(User $user){
        $this->authorize('update' , $user->profile);
        // $imageAry = [];

        $data = request()->validate([
            'title'=> 'required',
            'description'=> 'required',
            'url'=> 'url',
            'image'=> '',
        ]);
        //只要沒有圖片才提醒
        if(request('image')){
            $imagePath = request('image')->store('profile','public'); // "/profile/... image"
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500,500);
            $image->save();
            $imageAry = ['image'=> $imagePath];
        }
        // dd(array_merge($data,$imageAry));
        // $user->profile->update($data);
        // auth()->user()->profile->update($data);
        // 只有要改一個 使用 array_merge 來整併要修改的屬性
        auth()->user()->profile->update(array_merge(
            $data,
            $imageAry ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
