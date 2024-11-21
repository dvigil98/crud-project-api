<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'code',
        'name',
        'description',
        'purchase_price',
        'sale_price'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
