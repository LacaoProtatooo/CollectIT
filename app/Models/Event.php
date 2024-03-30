<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'details',
        'discount_rate'
    ];

    public function collectibles()
    {
        return $this->hasMany(Collectible::class);
    }
}
