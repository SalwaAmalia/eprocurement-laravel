<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = ['rfq_id', 'vendor_id', 'status'];

    public function rfq() {
        return $this->belongsTo(RFQ::class);
    }

    public function vendor() {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}
