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
        <div class="mb-3">
            <div class="d-grid gap-2 d-md-block">
                <a href="{{ url('/user/tambah') }}" class="btn btn-primary">Tambah User</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->role }}</td>
                    <td>
                        <a href="{{ url('/user/update/'.$a->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/user/hapus/'.$a->id) }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layout.footer')