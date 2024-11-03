<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopOrder;
use App\Models\ShopProductReview;

class ShopCustomer extends Model
{
    use HasFactory;
    protected $table = 'shop_customers';
    protected $fillable = [
        'username',
        'last_name',
        'first_name',
        'gender',
        'email',
        'birthday',
        'avatar',
        'code',
        'phone',
        'company',
        'billing_address',
        'shipping_address',
        'city',
        'state',
        'postal_code',
        'country',
        'remember_token',
        'activate_code',
        'status',
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

    public function orders()
    {
        return $this->hasMany(ShopOrder::class, 'customer_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(ShopProductReview::class, 'customer_id', 'id');
    }
}