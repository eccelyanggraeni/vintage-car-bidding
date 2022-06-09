@include('layout.header')

<div class="container mt-4">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{$produk->picture}}" alt="..." /></div>
        <div class="col-md-6">
            <div class="small mb-1">Lokasi: {{$produk->location}}</div>
            <h1 class="display-5 fw-bolder">{{$produk->name}}</h1>
            <div class="fs-5 mb-5">
                <span>Kontak: {{$produk->contact}}</span>
            </div>
            <p class="lead">Harga Awal: Rp{{number_format($produk->price,0,'.',',')}}</p>
            <div class="d-flex">
                <a class="btn btn-success" type="button">
                    <i class="bi-cart-fill me-1"></i>
                    Start Bid
                </a>
            </div>
        </div>
    </div>
    @if(count($produk->history)>0)
    <h1 class="mt-5">Riwayat Service</h1>
    <div class="row">
        <div class="col-sm-4">
            <table class="table">
                <tbody>
                @foreach($produk->history as $ph)
                    <tr>
                        <td>{{date('M d, Y',strtotime($ph->history_date))}}</td>
                        <td style="word-break: break-all">{{$ph->history}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

@include('layout.footer')