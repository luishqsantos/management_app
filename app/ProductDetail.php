<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = ['product_id', 'length', 'height', 'width', 'weight', 'unity_id', 'image'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function unity()
    {
        return $this->hasOne('App\Unity');
    }
}
