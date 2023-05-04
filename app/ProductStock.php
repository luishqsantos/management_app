<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductStock extends Model
{

    protected $fillable = ['product_id', 'sale_price', 'quantity', 'total', 'min_stock', 'max_stock'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}


