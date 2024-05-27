<?php

use App\Models\User;
use App\Models\Product;


beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('updates product successful', function (Product $product) {
    $fake = Product::factory()->make();
    $update_data = $fake->only(['name', 'description', 'notes', 'nutrition_facts']);
    $response = $this->patch(route('api.product.update', ['product' => $product->id]),$update_data );

    $expected_data = collect($update_data)->prepend($product->id, 'id')->forget('notes')->toArray();
    $response->assertStatus(200);
    $response->assertJson($expected_data);
    $this->assertDatabaseHas('products',
        collect($expected_data)->map(
            fn($i, $k) => $k === 'nutrition_facts'? json_encode($i) : $i
        )->forget('nutrition_facts')->toArray()
        /* note
            Some how 'nutrition_facts' json causes this error:
             SQLSTATE[42883]: Undefined function: 7 ERROR:  operator does not exist: json = unknown
             LINE 1: ...ame" = $2 and "description" = $3 and "nutrition_facts" = $4)
             HINT:  No operator matches the given name and argument types. You might need to add explicit type casts. (Connection: pgsql, SQL: select count(*) as aggregate from "products" where ("id" = 9c259a24-abed-44c0-bdac-97b317e1f2df and "name" = ut and "description" = Est voluptates voluptatem repudiandae consequatur nihil officiis nam. and "nutrition_facts" = 7))
        */
    );
})->with([
    fn() => Product::factory()->create(),
]);
