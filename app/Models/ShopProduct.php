<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopProductImage;
use App\Models\ShopProductDiscount;
use App\Models\ShopCategory;
use App\Models\ShopSupplier;
use App\Models\ShopProductReview;

class ShopProduct extends Model
{
    use HasFactory;
    protected $table = 'shop_products';
    protected $fillable = [
        'product_code',
        'product_name',
        'image',
        'short_description',
        'description',
        'standard_code',
        'list_price',
        'quantity_per_unit',
        'discontinued',
        'is_featured',
        'is_new',
        'category_id',
        'supplier_id',
        'created_at',
        'updated_at',
    ];

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function images()
    {
        return $this->hasMany(ShopProductImage::class, 'product_id', 'id');
    }

    public function discounts()
    {
        return $this->hasMany(ShopProductDiscount::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ShopCategory::class, 'category_id', 'id');
    }

    public function suppier()
    {
        return $this->belongsTo(ShopSupplier::class, 'supplier_id', 'id');
    }

    public function review()
    {
        return $this->hasMany(ShopProductReview::class, 'product_id', 'id');
    }
}