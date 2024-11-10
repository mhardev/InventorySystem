<?php

namespace App\Models;

use App\Models\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    protected $table = 'itembrands'; // or whatever your table name is

    protected $primaryKey = 'id'; // if your primary key is different
    protected $fillable = [
        'brand_name',
        'brand_slug',
        'status',
        'user_id',
        'category_id'
    ];

    public static function search($search)
    {
        return self::with(['updatedBy' => function($query) {
                $query->where('role_as', '!=', 1); // Exclude admin users
            }])
            ->where(function($query) use ($search) {
                $query->where('id', 'LIKE', '%' . $search . '%')
                    ->orWhere('brand_name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('updatedBy', function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
    }

    public function scopeRole($query, $role)
    {
        if ($role !== '') {
            return $query->whereHas('category', function ($query) use ($role) {
                $query->where('category_name', $role);
            });
        }

        return $query;
    }


    public function itemproducts()
    {
        return $this->hasMany(Product::class);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function itemCategory() {
        return $this->hasMany(Category::class, 'category_id', 'id');
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
