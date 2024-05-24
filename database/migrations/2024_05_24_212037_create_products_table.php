<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->string('name', 32);
            $table->string('description')->nullable();
            $table->text('notes')->nullable();
            $table->json('nutrition_facts');
            $table->foreignIdFor(\App\Models\Product::class, 'parent_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['user_id', 'name'],'name_user_id_comp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
