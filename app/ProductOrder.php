<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $fillable = ['order_id', 'product_id', 'amount', 'total'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
