<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user-id',
        'comment'
    ];

    public function users()
    {
        return $this->belongsTo('user', 'user_id', 'id');

    }
}
