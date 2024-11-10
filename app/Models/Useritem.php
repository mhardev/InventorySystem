<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Itemrequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Useritem extends Model
{
    use HasFactory;

    protected $table = 'useritems';

    protected $primaryKey = 'id';

    protected $fillable = [
        'request_id',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('request_id', 'LIKE', '%' . $search . '%')
            ->orWhereHas('itemrequest', function($query) use ($search) {
                $query->where('product_id', 'LIKE', '%' . $search . '%')
                ->orWhereHas('product', function($query) use ($search) {
                    $query->where('item_name', 'LIKE', '%' . $search . '%');
                });
            });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function itemrequest()
    {
        return $this->belongsTo(Itemrequest::class, 'request_id', 'id');
    }
}
