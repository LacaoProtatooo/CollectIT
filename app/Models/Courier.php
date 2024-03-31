<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Courier extends Model
{
    protected $fillable = [
        'name',
        'rates',
        'type',
        'image_path'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
