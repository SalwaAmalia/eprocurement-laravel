@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-select" required>
                    <option value="">Pilih</option>
                    <option value="vendor">Vendor</option>
                    <option value="buyer">Buyer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</div>
@endsection
