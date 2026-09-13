<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
        <title>{{getSettingValue('name')}}</title>
        <link rel="icon" href="{{asset('images/settings/' . getSettingValue('logo'))}}">
        <link id="style" href="{{asset('build/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
        <link rel="preload" as="style" href="{{ asset('build/assets/app-c11bff25.css') }}" />
        <link rel="preload" as="style" href="{{ asset('build/assets/app-2313e121.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/app-c11bff25.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/app-2313e121.css') }}" />

		@yield('styles')
        
	</head>

	<body class="login-img">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('build/assets/images/svgs/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page bg-img">

        	@yield('content')

		</div>

		<!-- JQUERY JS -->
		<script src="{{asset('build/assets/plugins/jquery/jquery.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('build/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('build/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
		
		@yield('scripts')

        <!-- APP JS-->
		<link rel="modulepreload" href="{{ asset('build/assets/themeColors-c40a1e1e.js') }}" />
		<link rel="modulepreload" href="{{ asset('build/assets/app-674234a8.js') }}" />
		<script type="module" src="{{ asset('build/assets/app-674234a8.js')}}"></script> 
				<!-- END SCRIPTS -->
		
	</body>
</html>

