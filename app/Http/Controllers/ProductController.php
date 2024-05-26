<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductBasicResource;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response( new ProductBasicResource(Auth::user()->products), 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product(
            $request->only(['name', 'description', 'notes', 'nutrition_facts', 'parent_id'])
        );
        $product->user()->associate(Auth::user());

        try {
            $product->saveOrFail();
        } catch (\Exception $exception) {
            /*
               note
                how to correct handle exceptions on dev and prod envs?
                so I want to have regular error handling on deve and hidden to logs on prod
            */
//            if(app()->environment('prod', 'testing')) Log::error($exception->getMessage(), $exception->getTrace());
            return response('ERROR', 500);
        }

        return response(new ProductBasicResource($product), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response( new ProductBasicResource($product),200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->updateOrFail($request->only(['name', 'description', 'nutrition_facts']));
        return response(new ProductBasicResource($product), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response(200);
    }
}
