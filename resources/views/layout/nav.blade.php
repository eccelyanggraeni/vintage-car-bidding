<div class="header">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vintage Car Bidding</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/produk') }}">Produk</a>
                </li>
                @if(session('email'))
                @can('isUser')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Bidding</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">List Bidding</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/]') }}">Riwayat Bidding</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/winner_list') }}">Daftar Pemenang</a>
                </li>
                @elsecan('isManager')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/crudproduk') }}">Daftar Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Approval Pemenang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Approval Pembayaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Daftar Vendor Pengiriman</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Approval Pemenang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user') }}">Daftar User</a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
                @endif
            </ul>
            </div>
        </div>
    </nav>
</div>