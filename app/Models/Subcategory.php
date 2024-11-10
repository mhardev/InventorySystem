<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    protected $table = 'subcategories'; // or whatever your table name is

    protected $primaryKey = 'id'; // if your primary key is different
    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
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
                ->orWhere('category_id', 'LIKE', '%' . $search . '%')
                ->orWhere('subcategory_name', 'LIKE', '%' . $search . '%');
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

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function itemCategory() {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function itemproducts()
    {
        return $this->hasMany(Product::class);
    }
}
