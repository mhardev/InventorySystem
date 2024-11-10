<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surrenderitem extends Model
{
    use HasFactory;

    protected $table = 'surrenderitems';

    protected $primaryKey = 'id';

    protected $fillable = [
        'useritem_id',
        'user_id',
        'product_id',
        'item_stock',
        'remarks',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function useritem()
    {
        return $this->belongsTo(Useritem::class);
    }
}
