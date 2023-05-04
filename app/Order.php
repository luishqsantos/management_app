<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_id'];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_orders')->withPivot('id', 'amount', 'total', 'created_at');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
