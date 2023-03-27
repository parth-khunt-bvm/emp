<head>

    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description}}" />
    <meta name="keywords" content="{{ $keywords}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('public/backend/assets/plugins/custom/fullcalendar/fullcalendar.bundled1cf.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('public/backend/assets/plugins/global/plugins.bundled1cf.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/plugins/custom/prismjs/prismjs.bundled1cf.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/style.bundled1cf.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('public/backend/assets/css/themes/layout/header/base/lightd1cf.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/themes/layout/header/menu/lightd1cf.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/themes/layout/brand/darkd1cf.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/themes/layout/aside/darkd1cf.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->
    @php
    $logodetails = getdetails();

@endphp
    <!--  FAVICON  -->
    <link rel="shortcut icon" href="{{ asset('public/upload/details/'.$logodetails[0]->favicon) }}">
    @if (!empty($css))
    @foreach ($css as $value)
    @if(!empty($value))
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/customcss/'.$value) }}">
    @endif
    @endforeach
    @endif


    @if (!empty($plugincss))
        @foreach ($plugincss as $value)
            @if(!empty($value))
                <link rel="stylesheet" href="{{ asset('public/backend/assets/'.$value) }}">
            @endif
        @endforeach
    @endif

    <script>
        var baseurl = "{{ asset('/') }}";
    </script>
</head>
