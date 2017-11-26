<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_id', 'user_id', 'start_at', 'end_at'];
    protected $dates = ['start_at', 'end_at', 'created_at', 'updated_at', 'deleted_at'];
    protected $appends = ['total'];

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

        public function getTotalAttribute()
        {
            if($this->products->count() == 0)
                return 0;

            return $this->products->sum('price');
        }
}
