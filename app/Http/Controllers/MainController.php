<?php

namespace App\Http\Controllers;

use App\Reason;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return view(
            'site.main',
            [
                'reason' => Reason::all()
            ]
        );
    }
}
