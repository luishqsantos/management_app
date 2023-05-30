<?php

namespace App;

use App\SiteContact;
use Illuminate\Database\Eloquent\Model;

class SiteContactReply extends Model
{
    protected $fillable = ['message'];

    public function contact()
    {
        return $this->belongsTo(SiteContact::class);
    }
}
