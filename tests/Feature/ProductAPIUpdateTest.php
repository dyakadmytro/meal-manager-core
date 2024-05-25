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


it('updates product successful', function (Product $product) {
    $this->actingAs($this->user);

    $fake = Product::factory()->make();

    $response = $this->putch(route('api.product.update',['id' => $product->id]), $fake->only(['name', 'description', 'notes', 'nutrition_facts']));
    $response->assertStatus(200);
})->with([
    fn() => Product::factory()->create(),
]);
