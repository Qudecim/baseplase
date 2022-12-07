<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\User;

class BrandService
{

    /**
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function index(User $user)
    {
        return $user->brands()->get();
    }

    /**
     * @param Brand $brand
     * @return Brand
     */
    public static function show(Brand $brand)
    {
        return $brand;
    }

    /**
     * @param User $user
     * @param array $data
     * @return Brand
     */
    public static function create(User $user, array $data): Brand
    {
        $brand = new Brand();
        $brand->owner_id = $user->id;
        $brand->name = $data['name'];
        $brand->save();
        return $brand;
    }

    /**
     * @param Brand $brand
     * @param array $data
     * @return Brand
     */
    public static function update(Brand $brand, array $data): Brand
    {
        $brand->name = $data;
        $brand->save();
        return $brand;
    }

    /**
     * @param Brand $brand
     * @return void
     */
    public static function destroy(Brand $brand): void
    {
        $brand->delete();
    }

    /**
     * @param User $user
     * @return int
     */
    public static function count(User $user): int
    {
        return $user->brands()->count();
    }

}
