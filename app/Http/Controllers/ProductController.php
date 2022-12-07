<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        return [
            'products' => ProductService::index($request->user()),
            'meta' => [
                'count' => ProductService::count($request->user()),
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Product
     */
    public function store(Request $request): Product
    {
        $validatedData = $request->validate([
            'name'          => 'string|max:255',
            'sku'           => 'string|max:255',
            'ean'           => 'string|max:13',
            'weight'        => 'int',
            'height'        => 'int',
            'width'         => 'int',
            'length'        => 'int',
            'price'         => '',
            'description'   => 'string',
            'brand_id'      => 'int',

        ]);
        return ProductService::create($request->user(), $validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return Product
     */
    public function show(Product $product): Product
    {
        return ProductService::show($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return Product
     */
    public function update(Request $request, Product $product): Product
    {
        $validatedData = $request->validate([
            'status_id'     => 'int',
            'name'          => 'string|max:255',
            'sku'           => 'string|max:255',
            'ean'           => 'string|max:13',
            'weight'        => 'int',
            'height'        => 'int',
            'width'         => 'int',
            'length'        => 'int',
            'price'         => 'float',
            'description'   => 'string',
        ]);
        return ProductService::update($product, $validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function destroy(Product $product): void
    {
        ProductService::destroy($product);
    }
}
