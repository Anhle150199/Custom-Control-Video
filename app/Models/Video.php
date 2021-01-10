<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = "video";

    protected $fillable = [
        'title', 'summary', 'video', 'user_id','hidden', 'size'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function album(){
        return $this->belongsTo('App\Models\Album', 'album_id', 'id');
    }
}
