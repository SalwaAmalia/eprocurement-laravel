@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Daftar RFQ</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Buyer</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rfqs as $rfq)
                <tr>
                    <td>{{ $rfq->product->name }}</td>
                    <td>{{ $rfq->quantity }}</td>
                    <td>{{ $rfq->buyer->name }}</td>
                    <td>
                        <span class="badge bg-{{ $rfq->status === 'pending' ? 'warning text-dark' : ($rfq->status === 'approved' ? 'success' : 'danger') }}">
                            {{ ucfirst($rfq->status) }}
                        </span>
                    </td>
                    <td>
                        @if($rfq->status === 'pending')
                            <form action="{{ route('admin.rfqs.approve', $rfq->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            <form action="{{ route('admin.rfqs.reject', $rfq->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Terkunci</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
