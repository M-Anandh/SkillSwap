<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
// use CreatorDetail as GlobalCreatorDetail;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'phone',
        'gender',
        'profile_photo_path',
        'user',
        'skill',
        'type',
        'approved',
        'occupation',
        'exp',
        'link',
        'portfolio',
        'price',
        'available',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bookedMeetings()
    {
        return $this->hasMany(Meeting::class, 'booked_user_id');
    }

    public function bookedByMeetings()
    {
        return $this->hasMany(Meeting::class, 'user_id');
    }


    // User.php

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["user", "admin", "creator"][$value],
        );
    }

    public function uploadedFiles()
    {
        return $this->hasMany(UploadedFile::class);
    }
}
