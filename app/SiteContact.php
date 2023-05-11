<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SiteContact extends Model
{
    protected $fillable = ['name', 'telephone', 'email', 'reason_id', 'message', 'status'];

    public function reason()
    {
        return $this->belongsTo('App\Reason');
    }
}
