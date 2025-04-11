@extends('layouts.app')

@section('content')
<h2>Product Catalog</h2>
<form method="GET">
    <input type="text" name="search" placeholder="Search name" value="{{ request('search') }}">
    <select name="category">
        <option value="">All</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Kantor">Kantor</option>
    </select>
    <button type="submit">Filter</button>
</form>

<table class="table">
    <thead><tr><th>Nama</th><th>Kategori</th><th>Harga</th></tr></thead>
    <tbody>
        @foreach($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category }}</td>
                <td>Rp {{ number_format($p->price) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection
