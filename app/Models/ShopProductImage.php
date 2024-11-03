<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopProduct;

class ShopProductImage extends Model
{
    use HasFactory;
    protected $table = 'shop_product_imges';
    protected $fillable = [
        'product_id',
        'image',
    ];

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $dates = [];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $timetamps = false;

    public function product()
    {
        return $this->belongsTo(ShopProduct::class, 'product_id', 'id');
    }
}