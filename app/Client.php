<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'rg', 'cpf'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function addresses()
    {
        return $this->belongsToMany(Address::class);
    }

    public function phones()
    {
        return $this->belongsToMany(Phone::class);
    }
}
