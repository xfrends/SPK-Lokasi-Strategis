<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SPK Lokasi Strategis</title>
    <link rel="stylesheet" href="{{asset('bootstrap-4.0.0-dist/css/bootstrap.css')}}">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-4 py-5">
                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card">
                    <form action="{{url('login')}}" method="POST" class="card-body">
                        <div class="card-title">
                            <h1 class="text-center">Login</h1>
                        </div>
                        @csrf
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('jquery.js')}}"></script>
    <script src="{{asset('bootstrap-4.0.0-dist/js/bootstrap.js')}}"></script>

</body>

</html>