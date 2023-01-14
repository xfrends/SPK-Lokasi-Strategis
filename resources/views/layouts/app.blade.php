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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{url('')}}">SPK Lokasi Strategis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav d-md-none d-lg-none d-xl-none">
            <li class="nav-item @if(Route::is('criteria.*')) active @endif">
              <a class="nav-link" href="{{route('criteria.index')}}">Criteria</a>
            </li>
            <li class="nav-item @if(Route::is('alternative.*')) active @endif">
              <a class="nav-link" href="{{route('alternative.index')}}">Alternative</a>
            </li>
            <li class="nav-item @if(Route::is('value.*')) active @endif">
              <a class="nav-link" href="{{route('value.index')}}">Alternative Value</a>
            </li>
            <li class="nav-item @if(Route::is('s-value.*')) active @endif">
              <a class="nav-link" href="{{route('s-value.index')}}">S Value</a>
            </li>
            <li class="nav-item @if(Route::is('v-value.*')) active @endif">
              <a class="nav-link" href="{{route('v-value.index')}}">V Value</a>
            </li>
          </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 py-5 card border-0 h-100 shadow d-none d-md-block d-lg-block d-xl-block">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link @if(Route::is('criteria.*')) active @endif" href="{{route('criteria.index')}}" >Criteria</a>
                  <a class="nav-link @if(Route::is('alternative.*')) active @endif" href="{{route('alternative.index')}}" >Alternative</a>
                  <a class="nav-link @if(Route::is('value.*')) active @endif" href="{{route('value.index')}}" >Alternative Value</a>
                  <a class="nav-link @if(Route::is('s-value.*')) active @endif" href="{{route('s-value.index')}}" >S Value</a>
                  <a class="nav-link @if(Route::is('v-value.*')) active @endif" href="{{route('v-value.index')}}" >V Value</a>
                </div>
            </div>
            <div class="col-md-10 py-5">
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

                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{asset('jquery.js')}}"></script>
    <script src="{{asset('bootstrap-4.0.0-dist/js/bootstrap.js')}}"></script>

</body>

</html>