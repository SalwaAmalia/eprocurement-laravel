@extends('layouts.app')

@section('content')
    <h2>Katalog Produk</h2>

    <form method="GET" action="{{ route('catalog') }}" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
    </form>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ $product->description }}</p>
                        <p><strong>Rp {{ number_format($product->price) }}</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $products->links() }}
@endsection
