@include('layout.header')
<div class="container">
    <div class="header-text">
        <h4>{{ $title }}</h4>
    </div>
    <div class="row">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @elseif(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Bidding ID</th>
                    <th>Tanggal Bid</th>
                    <th>Produk</th>
                    <th>Nominal Bid</th>
                    <th>Pemenang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->bidding_date }}</td>
                    <td>{{ $a->product_id }}</td>
                    <td>{{ $a->bid_price }}</td>
                    <td>@if($a->win_status == 1) {{ "Ya" }} @else {{ "Tidak" }} @endif</td>
                    <td>
                        <a href="{{ url('/approve/choose_winner/'.$a->id.'/'.$a->product_id) }}" class="btn btn-success">Pilih sebagai pemenang</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('layout.footer')