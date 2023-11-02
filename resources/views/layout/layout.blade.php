<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="assets/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}

    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
@stack('css')
</head>

<body>
{{-- This is where the header will be added --}}
@include('layout.header')

<div class="page-wrap">

    {{--to add the left side bar--}}
    @auth
        @include('layout.left_sidebar')
        
    @endauth


    <div class="central-content top-level-panel">
        @yield('content')
    </div>

    {{-- to add the right side bar--}}
    @auth
        @include('layout.right_sidebar')
        
    @endauth

</div>
@stack('scripts')
</body>
</html>