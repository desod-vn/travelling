<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Box extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'image',
        'content',
        'vehicle',
        'people',
        'start',
        'end',
        'fee',
        'place_id',
    ];

    public function joinIn($box, $user)
    {
        return DB::table('box_user')
                ->where([['user_id', $user], ['box_id', $box]])
                ->update(['status' => 1]);
    }

    public function joined($user, $box)
    {
        return DB::table('box_user')
                ->where([['user_id', $user], ['box_id', $box]])
                ->first();
    }

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
      return $this->hasMany(Message::class)->with('user')->latest();
    }

    public function hasMembers()
    {
        return $this->belongsToMany(User::class)->withPivot('status');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class)->orderBy('time', 'ASC');
    }
}
