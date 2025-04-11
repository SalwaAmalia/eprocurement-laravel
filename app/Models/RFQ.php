<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{   
    protected $table = 'rfqs';
    protected $fillable = ['buyer_id', 'product_id', 'quantity', 'notes', 'status'];

    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
