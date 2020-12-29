<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded =[];

    public function defaultImage()
    {
        return '/storage/'. ($this->image ? $this->image : 'profile/N8w3cKLR51Fkb76h9l8ZC5mU4f8lYaJC8J8JOXIH.jpg');
    }
    
    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
