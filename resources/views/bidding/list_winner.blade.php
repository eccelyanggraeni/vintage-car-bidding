@include('layout.header')
<div class="container">
    <div class="header-text">
        <h4>{{ $title }}</h4>
    </div>
    <div class="row">
        <div class="bd-example">
        @foreach($data as $a)
            <div class="card text-center">
                <div class="card-header">
                    Congratulations!
                </div>
                <div class="card-body">
                    <h5 class="card-title">Selamat kepada {{ $user[$a->id] }} telah memenangkan bid ini.</h5>
                    <p class="card-text">Mohon membayar sejumlah bid yang telah diajukan. Jika sudah membayar, bisa mengonfirmasi dengan mengklik tombol di bawah ini.</p>
                    <a href="{{ url('/konfirmasi_bayar/'.$a->id) }}" class="btn btn-primary">Konfirmasi Pembayaran</a>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('layout.footer')
