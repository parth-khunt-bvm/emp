<!DOCTYPE html>

<html lang="en">

<head>

		<meta charset="utf-8" />
        <title>{{ $title }}</title>
		<meta name="description" content="{{ $description}}" />
		<meta name="keywords" content="{{ $keywords}}" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->

		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('public/backend/assets/css/pages/login/login-1d1cf.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->

		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('public/backend/assets/plugins/global/plugins.bundled1cf.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/backend/assets/plugins/custom/prismjs/prismjs.bundled1cf.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/backend/assets/css/style.bundled1cf.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/backend/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">


        @yield('content')

		<div id="loader"></div>
		<script src="{{ asset('public/backend/assets/js/pages/jquery/jquery.min.js') }}"></script>

		@if (!empty($pluginjs))
			@foreach ($pluginjs as $value)
				<script src="{{ asset('public/backend/assets/js/'.$value) }}" type="text/javascript"></script>
			@endforeach
		@endif

		@if (!empty($js))
		@foreach ($js as $value)
			<script src="{{ asset('public/backend/assets/js/customjs/'.$value) }}" type="text/javascript"></script>
		@endforeach
		@endif
		<script type="text/javascript">
			jQuery(document).ready(function () {
				// alert("Hello");
				$('#loader').show();
				$('#loader').fadeOut(3000);
				// exit;
			});
			</script>

		<script>

			jQuery(document).ready(function () {
				@if (!empty($funinit))
						@foreach ($funinit as $value)
							{{  $value }}
						@endforeach
				@endif
			});
		</script>
	</body>
	<!--end::Body-->

</html>
