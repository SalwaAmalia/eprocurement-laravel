@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Daftar Permintaan Penawaran Saya</h3>
    <a href="{{ route('rfqs.create') }}" class="btn btn-primary mb-3">Buat Permintaan Penawaran Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rfqs as $rfq)
                <tr>
                    <td>{{ $rfq->product->name }}</td>
                    <td>{{ $rfq->quantity }}</td>
                    <td>{{ $rfq->notes }}</td>
                    <td>{{ ucfirst($rfq->getStatus()) }}</td>
                    <td>{{ $rfq->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
