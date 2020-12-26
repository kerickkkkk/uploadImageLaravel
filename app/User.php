<?php

namespace App;

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

    // 如果是 1 對 多 的 名稱要改成 post(s) 複數
    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }

    // 如果是 1 對 1 的 名稱要改成 profile 單數
    public function profile()
    {
        //User 不用 use 是因為他在 namespace APP 
        return $this->hasOne(Profile::class);
        return $this->hasOne(Profile::class);
    }


}
