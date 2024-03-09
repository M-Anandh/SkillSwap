<?php

// app/Models/UploadedFile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class UploadedFile extends Model
{
    use HasFactory;

    protected $fillable = ['original_name', 'stored_name', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
