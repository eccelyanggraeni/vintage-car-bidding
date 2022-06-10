@include('layout.header')

<div class="container">
    <div class="row">
    @foreach($produk as $p)
        <div class="col-md-4">
            <div class="card mt-5">
                <img class="card-img-top" src="{{$p->picture!=null ? url($p->picture) : url('/assets/noimg.jpg')}}" alt="" height="300">
                <div class="card-body h-75">
                    <div class="row">
                        <div class="col-md-6"><b>{{$p->name}}</b></div>
                        <div class="col-md-6" style="text-align:right;"><b>Rp{{number_format($p->price,0,',','.')}}</b></div>
                    </div>
                    <div style="word-break: break-all">{{$p->location}}</div>
                    <div style="word-break: break-all">{{$p->contact}}</div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-8">
                        @can('isUser')
                            <a class="btn btn-success" href="/detail?id={{$p->id}}">Start Bid</a>
                        @else
                            <a class="btn btn-success" href="/login">Start Bid</a>
                        @endcan
                        </div>
                        <div class="col-lg-4" style="text-align:right;">
                            <a class="btn btn-primary" href="/detail?id={{$p->id}}">Detail</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

@include('layout.footer')