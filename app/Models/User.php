<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'faculty',
        'department',
        'handphone',
        'religion',
        'gender',
        'address',
        'birthday',
        'status',
        'NIP',
        'position',
        'profile_picture',
        'position_name',
        'isAdmin',
        'code',
        'branch',
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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function eduBackground()
    {
        return $this->hasMany(EduBackground::class);
    }

    public function projectGallery()
    {
        return $this->hasMany(ProjectGallery::class);
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class, 'user_announcement')->withPivot('status');
    }

    public function loginHistories() {
        return $this->hasMany(LoginHistory::class);
    }
}
