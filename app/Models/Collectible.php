<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Collectible extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'dimension',
        'condition',
        'stock',
        'manufacturer',
        'category',
        'status',
        'image_path',
        'release_date',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }
}
