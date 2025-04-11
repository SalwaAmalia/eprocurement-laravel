<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'user_id'];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
