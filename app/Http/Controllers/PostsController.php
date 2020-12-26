<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // 加一個 middleware 進入的都需要有權限才可以進入
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        // tips:
        // 建議頁面命名 controllerName.methodName
        // 會比較好檔案
        return view('posts.create');
    }

    public function store(){
        // 先測試抓看看全部收到的資訊
        // dd( request()->all() );

        // 驗證 caption, image
        $data = request()->validate([
            'caption' => 'required',
            //  兩種寫法 用 | 連接 或者 陣列方法
            // 'image' => 'required|image',
            'image' => ['required', 'image'],
        ]);
        
        // 將檔案路徑用出來
        // dd(request('image')->store('uploads','public'));
        $imagePath = request('image')->store('uploads','public');

        // 切圖片 非重新整理圖片
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        
        
        // 寫入資料
        // 方法一: 
        // $post = \App\Post();
        // $post->caption = $data['caption'];
        // $post->save();
        
        // 方法二:
        // \App\Post::create($data);
        // 以上會缺少關聯
        
        // 方法三: 取得 user_id 關聯 用 auth() 來幫助取得關聯
        // $data 直接填入
        // auth()->user()->posts()->create($data);

        // $data 手動填入
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);


        // dd( request()->all() );

        // 轉倒向
        return redirect('/profile/' . auth()->user()->id);
    }

    //// Route 參數 與 controller method 參數
    // Route::get('/p/{post}', 'PostsController@show');
    //  route 那邊掛 post -> controller 就掛上的事 $post的參數
    // route model binding
    public function show(\App\Post $post){
        // dd($post);
        // 原始寫法 
        // return view('posts.create', [
        //     'post' => $post,
        // ]);
        // 可以改用 compact
        return view('posts.show', compact('post'));
    }
}
