<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopStore;
use App\Models\ShopExportDetail;

class ShopExport extends Model
{
    use HasFactory;
    protected $table = 'shop_exports';
    protected $fillable = [
        'store_id',
        'employee_id',
        'export_date',
        'description',
        'order_id',
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

    public function stores()
    {
        return $this->belongsTo(ShopStore::class, 'store_id', 'id');
    }
    public function export_detail()
    {
        return $this->hasMany(ShopExportDetail::class, 'export_id', 'id');
    }
}