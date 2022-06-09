@include('layout.header')

<div class="container">
    <form action="{{isset($produk) ? '/editproduk' : '/addproduk'}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(isset($produk))
        <img src="{{$produk->picture}}" alt="" height="200">
        @endif
        <div class="form-group">
            <label for="picture">Product Picture</label>
            <input class="form-control" type="file" name="picture" id="picture">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{isset($produk) ? $produk->name : ''}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" id="price" value="{{isset($produk) ? $produk->price : ''}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="contact">Owner's Contact</label>
            <input class="form-control" type="text" name="contact" id="contact" value="{{isset($produk) ? $produk->contact : ''}}">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input class="form-control" type="text" name="location" id="location" value="{{isset($produk) ? $produk->location : ''}}">
        </div>
        @if(isset($produk))
            <input type="hidden" name="id" value="{{$produk->id}}">
        @endif
        <input class="btn btn-primary mt-2" type="submit" value="Save">
    </form>
</div>

@include('layout.footer')