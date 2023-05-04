<?php

namespace App\Http\Controllers;

use App\Unity;
use App\ProductDetail;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $units = Unity::all();
        return view('app.product_detail.create_edit', ['units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return View
     */
    public function store(Request $request)
    {
        ProductDetail::create($request->all());

        session()->flash('message', 'Detalhe do Produto cadastrado com sucesso');
        return $this->create();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductDetail $product_detail
     * @return View
     */
    public function edit(ProductDetail $product_detail)
    {
        $units = Unity::all();
        return view('app.product_detail.create_edit', ['product_detail' => $product_detail, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ProductDetail $product_detail
     * @return View
     */
    public function update(Request $request, ProductDetail $product_detail)
    {
        $product_detail->update($request->all());

        session()->flash('message', 'Detalhe do Produto editado com sucesso');
        return $this->edit($product_detail);
    }
}
