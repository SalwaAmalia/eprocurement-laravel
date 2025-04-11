@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Daftar Purchase Order</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pos as $po)
                <tr>
                    <td>{{ $po->rfq->product->name }}</td>
                    <td>{{ $po->rfq->quantity }}</td>
                    <td>{{ ucfirst($po->status) }}</td>
                    <td>
                        @if($po->status == 'pending')
                            <form action="{{ route('pos.confirm', $po->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                <button class="btn btn-success btn-sm">Konfirmasi</button>
                            </form>
                            <form action="{{ route('pos.decline', $po->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                <button class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @else
                            <span class="badge bg-secondary">Selesai</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
