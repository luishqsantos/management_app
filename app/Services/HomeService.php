<?php

namespace App\Services;

use App\Order;
use App\Client;
use App\Product;
use App\Provider;
use App\AccessLog;
use App\ProductStock;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeService
{
    public function dataDashboard()
    {
        return (object)[
            'clients'           =>  Client::count(),
            'providers'         => Provider::count(),
            'access'            => AccessLog::where('route', 'LIKE', "%login%")->count(),
            'totalStock'        => ProductStock::pluck('total')->sum(),
            'products'          => Product::count(),
            'orders'            => Order::count(),
            'ordersByDay'       => $this->getOrdersByDay(),
            'providersByState'  => $this->getprovidersByState()
        ];
    }

    public function getOrdersByDay()
    {
        $ordersByDay = Order::selectRaw('DATE(created_at) as day, COUNT(*) as count')
            ->groupBy('day')
            ->orderBy('day', 'desc')
            ->take(7)
            ->get();

        // Transforma as datas em objetos Carbon para formatar a exibição
        $ordersByDay = $ordersByDay->map(function ($item) {
            return (object)[
                'day'   => Carbon::createFromFormat('Y-m-d', $item->day)->format('d/m/y'),
                'count' => $item->count,
            ];
        });

        return $ordersByDay;
    }

    public function getProvidersByState()
    {
        $providersByState = Provider::select('uf', DB::raw('COUNT(*) as count'))
            ->groupBy('uf')
            ->get();

        // Transforma as datas em objetos Carbon para formatar a exibição
        $providersByState = $providersByState->map(function ($item) {
            return (object)[
                'uf'    => $item->uf,
                'count' => $item->count,
            ];
        });

        return $providersByState;
    }
}
