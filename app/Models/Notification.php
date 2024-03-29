<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'action',
        'note',
        'box_id',
    ];

    public $timestamps = false;
    

    public function box()
    {
        return $this->belongsTo(Box::class);
    }
}
