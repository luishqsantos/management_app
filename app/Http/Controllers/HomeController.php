<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Services\HomeService;

class HomeController extends Controller
{

    protected $homeService;

    /**
     * __construct
     *
     * @param  HomeService $homeService
     * @return void
     */
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index()
    {
        $dataDashboard = $this->homeService->dataDashboard();

        //dd($dataDashboard->monthOrders);
        return view('app.home', ['dataDashboard' => $dataDashboard]);
    }
}
