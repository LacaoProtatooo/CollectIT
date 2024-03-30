<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'description',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}