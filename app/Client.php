<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'telephone', 'address'];

    public function order()
    {
        return $this->hasmany('App\Order');
    }

    public function productOrders()
    {
        return $this->hasMany('App\ProductOrder');
    }
}