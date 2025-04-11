<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RFQ;
use App\Models\Product;

class RFQController extends Controller
{
    public function index()
    {
        $rfqs = RFQ::with('product')->where('buyer_id', auth()->id())->get();
        return view('buyer.rfqs.index', compact('rfqs'));
    }

    public function create()
    {
        $products = Product::all();
        return view('buyer.rfqs.create', compact('products'));
    }

    public function store(Request $request)
    {
        RFQ::create([
            'buyer_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => 'pending',
        ]);

        return redirect()->route('rfqs.index')->with('success', 'RFQ dikirim!');
    }
}
