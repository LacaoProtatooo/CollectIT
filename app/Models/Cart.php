<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   public function collectibles()
   {
        return $this->belongsToMany(Collectible::class);
   }
}
