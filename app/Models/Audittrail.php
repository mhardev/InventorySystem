<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audittrail extends Model
{
    protected $table = 'audittrail'; // or whatever your table name is

    protected $primaryKey = 'id'; // if your primary key is different
    protected $fillable = [
        'user_id',
        'user_type',
        'activity_name',
        'activity_details',
    ];

    public static function search($search)
    {
        return self::where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('user_id', 'LIKE', '%' . $search . '%')
            ->orWhere('user_type', 'LIKE', '%' . $search . '%')
            ->orWhere('activity_name', 'LIKE', '%' . $search . '%')
            ->orWhereHas('user', function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
    }

    public function scopeRole($query, $role)
    {
        if ($role !== '') {
            return $query->where('user_type', $role);
        }

        return $query;
    }


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function usersAcc() {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
