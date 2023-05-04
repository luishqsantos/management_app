<?php

namespace App\Http\Controllers;

use App\Unity;
use App\Product;
use App\Provider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Services\ProductService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{

    protected $productService;

    /**
     * __construct
     *
     * @param  ProductService $productService
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Return page with all products
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $products = $this->productService->search($search);

        return view('app.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $units = Unity::all();
        $providers = Provider::all();
        return view('app.product.create_edit', ['title' => 'Produto', 'providers' => $providers, 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductStoreRequest  $request
     * @return mixed
     */
    public function store(ProductStoreRequest $request)
    {

        DB::beginTransaction();

        try {
            // Criar o produto
            $product = Product::create([
                'provider_id'   => $request->provider_id,
                'name'          => $request->name,
                'description'   => $request->description,
            ]);

            //Cria imagem recebida do $request em base64
            $image = Image::make($request->image);
            $imageName = Str::random(40);
            $extension = substr($image->mime(), strpos($image->mime(), '/') + 1);
            $imagePath = 'img/product/' . $product->id . '/' . $imageName . '.' . $extension;

            // Criar o detalhe de produto
            $product->productDetail()->create([
                'length'    => $request->length,
                'height'    => $request->height,
                'width'     => $request->width,
                'weight'    => $request->weight,
                'unity_id'  => $request->unity_id,
                'image'     => $imagePath
            ]);

            // Criar o estoque de produto
            $product->productStock()->create([
                'sale_price'    => $request->sale_price,
                'quantity'      => $request->quantity,
                'min_stock'     => $request->min_stock,
                'max_stock'     => $request->max_stock,
                'total'         => $request->sale_price * $request->quantity
            ]);

            DB::commit();

            //Salva a imagem no storage
            Storage::put($imagePath, $image->encode());

            // Redirecionar o usuário para a página de listagem de produtos
            return redirect()->route('product.index')
                ->with('message', 'Produto cadastrado com sucesso!')->with('color', 'success');
        } catch (\Exception $e) {

            DB::rollBack();

            Storage::delete($imagePath ?? '');

            return back()->with('message', 'Erro ao cadastrar o produto.' . $e->getMessage())->with('color', 'danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = Product::with(['productStock', 'productDetail', 'provider'])->where('id', $id)
            ->first();

        $product->productDetail->image = asset('/storage/' . $product->productDetail->image);

        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\View\View
     */
    public function edit(Product  $product)
    {
        $providers = Provider::all();
        $units = Unity::all();

        return view('app.product.create_edit', ['product' => $product, 'providers' => $providers, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductStoreRequest  $request
     * @param  Product  $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProductStoreRequest $request, Product  $product)
    {

        DB::beginTransaction();

        try {

            //Cria uma imagem e salva no storage se o request image for uma imagem base64
            if (!Storage::exists($request->image)) {

                //Deletando a imagem antiga
                Storage::delete($product->productDetail->image);

                //Cria imagem recebida do $request em base64
                $image = Image::make($request->image);
                $imageName = Str::random(40);
                $extension = substr($image->mime(), strpos($image->mime(), '/') + 1);
                $imagePath = 'img/product/' . $product->id . '/' . $imageName . '.' . $extension;

                Storage::put($imagePath, $image->encode());
            }


            // Criar o produto
            $product->update([
                'provider_id'   => $request->provider_id,
                'name'          => $request->name,
                'description'   => $request->description,
            ]);

            // Criar o detalhe de produto
            $product->productDetail()->update([
                'length'    => $request->length,
                'height'    => $request->height,
                'width'     => $request->width,
                'weight'    => $request->weight,
                'unity_id'  => $request->unity_id,
                'image'     => $imagePath ?? $product->productDetail->image
            ]);

            // Criar o estoque de produto
            $product->productStock()->update([
                'sale_price'    => $request->sale_price,
                'quantity'      => $request->quantity,
                'min_stock'     => $request->min_stock,
                'max_stock'     => $request->max_stock,
                'total'         => $request->sale_price * $request->quantity
            ]);

            DB::commit();

            // Redirecionar o usuário para a página de listagem de produtos
            return redirect()->route('product.edit', $product->id)
                ->with('message', 'Produto editado com sucesso!')->with('color', 'success');
        } catch (\Exception $e) {

            DB::rollBack();

            Storage::delete($imagePath ?? '');

            return back()->with('message', 'Erro ao editar o produto.')->with('color', 'danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Product  $product)
    {

        if ($product->orders()->exists()) {
            return redirect()->route('product.index')->with('message', 'O produto não pode ser excluido pois há pedidos relacionados a ele!')->with('color', 'warning');
        }

        DB::beginTransaction();

        try {
            $product->productDetail()->delete();
            $product->productStock()->delete();
            $product->delete();

            DB::commit();

            // Redirecionar o usuário para a página de listagem de produtos
            return redirect()->route('product.index')->with('message', 'Produto excluido com sucesso.')->with('color', 'success');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('message', 'Erro ao excluir o produto.')->with('color', 'danger');
        }
    }
}
