<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'info',
        'user_id',


    ];

    public function users()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');

    }
}
