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

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class, 'rfq_id');
    }
    public function getStatus()
    {
        if ($this->purchaseOrders()->first()->status == 'declined') {
            return 'Permintaan Ditolak oleh Vendor';
        }
        
        return match ($this->status) {
            'pending' => 'Tertunda',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            default => 'Tidak diketahui',
        };
    }

}
