<?php

use App\Models\User;
use App\Models\Product;


beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('creates product successful', function (Product $product) {
    $response = $this->post(route('api.product.create'), $product->only(['name', 'description', 'notes', 'nutrition_facts', 'parent_id', 'user_id']));
    $response->assertStatus(200);
    $product_data = $response->json();
    $this->assertDatabaseHas('products', ['id' => $product_data['id']]);
})->with([
    fn() => Product::factory()->make()
]);

