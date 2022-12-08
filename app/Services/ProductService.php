<?php


namespace App\Services;


use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;

class ProductService
{

    /**
     * @param User $user
     * @return Collection
     */
    public static function index(User $user): Collection
    {
        return $user->products()->with('brand')->get();
    }

    /**
     * @param Product $product
     * @return Product
     */
    public static function show(Product $product): Product
    {
        return $product->load('brand');
    }

    /**
     * @param User $user
     * @param array $data
     * @return Product
     */
    public static function create(User $user,array $data): Product
    {
        $product = new Product();
        $product->owner_id = $user->id;

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
     * @param Product $product
     */
    public static function destroy(Product $product)
    {
        $product->delete();
    }

    /**
     * @param User $user
     * @return int
     */
    public static function count(User $user): int
    {
        return $user->products()->count();
    }
}
