<!DOCTYPE html>
@if(app()->getLocale()=='en')
    <html dir="ltr" lang="en">
        @else
        <html dir="ltr" lang="en">
    {{-- <html dir="rtl" lang="ar"> --}}
@endif
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{getSettingValue('name')}}</title>
    <link rel="icon" href="{{asset('images/settings/' . getSettingValue('logo'))}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
    @if(app()->getLocale()=='ar')
    {{-- <link rel="stylesheet" href="{{asset('adminlte/ar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_rtl.css')}}">  --}}

    @endif

</head>

    @if(session('mode')=='sun')
        <body class=" hold-transition sidebar-mini layout-fixed">
    @else
        <body class="dark-mode  hold-transition sidebar-mini layout-fixed">
    @endif
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('images/settings/' . getSettingValue('logo'))}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    @if(session('mode')=='sun')
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @else
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    @endif
            <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <form method="POST" action="{{ route('logout') }}"  accept-charset="UTF-8" id="form1">
                {{ method_field('POST') }} {{ csrf_field() }}
                <a  class="nav-link" href="#" onclick="document.getElementById('form1').submit();">logout!</a>
            </form>
        </li>
    </ul>
    <ul class="navbar-nav ">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if($localeCode!=app()->getLocale())
            <li class="nav-item">
                <a style="margin-left:6px;background: none; color: inherit; border: none; font: inherit; cursor: pointer; outline: inherit" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ app()->getLocale()=="ar" ? "English" : "اللغة العربية" }}</a></li>
            @endif
        @endforeach
    </ul>

    <ul class="navbar-nav">
            @if(session('mode')=='sun')
            <a href="{{ route('web.mode') }}?mode=moon">
                <i  class="fas fa-sun nav-item" style="color: black;padding-left: 20px;"></i>
            </a>
            @else
            <a href="{{ route('web.mode') }}?mode=sun">
                <i class="fas fa-moon nav-item" style="color: white;padding-left: 20px;"></i>
            </a>
            @endif
    </ul>
    
    </nav>

