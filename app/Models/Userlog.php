<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Itemrequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Userlog extends Model
{
    use HasFactory;

    protected $table = 'userhistory';

    protected $primaryKey = 'id';

    protected $fillable = [
        'request_id',
        'history_details',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('request_id', 'LIKE', '%' . $search . '%');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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
