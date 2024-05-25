<?php

use App\Models\User;
use App\Models\Product;

/**
 * @var \App\Models\User|null $user;
 */
$user = null;
beforeAll(function () {
    global $user;
    $user = User::factory()->create();
});

beforeEach(function () {
    global $user;
    $this->actingAs($user);
});

it('deletes product successful', function (Product $product) {
    $this->actingAs($this->user);

    $response = $this->delete(route('api.product.delete', ['id' => $product->id]));
    $response->assertStatus(200);
})->with([
    fn() => Product::factory()->create()
]);
