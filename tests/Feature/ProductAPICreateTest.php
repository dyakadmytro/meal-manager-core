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

it('creates product successful', function (Product $product) {
    $this->actingAs($this->user);

    $response = $this->post(route('api.product.create'), $product->only(['name', 'description', 'notes', 'nutrition_facts', 'parent_id', 'user_id']));
    $response->assertStatus(200);
})->with([
    fn() => Product::factory()->make()
]);
