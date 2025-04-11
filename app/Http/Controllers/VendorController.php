<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:vendors',
            'password' => 'required|min:6',
            'company_name' => 'required',
        ]);

        $vendor = Vendor::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'company_name' => $validated['company_name'],
            'status' => 'pending'
        ]);

        return response()->json(['message' => 'Vendor registered successfully', 'vendor' => $vendor]);
    }

    public function approve($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->status = 'approved';
        $vendor->save();

        return response()->json(['message' => 'Vendor approved']);
    }
}
