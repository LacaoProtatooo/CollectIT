<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'password'
    ];

    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
