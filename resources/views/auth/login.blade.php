@extends('layouts.app')

@section('content')
<h3>Login</h3>

<form method="POST" action="/login">
    @csrf
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary">Login</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger mt-2">
        {{ $errors->first() }}
    </div>
@endif
@endsection
