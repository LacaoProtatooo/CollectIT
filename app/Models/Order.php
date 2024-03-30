<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'ship_type',
        'status',
        'date',
    ];
    public function collectibles()
    {
        return $this->belongsToMany(Collectible::class);
    }

    public function users()
    {
        return $this->BelongsTo(User::class);
    }

    public function couriers()
    {
        return $this->hasOne(Courier::class);
    }

    public function reviews()
    {
        return $this->hasOne(Review::class);
    }
}
