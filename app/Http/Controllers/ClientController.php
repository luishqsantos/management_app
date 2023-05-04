<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientStoreRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $clients = Client::paginate(10);

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
