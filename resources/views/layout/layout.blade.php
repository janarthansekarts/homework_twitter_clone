<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="assets/css/font-awesome.css}" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
{{-- This is where the header will be added --}}
@include('layout.header')

<div class="page-wrap">

    {{--to add the left side bar--}}
    @include('layout.left_sidebar')


    <div class="central-content top-level-panel">
        @yield('content')
    </div>

    {{-- to add the right side bar--}}
    @include('layout.right_sidebar')

</div>

</body>
</html>