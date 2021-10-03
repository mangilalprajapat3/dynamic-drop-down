<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->BelongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->BelongsTo(Subcategory::class);
    }
}
