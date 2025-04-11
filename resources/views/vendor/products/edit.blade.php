@extends('layouts.app')

@section('content')
    <h2>Edit Produk</h2>

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Produk</label>
            <input name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
