<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Http\Requests\ClientStoreRequest;

class ClientController extends Controller
{

    protected $clientService;

    /**
     * __construct
     *
     * @param  ClientService $clientService
     * @return void
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
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
        $clients = $this->clientService->search($search);

        return view('app.client.index', ['clients' => $clients, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('app.client.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ClientStoreRequest $request)
    {
        $client = Client::create($request->all());

        return redirect()->route('client.edit', $client->id)->with('message', 'Cliente cadastrado com sucesso!')->with('color', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Client $client)
    {
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(Client $client)
    {
        return view('app.client.create_edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClientStoreRequest  $request
     * @param  Client  $client
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ClientStoreRequest $request, Client  $client)
    {
        $client->update($request->all());

        return redirect()->route('client.edit', $client->id)->with('message', 'Cliente atualizado com sucesso!')->with('color', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Client  $client)
    {
        $client->delete();

        return redirect()->route('client.index')->with('message', 'Cliente excluido com sucesso!')->with('color', 'success');
    }
}
