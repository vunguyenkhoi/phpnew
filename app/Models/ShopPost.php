<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopPostCategories;
use App\Models\AclUser;


class ShopPost extends Model
{
    use HasFactory;
    protected $table = 'shop_posts';
    protected $fillable = [
        'post_slug',
        'post_content',
        'post_content',
        'post_excerpt',
        'post_status',
        'post_type',
        'post_status',
        'post_imager',
        'user_id',
        'post_category_id',

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
    public function post_category()
    {
        return $this->belongsTo(ShopPostCategories::class, 'post_category', 'id');
    }
    public function user()
    {
        return $this->belongsTo(AclUser::class, 'user_id', 'id');
    }
}
