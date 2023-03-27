<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    <!-- TITLE -->
    <title>{{ $title }}</title>
    @php
    $logodetails = getdetails();

@endphp
    <!--  FAVICON  -->
    <link rel="shortcut icon" href="{{ asset('public/upload/details/'.$logodetails[0]->favicon) }}">

    <!-- FONT AWESOME ICONS LIBRARY -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/fonts/css/all.min.css') }}">

    <!-- CSS LIBRARY STYLES -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/lib/bootstrap.min.css') }}">
    <link rel='stylesheet' href="{{ asset('public/frontend/assets/css/lib/flickity.min.css') }}">
    <link rel='stylesheet' href="{{ asset('public/frontend/assets/css/lib/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/lib/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/lib/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/lib/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/navbar.css') }}">

    <!-- CSS TEMPLATE STYLES -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/responsive.css') }}">



    @if (!empty($css))
        @foreach ($css as $value)
            @if(!empty($value))
                <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/customcss/'.$value) }}">
            @endif
        @endforeach
    @endif


    @if (!empty($plugincss))
        @foreach ($plugincss as $value)
            @if(!empty($value))
                <link rel="stylesheet" href="{{ asset('public/frontend/assets/'.$value) }}">
            @endif
        @endforeach
    @endif

    <script>
        var baseurl = "{{ asset('/') }}";
    </script>
</head>
