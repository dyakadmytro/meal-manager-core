<?php

use App\Models\User;
use App\Models\Product;


beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('retrieves single product successful', function (Product $product) {
    $response = $this->get(route('api.product.get', ['product' => $product->id]));

    $response->assertStatus(200);
    $response->assertJson($product->only([
        'id', 'name', 'description', 'nutrition_facts'
    ]));
})->with([
    fn() => Product::factory()->create()
]);
