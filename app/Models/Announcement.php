<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_announcement')->withPivot('status');
    }

    public function images()
    {
        return $this->hasMany(AnnouncementImage::class);
    }
}
