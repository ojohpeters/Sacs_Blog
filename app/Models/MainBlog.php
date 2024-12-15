<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainBlog extends Model
{
    //
    protected $table = 'MainBlog';  
    protected $fillable = [
        'Title',
        'MainPost',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
