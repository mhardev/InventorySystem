<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itemrequest extends Model
{
    protected $table = 'itemrequest';

    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'useritem_id',
        'product_id',
        'item_stock',
        'status',
        'request_remark'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('user_id', 'LIKE', '%' . $search . '%')
            ->orWhere('product_id', 'LIKE', '%' . $search . '%')
            ->orWhere('item_stock', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%')
            ->orWhereHas('user', function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('product', function($query) use ($search) {
                $query->where('item_name', 'LIKE', '%' . $search . '%');
            });
    }

    public function scopeCategory($query, $category)
    {
        if ($category !== '') {
            return $query->whereHas('product.subcategory.category', function ($query) use ($category) {
                $query->where('category_name', $category);
            });
        }

        return $query;
    }

    public function scopeStatus($query, $selectedStatus)
    {
        if ($selectedStatus === '1') {
            return $query->where('status', 1);
        } elseif ($selectedStatus === '2') {
            return $query->where('status', 2);
        }

        return $query;
    }

    public function scopeStockColor($query, $selectedColor)
    {
        if ($selectedColor === '0') {
            return $query->where('item_stock', '<=', 5);
        } elseif ($selectedColor === '1') {
            return $query->whereBetween('item_stock', [6, 20]);
        } elseif ($selectedColor === '2') {
            return $query->where('item_stock', '>', 20);
        }

        return $query;
    }

    public function scopeWithAggregatedStocks($query)
    {
        return $query->select(
                'itemrequest.user_id',
                'itemrequest.product_id',
                'itemrequest.status',
                DB::raw('SUM(itemrequest.item_stock) as total_item_stock'),
                'users.name as user_name',
                'itemproducts.item_name as product_name'
            )
            ->join('users', 'itemrequest.user_id', '=', 'users.id')
            ->join('itemproducts', 'itemrequest.product_id', '=', 'itemproducts.id')
            ->groupBy('itemrequest.user_id', 'itemrequest.product_id', 'itemrequest.status', 'users.name', 'itemproducts.item_name');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function itemProduct() {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function itemSubCategory() {
        return $this->hasMany(Subcategory::class, 'subcategory_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function usersAcc() {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function useritems() {
        return $this->belongsTo(Useritem::class, 'useritem_id', 'id');
    }

    public function userItem() {
        return $this->hasMany(Useritem::class, 'useritem_id', 'id');
    }
}
