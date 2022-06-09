@include('layout.header')

<div class="container">
    <a class="btn btn-primary" href="/addprodukform">Add</a>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Product Picture</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Owner's Contact</th>
                <th class="text-center">Initial Price</th>
                <th class="text-center">Location</th>
                <th class="text-center">Expired Date</th>
                <th class="text-center">Function</th>
            </tr>
        </thead>
        <tbody>
        @foreach($produk as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td><img src="{{url($p->picture)}}" alt="" width="60" height="60"></td>
                <td>{{$p->name}}</td>
                <td  style="word-break: break-all">{{$p->contact}}</td>
                <td style="text-align: right;">Rp{{number_format($p->price,0,',','.')}}</td>
                <td  style="word-break: break-all">{{$p->location}}</td>
                <td>{{$p->expired_date}}</td>
                <td>
                    <a class="btn btn-warning" href="/editprodukform?id={{$p->id}}">Edit</a>
                    <a class="btn btn-danger" href="/hapusproduk?id={{$p->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@include('layout.footer')