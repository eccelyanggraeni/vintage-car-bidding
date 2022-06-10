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
                    <th>Bukti Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->bidding_date }}</td>
                    <td>{{ $a->user_id }}</td>
                    <td>{{ $a->bid_price }}</td>
                    <td><img src="{{ asset('/files/'.$a->pay_file) }}" alt="example-image" width="100"></td>
                    <td>
                        <a href="{{ url('/approval/payment/'.$a->id) }}" class="btn btn-success">Approve</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('layout.footer')