<?php


namespace App\Services;


use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;

class ProductService
{

    /**
     * @return Collection
     */
    public static function index(): Collection
    {
        return auth()->user()->products()->get();
    }

    /**
     * @param Product $product
     * @return Product
     */
    public static function show(Product $product): Product
    {
        return $product;
    }

    /**
     * @param array $data
     * @return Product
     */
    public static function create(array $data): Product
    {
        $product = new Product();
        $product->owner_id = auth()->id();

        $product->fill($data)->save();

        return $product;
    }

    /**
     * @param Product $product
     * @param array $data
     * @return Product
     */
    public static function update(Product $product, array $data)
    {
        $product->fill($data)->save();

        return $product;
    }

    /**
     * @param Product $productn
     */
    public static function destroy(Product $product)
    {
        $product->delete();
    }

}
