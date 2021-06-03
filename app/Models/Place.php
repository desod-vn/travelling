<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'image',
    ];

    public $timestamps = false;

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
}
