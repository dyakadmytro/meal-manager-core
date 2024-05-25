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

it('retrieves single product successful', function (Product $product) {
    $this->actingAs($this->user);

    $response = $this->get(route('api.product.get', ['id' => $product->id]));
    $response->assertStatus(200);
})->with([
    fn() => Product::factory()->create()
]);
