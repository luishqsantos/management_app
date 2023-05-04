<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $fillable = ['provider_id', 'name', 'description'];

    public function productDetail()
    {
        return $this->hasOne('App\ProductDetail');
    }

    public function productStock()
    {
        return $this->hasOne('App\ProductStock');
    }

    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'product_orders')->withPivot('amount');
    }

}
