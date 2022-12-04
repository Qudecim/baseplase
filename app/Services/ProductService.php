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
        return $user->products()->get();
    }

    /**
     * @param User $user
     * @param Product $product
     * @return Product
     * @throws \Exception
     */
    public static function show(User $user, Product $product): Product
    {
        if ($product->owner_id == $user->id) {
            return $product;
        }
        throw new \Exception('ops');
    }

    /**
     * @param User $user
     * @param array $data
     * @return Product
     */
    public static function create(User $user, array $data): Product
    {
        $product = new Product();
        $product->owner_id = $user->id;

        $product->fill($data)->save();

        return $product;
    }

    /**
     * @param User $user
     * @param Product $product
     * @param array $data
     * @return Product
     * @throws \Exception
     */
    public static function update(User $user, Product $product, array $data)
    {
        if ($product->owner_id == $user->id) {

            $product->fill($data)->save();

            return $product;
        }
        throw new \Exception('');
    }

    /**
     * @param User $user
     * @param Product $product
     * @throws \Exception
     */
    public static function destroy(User $user, Product $product)
    {
        if ($product->owner_id == $user->id) {
            $product->delete();
        }
        throw new \Exception('ops');
    }

}
