<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function messages()
    {
        return $this->belongsToMany(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
