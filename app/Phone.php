<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
  use SoftDeletes;
  protected $fillable = ['number',];
  protected $dates = ['created_at', 'updated_at', 'deleted_at'];

  public function clients(){
      return $this->belongsToMany(Client::class);
  }

  public function users(){
      return $this->belongsToMany(User::class);
  }
}
