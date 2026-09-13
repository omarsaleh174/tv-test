<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="{{getSettingValue('name')}}">
		<meta name="author" content="{{getSettingValue('name')}}">
		<meta name="keywords" content="{{getSettingValue('name')}}">
        <title>{{getSettingValue('name')}}</title>
        <link rel="icon" href="{{asset('images/settings/' . getSettingValue('logo'))}}">
        <link id="style" href="{{asset('build/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
        <link id="style" href="{{asset('build/assets/plugins/bootstrap/css/bootstrap-grid.css.map') }}" rel="stylesheet" >
        <link rel="preload" as="style" href="{{ asset('build/assets/app-c11bff25.css') }}" />
        <link rel="preload" as="style" href="{{ asset('build/assets/app-2313e121.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/app-c11bff25.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/app-2313e121.css') }}" />
        
        @yield('styles')
        <style>
        .form-control {
            background-color: #f0f0f0; /* Light gray background */
            color: #000; /* Black text */
            border: 1px solid #ccc; /* Add a border for better visibility */
        }
        
        .form-control::placeholder {
            color: #666; /* Darker placeholder for better contrast */
        }
        
        .form-control {
            border: 1px solid #d1d1d1; /* Light border */
            padding: 10px;
            font-size: 16px;
        }
        .modal-body {
            background-color: #fff; /* White background */
        }
        
        .card-primary {
            background-color: #f8f9fa; /* Slightly darker than white */
            border: 1px solid #ddd;
        }
        .card-primary {
            background-color: #ffffff; /* Change background to white */
            color: #333; /* Darker text */
        }
        
        .card-header {
            background-color: #007bff; /* Bootstrap primary color */
            color: white; /* White text for better visibility */
        }
        select.form-control {
            width: 100%; /* Make sure the select box takes the full width of its container */
            height: auto; /* Allow the height to adjust automatically */
            padding: 8px 12px; /* Add padding to make it more readable */
            font-size: 16px; /* Set a readable font size */
        }
        select.form-control {
            padding: 0.375rem 0.75rem; /* Adjust padding for better visibility */
        }
        select.form-control {
            overflow: visible; /* Ensure that the options are fully visible */
            white-space: nowrap; /* Prevent the text from wrapping inside the select box */
        }
        
        </style>
        
	</head>
	<body class="app ltr sidebar-mini light-mode">
		<div id="global-loader">
			<img src="{{asset('build/assets/images/svgs/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<div class="page">
            <div class="page-main">        
                @include('layouts.components.app-header')
                @include('layouts.components.app-sidebar')
				<div class="app-content main-content">
					<div class="side-app">
						<div class="main-container">
                            @if(session()->has('message') )
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        {{session('message')}}
                                </div>
                            @endif
                        @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.components.sidebar-right')
            {{-- @include('layouts.components.modal') --}}
			@include('layouts.components.footer')
            @yield('modals')
		</div>
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
        <script src="{{asset('build/assets/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/sidemenu/sidemenu.js')}}"></script>
        <script src="{{asset('build/assets/plugins/sidebar/sidebar.js')}}"></script>
        <script src="{{asset('build/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('build/assets/plugins/p-scroll/pscroll.js')}}"></script>
        <script src="{{asset('build/assets/plugins/p-scroll/pscroll-1.js')}}"></script>
<link rel="modulepreload" href="{{ asset('build/assets/sticky-425e1fac.js') }}" />
<script type="module"      src="{{ asset('build/assets/sticky-425e1fac.js') }}"></script>
<script src="{{ asset('build/assets/plugins/jquery/jquery.sparkline.min.js') }}"></script>
<link rel="modulepreload" href="{{ asset('build/assets/index1-1937e662.js') }}" />
<script type="module" src="{{ asset('build/assets/index1-1937e662.js')}}"></script> 
<link rel="modulepreload" href="{{ asset('build/assets/switcher-994bb332.js') }}" />
<script type="module" src="{{ asset('build/assets/switcher-994bb332.js')}}"></script> 
<link rel="modulepreload" href="{{ asset('build/assets/themeColors-c40a1e1e.js') }}" />
<link rel="modulepreload" href="{{ asset('build/assets/app-674234a8.js') }}" />
<script type="module" src="{{ asset('build/assets/app-674234a8.js')}}"></script> 
        @if(\Route::currentRouteName()== 'home'||\Route::currentRouteName()== 'index')
            <link rel="modulepreload" href="{{ asset('build/apexcharts.js') }}" />
            <script type="module" src="{{ asset('build/assets/apexcharts-36cd331b.js')}}"></script> 
        @endif
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(5000, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
    </script>
        @yield('scripts')
        @yield('js')                
	</body>
</html>
