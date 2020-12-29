<?php

namespace App;

use App\Mail\NewUserWelcomMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function($user){
            // 設定一些預設值
            $user->profile()->create([
                'title'=> $user->username,
            ]);
            Mail::to($user->email)->send(new NewUserWelcomMail());
        });
        
    }

    // 如果是 1 對 多 的 名稱要改成 post(s) 複數
    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }
    // 多對多
    public function following(){
        return $this->belongsToMany(Profile::class);
    }

    // 如果是 1 對 1 的 名稱要改成 profile 單數
    public function profile()
    {
        //User 不用 use 是因為他在 namespace APP 
        return $this->hasOne(Profile::class);
    }


}
