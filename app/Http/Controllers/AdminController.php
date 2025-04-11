<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RFQ;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Vendor Management
    public function vendorList()
    {
        $vendors = User::where('role', 'vendor')->get();
        return view('admin.vendors.index', compact('vendors'));
    }

    public function approveVendor($id)
    {
        $vendor = User::findOrFail($id);
        $vendor->is_approved = true;
        $vendor->save();

        return back()->with('success', 'Vendor berhasil disetujui.');
    }

    // RFQ Management
    public function rfqList()
    {
        $rfqs = RFQ::with('product', 'buyer')->get();
        return view('admin.rfqs.index', compact('rfqs'));
    }

    public function approveRFQ($id)
    {
        $rfq = RFQ::findOrFail($id);
        $rfq->status = 'approved';
        $rfq->save();

        // Buat PO otomatis
        PurchaseOrder::create([
            'rfq_id' => $rfq->id,
            'vendor_id' => $rfq->product->user_id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'RFQ disetujui dan PO dibuat.');
    }

    public function rejectRFQ($id)
    {
        $rfq = RFQ::findOrFail($id);
        $rfq->status = 'rejected';
        $rfq->save();

        return redirect()->back()->with('error', 'RFQ ditolak.');
    }
}
