<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(int $p1, int $p2)
    {

        return view('site.test', compact('p1', 'p2')); //Método compact nativo do PHP

    }
}
