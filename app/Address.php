<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
  protected $fillable = ['client_id', 'user_id','funcionario_id','street', 'number', 'complement', 'zip','district','city','state'];
  protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
