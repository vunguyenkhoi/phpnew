<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopCustomer;

class ShopProductReview extends Model
{
    use HasFactory;
    protected $table = 'shop_product_reviews';
    protected $fillable = [
        'product_id',
        'customer_id',
        'rating',
        'comment',
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

    public function product()
    {
        return $this->belongsTo(ShopProduct::class, 'product_id', 'id');
    }
    public function customers()
    {
        return $this->belongsTo(ShopCustomer::class, 'customer_id', 'id');
    }
}