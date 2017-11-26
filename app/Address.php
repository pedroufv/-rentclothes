<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = ['client_id', 'user_id','funcionario_id','street', 'number', 'zip_code','neighborhood','city','state','start_at', 'end_at'];
  protected $dates = ['start_at', 'end_at','created_at', 'updated_at', 'deleted_at'];


  public function client()
  {
      return $this->belongsTo(Client::class);
  }

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function products()
  {
      return $this->belongsToMany(Product::class);
  }

}
