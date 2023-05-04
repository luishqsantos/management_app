<?php

namespace App\Http\Controllers;

use App\Order;
use App\Client;
use App\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Requests\OrderStoreRequest;

class OrderController extends Controller
{

    protected $orderService;

    /**
     * __construct
     *
     * @param  OrderService $orderService
     * @return void
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        
        $search = $request->query('search');
        $orders = $this->orderService->search($search);

        return view('app.order.index', ['orders' => $orders, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $clients = Client::all();
        return view('app.order.create_edit', ['clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrderStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(OrderStoreRequest $request)
    {
        Order::create($request->all());

        return redirect()->route('order.index')->with('message', 'Pedido cadastrado com sucesso')->with('color', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Order $order)
    {
        if ($order->products()->exists()) {
            return redirect()->route('order.index')->with('message', 'O pedido de "'.$order->client->name .'" não pode ser exlcuido pois há itens relacionados a ele!')->with('color', 'warning');
        }

        $order->delete();

        return redirect()->route('order.index')->with('message', 'Pedido Excluido com sucesso')->with('color', 'success');
    }
}
