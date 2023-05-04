<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    protected $table = 'units';
    protected $fillable=['unity', 'description'];

    public function productDetail()
    {
        return $this->belongsTo('App\ProductDetail');
    }
}
