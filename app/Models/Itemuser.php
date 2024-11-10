<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itemuser extends Model
{
    use HasFactory;

    protected $table = 'itemusers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'request_id',
        'user_id',
        'product_id',
        'item_stock',
        'status',
        'request_remark'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('request_id', 'LIKE', '%' . $search . '%')
            ->orWhere('user_id', 'LIKE', '%' . $search . '%')
            ->orWhere('product_id', 'LIKE', '%' . $search . '%')
            ->orWhere('item_stock', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%')
            ->orWhereHas('itemrequest', function($query) use ($search) {
                $query->where('id', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('user', function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('product', function($query) use ($search) {
                $query->where('item_name', 'LIKE', '%' . $search . '%');
            });
    }

    public function scopeWithAggregatedStocks($query)
    {
        return $query->select(
                'itemusers.user_id',
                'itemusers.product_id',
                'itemusers.status',
                DB::raw('SUM(itemusers.item_stock) as total_item_stock'),
                'users.name as user_name',
                'itemproducts.item_name as product_name'
            )
            ->join('users', 'itemusers.user_id', '=', 'users.id')
            ->join('itemproducts', 'itemusers.product_id', '=', 'itemproducts.id')
            ->groupBy('itemusers.user_id', 'itemusers.product_id', 'itemusers.status', 'users.name', 'itemproducts.item_name');
    }

    public function scopeWithMostUsedItems($query)
    {
        return $query->select(
                'itemusers.product_id',
                'itemusers.status',
                DB::raw('SUM(itemusers.item_stock) as total_item_stock'),
                'itemproducts.item_name as product_name'
            )
            ->join('itemproducts', 'itemusers.product_id', '=', 'itemproducts.id')
            ->groupBy('itemusers.product_id', 'itemusers.status', 'itemproducts.item_name');
    }

    public function itemrequest()
    {
        return $this->belongsTo(Itemrequest::class, 'request_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
