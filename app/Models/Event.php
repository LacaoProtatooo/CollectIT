<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
