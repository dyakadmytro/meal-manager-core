<?php

use App\Models\User;
use App\Models\Product;


beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('deletes product successful', function (Product $product) {
    $response = $this->delete(route('api.product.delete', ['product' => $product->id]));
    $response->assertStatus(200);
    $response_check = $this->get(route('api.product.get', ['product' => $product->id]));
    $response_check->assertNotFound();
})->with([
    fn() => Product::factory()->create()
]);
