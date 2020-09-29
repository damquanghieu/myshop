<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('admin/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap_4/css/bootstrap.min.css')}}"">

    <link href="{{asset('vendor/fontawesome-free-5.13.1/css/fontawesome.min.css')}}" rel="stylesheet" >
	<link href="{{asset('vendor/fontawesome-free-5.13.1/css/brands.css')}}" rel="stylesheet" >
    <link href="{{asset('vendor/fontawesome-free-5.13.1/css/solid.css')}}" rel="stylesheet" >
{{--<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>--}}    
{{--     <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 --}}   
    @yield('css')
    <title>Home</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
    @include('sweetalert::alert')
    <div id="content">
      
        @include('admin.layouts.sidebar')
        <div class="right">
            <div class="container">
                @include('admin.layouts.navbar')
                    @yield('content')
                @include('admin.layouts.footer')
            </div>
           
        </div>
    </div>
<script rel="stylesheet" href="{{asset('vendor/bootstrap_4/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('admin/js/index.js')}}"></script>
@yield('js')
</body>
</html>


