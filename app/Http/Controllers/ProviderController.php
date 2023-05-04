<?php

namespace App\Http\Controllers;


use App\Provider;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\ProviderService;
use App\Http\Requests\ProviderStoreRequest;

class ProviderController extends Controller
{


    protected $providerService;
    protected $productService;

    /**
     * __construct
     *
     * @param  ProviderService $providerService
     * @param  ProductService $productService
     * @return void
     */
    public function __construct(ProviderService $providerService, ProductService $productService)
    {
        $this->providerService = $providerService;
        $this->productService = $productService;
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
        $providers = $this->providerService->search($search);

        return view('app.provider.index', ['providers' => $providers, 'request' => $request->all()]);
    }

    /**
     * Display a form to serach for resources.
     *
     * @return View
     */
    public function search()
    {
        return view('app.provider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('app.provider.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProviderStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProviderStoreRequest $request)
    {

        $provider = Provider::create($request->all());

        return redirect()->route('provider.edit', $provider->id)->with('message', 'Fornecedor cadastrado com sucesso.')->with('color', 'success');
    }


    /**
     * Display the specified resource.
     *
     * @param Provider $provider
     * @param Request $request
     * @return View
     */
    public function show(Provider $provider, Request $request)
    {
        $search = $request->search ?? '';

        $products = $this->productService->searchProviderProducts($search, $provider->id);

        return view('app.provider.provider_itens', ['provider' => $provider, 'products' => $products, 'request' => $request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Provider $provider
     * @return View
     */
    public function edit(Provider $provider)
    {
        return view('app.provider.create_edit', ['provider' => $provider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProviderStoreRequest  $request
     * @param  Provider $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProviderStoreRequest $request, Provider $provider)
    {

        $provider->update($request->all());

        return redirect()->route('provider.edit', $provider->id)->with('message', 'Fornecedor editado com sucesso.')->with('color', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);

        //Verificaa se existe produtos relacionados ao fornecedor
        if ($provider->products()->exists()) {
            return redirect()->route('provider.index')->with('message', 'O Fornecedor não pode ser excluido pois há produtos relacionados a ele!')->with('color', 'warning');
        }

        $provider->delete();

        return redirect()->route('provider.index')->with('message', 'Fornecedor excluido com sucesso.')->with('color', 'success');
    }
}
