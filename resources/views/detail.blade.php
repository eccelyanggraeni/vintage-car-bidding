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
            <?php $max_bid = 0; ?>
            @foreach($produk->bidding as $pb)
                @if($pb->bid_price > $max_bid)
                <?php $max_bid = $pb->bid_price;?>
                @endif
            @endforeach
            <p class="lead">Harga Awal: Rp{{number_format($produk->price,0,'.',',')}}</p>
            <div class="d-flex">
                <form action="/addbidding" method="post">
                    @csrf
                    <input class="form-control" type="number" name="bid_price" id="" style="width:200px;" placeholder="Harga Bidding" min="{{$max_bid!=0 ? $max_bid+5000000 : $produk->price+5000000}}" value="{{$max_bid!=0 ? $max_bid+5000000 : $produk->price+5000000}}">
                    <input type="hidden" name="product_id" value="{{$produk->id}}">
                    <input class="btn btn-success" type="submit" value="Start Bid">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if(count($produk->history)>0)
                <h1 class="mt-5">Riwayat Service</h1>
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
            @endif
        </div>
        <div class="col-md-6">
            @if(count($produk->bidding)>0)
                <h1 class="mt-5">Riwayat Bidding</h1>
                <h5 style="color: red;">Bidding ditutup pada: {{date('M d, Y',strtotime($produk->expired_date))}}</h5>
                <table class="table">
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($produk->bidding as $pb)
                        <tr>
                            <td style="{{$i==0 ? 'font-weight: bold' : ''}}">{{date('M d, Y',strtotime($pb->bidding_date))}}</td>
                            <td style="word-break: break-all; text-align:right; {{$i==0 ? 'font-weight: bold' : ''}}">Rp{{number_format($pb->bid_price,0,',','.')}}</td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    
</div>

@include('layout.footer')