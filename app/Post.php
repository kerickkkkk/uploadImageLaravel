<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 將防禦的部分先開放，但這個會有被入侵資料庫的問題
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
