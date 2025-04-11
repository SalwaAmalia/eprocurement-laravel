@extends('layouts.app')

@section('content')
    <h2>Daftar Produk</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Tambah Produk</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Nama</th><th>Harga</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price) }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
