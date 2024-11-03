<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopPost;

class ShopPostCategories extends Model
{
    use HasFactory;
    protected $table = 'shop_posts';
    protected $fillable = [
        'post_category_code',
        'post_category_name',
        'description',
        'image',

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

    public function posts()
    {
        return $this->hasMany(ShopPost::class, 'post_category_id', 'id');
    }
}
