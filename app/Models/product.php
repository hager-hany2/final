<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\image;
use Illuminate\Database\Eloquent\SoftDeletes;


class product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [

        'name',
        'price',
        'description',
        'quantity'


    ];

    public function image()
    {
        return $this->morphOne(image::class, 'imageable');
    }
}
