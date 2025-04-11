@extends('layouts.app')

@section('content')
    <h1>Dashboard {{ $role }}</h1>
    @if ($role === 'Admin')
        <a href="{{ route('admin.vendors') }}" class="btn btn-primary">Kelola Vendor</a>
    @elseif ($role === 'Vendor')
        <a href="{{ route('products.index') }}" class="btn btn-primary">Produk Saya</a>
    @elseif ($role === 'Buyer')
        <a href="{{ route('catalog') }}" class="btn btn-primary">Lihat Katalog</a>
    @endif
@endsection
