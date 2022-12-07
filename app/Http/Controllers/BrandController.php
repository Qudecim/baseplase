<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\BrandService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class BrandController extends Controller
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
            'data' => BrandService::index($request->user()),
            'meta' => [
                'count' => BrandService::count($request->user()),
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Brand
     */
    public function store(Request $request): Brand
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);
        return BrandService::create($request->user(), $validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return Brand
     */
    public function show(Brand $brand): Brand
    {
        return BrandService::show($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return Brand
     */
    public function update(Request $request, Brand $brand): Brand
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);
        return BrandService::update($brand, $validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function destroy(Brand $brand): void
    {
        BrandService::destroy($brand);
    }
}
