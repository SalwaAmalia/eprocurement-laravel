@extends('layouts.app')

@section('content')
    <h2>Tambah Produk</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nama Produk</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
