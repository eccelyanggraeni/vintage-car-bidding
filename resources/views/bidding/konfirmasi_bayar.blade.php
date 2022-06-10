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
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <form action="/konfirmasi_bayar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="bidding_id" class="form-label">Bidding ID</label>
                <input type="text" name="bidding_id"  class="form-control" id="bidding_id" value="{{ $bidding_id }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="text" name="nominal"  class="form-control" id="nominal">
            </div>
            <div class="mb-3">
                <label for="bukti_bayar" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti_bayar" class="form-control" placeholder="Choose file" id="bukti_bayar">
            </div>
            <div class="mb-3">
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="submit">Konfirmasi Pembayaran</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('layout.footer')