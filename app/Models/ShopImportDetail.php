<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopImport;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use App\Models\ShopExportDetail;

class ShopImportDetail extends Model
{
    use HasFactory;
    protected $table = 'shop_imports';
    protected $fillable = [
        'import_id',
        'product_id',
        'quantity',
        'unit_price',
    ];

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $dates = [];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $timetamps = false;

    public function import()
    {
        return $this->belongsTo(ShopImport::class, 'import_id', 'id');
    }

    public function export_details()
    {
        return $this->hasMany(ShopExportDetail::class, 'import_detail_id', 'id');
    }
}