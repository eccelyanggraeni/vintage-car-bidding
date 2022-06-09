@include('layout.header')

    <div class="container">
        <div class="header-text">
            <h4>{{ $title }}</h4>
        </div>
        <div class="row">
            <form method="POST" action="/auth">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
            </form>
        </div>
    </div>

    @include('layout.footer')