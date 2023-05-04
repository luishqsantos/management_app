<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    protected $fillable = ['name', 'telephone', 'email', 'reason_id', 'message'];
}
