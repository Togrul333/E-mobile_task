<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif
        @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
        @endforeach
        @yield('content')
    </div>
</div>
@yield('js')
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
</html>

