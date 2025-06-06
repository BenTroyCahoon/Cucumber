<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_products')->withTimestamps();
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }


}

