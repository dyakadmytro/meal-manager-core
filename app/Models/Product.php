<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['name', 'description', 'notes', 'nutrition_facts', 'user_id', 'parent_id'];

    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'parent_id', 'id');
    }
}
