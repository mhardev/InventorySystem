<?php

namespace App\Models;


use App\Models\User;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $table = 'itemproducts'; // or whatever your table name is

    protected $primaryKey = 'id'; // if your primary key is different
    protected $fillable = [
        'subcategory_id',
        'brand_id',
        'supplier_id',
        'item_name',
        'item_sn',
        'item_mn',
        'item_stock',
        'item_image',
        'item_details',
        'meta_title',
        'meta_keyword',
        'item_remark',
        'status',
        'user_id',
        'useritem_id',
        'request_id'
    ];

    public static function search($search)
    {
        return self::with(['updatedBy' => function($query) {
                $query->where('role_as', '!=', 1); // Exclude admin users
            }])
            ->where(function($query) use ($search) {
                $query->where('id', 'LIKE', '%' . $search . '%')
                ->orWhere('item_name', 'LIKE', '%' . $search . '%')
                ->orWhere('item_stock', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('updatedBy', function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
    }

    /*public function scopeRole($query, $role)
    {
        if ($role !== '') {
            return $query->whereHas('subcategory', function ($query) use ($role) {
                $query->where('subcategory_name', $role);
            });
        }

        return $query;
    }*/

    public function scopeCategory($query, $category)
    {
        if ($category !== '') {
            return $query->whereHas('subcategory.category', function ($query) use ($category) {
                $query->where('category_name', $category);
            });
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

    public function subcategory() {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function itemSubCategory() {
        return $this->hasMany(Subcategory::class, 'subcategory_id', 'id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function itemBrand() {
        return $this->hasMany(Brand::class, 'brand_id', 'id');
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function supplierInfo() {
        return $this->hasMany(Supplier::class, 'supplier_id', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function usersAcc() {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

}
