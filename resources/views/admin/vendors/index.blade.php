@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Daftar Vendor</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Status Persetujuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>
                        @if($vendor->is_approved)
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-warning text-dark">Belum Disetujui</span>
                        @endif
                    </td>
                    <td>
                        @if(!$vendor->is_approved)
                            <form action="{{ route('admin.vendors.approve', $vendor->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-primary">Setujui</button>
                            </form>
                        @else
                            <button class="btn btn-sm btn-secondary" disabled>Sudah Disetujui</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
