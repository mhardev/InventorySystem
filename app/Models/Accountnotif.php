<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountnotif extends Model
{
    protected $table = 'accountnotification';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'notification_details'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
