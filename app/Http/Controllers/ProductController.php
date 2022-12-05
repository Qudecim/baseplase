<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return ProductService::index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Product
     */
    public function store(Request $request): Product
    {
        //        'owner_id',
        //        'name',
        //        'sku',
        //        'ean',
        //        'weight',
        //        'height',
        //        'width',
        //        'length',
        //        'price',
        //        'description',

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
        return ProductService::create($validatedData);
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
