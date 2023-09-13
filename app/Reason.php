<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $fillable = ['id','reason', 'created_at', 'updated_at'];
}
