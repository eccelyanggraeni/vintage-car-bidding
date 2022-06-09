@include('layout.header')

<div class="container">
    <form action="{{isset($riwayat) ? '/editriwayat' : '/addriwayat'}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="history_date">Date</label>
                    <input class="form-control" type="date" name="history_date" id="history_date" value="{{isset($riwayat) ? $riwayat->history_date : ''}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="history">History</label>
                    <input class="form-control" type="text" name="history" id="history" value="{{isset($riwayat) ? $riwayat->history : ''}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="checkbox" name="again" id="again" value="1">
            <label for="again">Input Riwayat Lagi?</label>
        </div>
        <input type="hidden" name="product_id" value="{{isset($request->product_id) ? $request->product_id : session('product_id')}}">
        @if(isset($riwayat))
            <input type="hidden" name="id" value="{{$riwayat->id}}">
        @endif
        <input class="btn btn-primary mt-2" type="submit" value="Save">
    </form>
</div>

@include('layout.footer')