<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['user_id', 'booked_user_id', 'datetime', 'completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookedUser()
    {
        return $this->belongsTo(User::class, 'booked_user_id');
    }
}
