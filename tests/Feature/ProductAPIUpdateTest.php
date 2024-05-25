<?php

use App\Models\User;
use App\Models\Product;


beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('updates product successful', function (Product $product) {
    $fake = Product::factory()->make();

    $response = $this->patch(route('api.product.update', ['product' => $product->id]), $fake->only(['name', 'description', 'notes', 'nutrition_facts']));
    $response->assertStatus(200);
})->with([
    fn() => Product::factory()->create(),
]);
