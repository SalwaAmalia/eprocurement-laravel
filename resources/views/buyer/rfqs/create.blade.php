
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Buat RFQ</h3>

    <form action="{{ route('rfqs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Pilih Produk</label>
            <select name="product_id" id="product_id" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - Stok: {{ $product->stock }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Kirim RFQ</button>
    </form>
</div>
@endsection
