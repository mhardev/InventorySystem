<?php

namespace App\Models;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table = 'itemcategories'; // or whatever your table name is

    protected $primaryKey = 'id'; // if your primary key is different
    protected $fillable = [
        'category_name',
        'category_slug',
        'meta_title',
        'meta_keyword',
        'status',
        'user_id'
    ];

    public static function search($search)
    {
        return self::with(['updatedBy' => function($query) {
                $query->where('role_as', '!=', 1); // Exclude admin users
            }])
            ->where(function($query) use ($search) {
                $query->where('id', 'LIKE', '%' . $search . '%')
                    ->orWhere('category_name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('updatedBy', function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
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

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function itemBrand() {
        return $this->hasMany(Brand::class, 'brand_id', 'id');
    }

}
