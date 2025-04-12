<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckApprovedVendor
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'vendor' && !Auth::user()->is_approved) {
            return redirect()->route('dashboard')->with('error', 'Akun Anda belum disetujui oleh admin.');
        }

        return $next($request);
    }
}
