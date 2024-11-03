<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopProduct;

class ShopCategory extends Model
{
    use HasFactory;
    protected $table = 'shop_categories';
    protected $fillable = [
        'category_code',
        'category_name',
        'description',
        'image',
        'created_at',
        'updated_at',
    ];

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at',];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function products()
    {
        return $this->hasMany(ShopProduct::class, 'category_id', 'id');
    }
}