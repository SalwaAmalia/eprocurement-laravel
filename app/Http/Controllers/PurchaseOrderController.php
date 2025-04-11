<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\RFQ;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $pos = PurchaseOrder::with('rfq')->where('vendor_id', auth()->id())->get();
        return view('vendor.pos.index', compact('pos'));
    }

    public function confirm($id)
    {
        $po = PurchaseOrder::findOrFail($id);
        $po->update(['status' => 'confirmed']);
        return back()->with('success', 'PO dikonfirmasi');
    }

    public function decline($id)
    {
        $po = PurchaseOrder::findOrFail($id);
        $po->update(['status' => 'declined']);
        return back()->with('error', 'PO ditolak');
    }
}
