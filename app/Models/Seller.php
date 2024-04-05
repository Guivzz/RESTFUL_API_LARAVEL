<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends User
{
    public function product() {
        return $this->hasMany(Product::class);
    }
}
