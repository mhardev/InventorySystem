<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    protected $table = 'suppliers'; // or whatever your table name is

    protected $primaryKey = 'id'; // if your primary key is different
    protected $fillable = [
        'supplier_name',
        'supplier_contact',
        'supplier_email',
        'supplier_owner',
        'supplier_address',
        'supplier_city',
        'supplier_tin',
        'supplier_bp',
        'supplier_jepscert',
        'supplier_myrp',
        'supplier_philcert',
        'status',
        'category_id',
        'supplier_remark',
        'user_id'
    ];

    public static function search($search)
    {
        return self::with(['updatedBy' => function($query) {
                $query->where('role_as', '!=', 1); // Exclude admin users
            }])
            ->where(function($query) use ($search) {
                $query->where('id', 'LIKE', '%' . $search . '%')
                ->orWhere('supplier_name', 'LIKE', '%' . $search . '%')
                ->orWhere('supplier_contact', 'LIKE', '%' . $search . '%')
                ->orWhere('supplier_email', 'LIKE', '%' . $search . '%');
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
