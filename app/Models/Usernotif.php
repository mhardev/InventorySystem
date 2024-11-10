<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usernotif extends Model
{
    use HasFactory;

    protected $table = 'usernotification'; // Make sure the table name matches your database
    protected $primaryKey = 'id';

    protected $fillable = [
        'request_id',
        'user_id',
        'notification_details',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('user_id', 'LIKE', '%' . $search . '%')
            ->orWhere('request_id', 'LIKE', '%' . $search . '%')
            ->orWhereHas('itemrequest', function($query) use ($search) {
                $query->where('product_id', 'LIKE', '%' . $search . '%')
                ->orWhereHas('product', function($query) use ($search) {
                    $query->where('item_name', 'LIKE', '%' . $search . '%');
                });
            });
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
