<?php

use App\Models\User;
use App\Models\Product;


beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('deletes product successful', function (Product $product) {
    $response = $this->delete(route('api.product.delete', ['product' => $product->id]));
    $response->assertStatus(200);
})->with([
    fn() => Product::factory()->create()
]);
