<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @if (Str::length(Auth::guard('petugas')->user())>0)
        <title>{{config('app.name')}} - Petugas</title>
    @elseif (Str::length(Auth::guard('mahasiswa')->user())>0) 
        <title>{{config('app.name')}} - Mahasiswa</title>
    @elseif (Str::length(Auth::guard('web')->user())>0) 
        <title>{{config('app.name')}} - Administrator</title>
    @endif
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- plugin css -->
     <!-- plugin css -->
     <link href="{{asset('css/iconfont.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
     <!-- end plugin css -->
     <link href="{{asset('css/prism.css')}}" rel="stylesheet" type="text/css" />
     <!-- common css -->
     <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
     <!-- end common css -->
     <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap5.css')}}">
     
     
    @include('templates.style')
    @stack('styles')
</head>

<body data-base-url="/">

    <script src="{{asset('js/spinner.js')}}"></script>

    <div class="main-wrapper" id="app">
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{route('dashboard')}}" class="sidebar-brand">SIPENMA</a>
        </div>
        <div class="sidebar-body">
            @include('templates.left_menu')
        </div>
    </nav>

    <div class="page-wrapper">

        <nav class="navbar">

            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>

            <div class="navbar-content">
                @include('templates.top_menu')
            </div>

        </nav>

        <div class="page-content">
            @yield('content')
        </div>

        @include('templates.footer')
        @include('templates.script')
      
    </div>
</div>

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<script src="{{asset('js/feather.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/perfect-scrollbar.min.js')}}" type="text/javascript"></script>
<!-- end base js -->

<!-- plugin js -->
<script src="{{asset('js/prism.js')}}" type="text/javascript"></script>
<script src="{{asset('js/clipboard.min.js')}}" type="text/javascript"></script>
<!-- end plugin js -->

<!-- common js -->
<script src="{{asset('js/template.js')}}" type="text/javascript"></script>
<!-- end common js -->

<script src="{{asset('js/jquery.dataTables.js')}}" type="text/javascript"></script>
<script src="{{asset('js/dataTables.bootstrap5.js')}}" type="text/javascript"></script>
<script src="{{asset('js/data-table.js')}}"></script>



@stack('scripts')
</body>
</html>
