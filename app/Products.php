<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $fillable = ['description', 'size', 'price'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
