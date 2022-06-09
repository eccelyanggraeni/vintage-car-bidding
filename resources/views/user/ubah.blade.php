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
            <form action="/user/update" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama</label>
                    <input type="text" name="nama_user" class="form-control" id="nama_user" value="{{ $user->name }}">
                    <input type="hidden" name="id" class="form-control" id="id" value="{{ $user->id }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{ $user->password }}">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-control" id="role">
                        <option value="">---Pilih Role---</option>
                        <option value="admin" @if ($user->role == "admin") {{"selected"}} @endif>Admin</option>
                        <option value="manager" @if ($user->role == "manager") {{"selected"}} @endif>Manager</option>
                        <option value="user" @if ($user->role == "user") {{"selected"}} @endif>User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('layout.footer')