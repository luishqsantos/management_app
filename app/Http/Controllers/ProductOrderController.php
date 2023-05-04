<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ProductOrder;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductOrderStoreRequest;

class ProductOrderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Order $order
     * @return View
     */
    public function create(Order $order)
    {
        $products = Product::all();

        return view('app.product_order.create', ['order' => $order, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductOrderStoreRequest $request
     * @param  Order $order
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductOrderStoreRequest $request, Order $order)
    {

        $product_id = $request->product_id;
        $amount = $request->amount;

        $product = Product::find($product_id);
        $salePrice = $product->productStock->sale_price;
        $quantityStock = $product->productStock->quantity;


        //Retorna para o pedido caso a quantidade solicitada seja maior que o estoque
        if ($quantityStock < $amount) {
            return redirect()->route('product_order.create', ['order' => $order->id])->with('message', 'A quantidade informada do produto não existe em estoque.')->with('color', 'warning');
        }

        // Verifica se o produto já foi adicionado anteriormente ao pedido
        $existingProduct = $order->products()->where('product_id', $product_id)->first();

        if ($existingProduct) {
            // Atualiza a quantidade

            $newAmount = $existingProduct->pivot->amount + $amount;

            $order->products()->syncWithoutDetaching([
                $product_id => [
                    'amount' => $newAmount,
                    'total' => $newAmount * $salePrice]
            ]);

            //quantidade de produtos do estoque
            $quantity = ($amount > 0) ? $quantityStock - $amount : $quantityStock + abs($amount);
        } else {
            // Cria um novo registro
            $order->products()->attach($product_id, [
                'amount' => $amount,
                'total'  => $amount * $salePrice]);

            //Quantidade de produtos do estoque
            $quantity = $quantityStock - $amount;
        }

        //Atualiza a quantidade de produto do estoque
        $product->productStock()->update(['quantity' =>  $quantity]);

        return redirect()->route('product_order.create', ['order' => $order->id])->with('message', 'Item adicionado com sucesso.')->with('color', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductOrder $productOrder
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(ProductOrder $productOrder)
    {
        $order_id = $productOrder->order_id;

        //Retornando a quandidade do produto excluido ao estoque
        $product = Product::find($productOrder->product_id);
        $quantity = $product->productStock->quantity + $productOrder->amount;
        $product->productStock()->update(['quantity' => $quantity]);

        $productOrder->delete();

        return redirect()->route('product_order.create', ['order' => $order_id])->with('message', 'Item excluido com sucesso.')->with('color','success');
    }
}
