<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = "album";

    protected $fillable = [
        'name', 'user_id','hidden',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
    public function video(){
        return $this->hasMany('App\Models\Video', 'album_id', 'id');
    }
}
