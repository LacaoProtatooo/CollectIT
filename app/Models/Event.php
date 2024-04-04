<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'details',
        'discount_rate',
        'image_path'
    ];

    public function collectibles()
    {
        return $this->belongsToMany(Collectible::class)
                    ->withPivot('OrigPrice');
    }
}
