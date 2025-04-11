<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Procurement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="{{ url('/') }}">E-Proc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>

                    {{-- Role-based navigation --}}
                    @if (Auth::user()->role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.vendors') }}">Vendor</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.rfqs.index') }}">RFQ Masuk</a></li>
                    @elseif (Auth::user()->role === 'vendor')
                        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Produk</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pos.index') }}">PO Masuk</a></li>
                    @elseif (Auth::user()->role === 'buyer')
                        <li class="nav-item"><a class="nav-link" href="{{ route('catalog') }}">Katalog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('rfqs.index') }}">RFQ</a></li>
                    @endif

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
