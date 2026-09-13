<!DOCTYPE html>
@if(app()->getLocale()=='en')
<html dir="ltr" lang="en">
    @else
    <html dir="ltr" lang="en">
@endif

<head>
    <title>{{getSettingValue('name')}}</title>
    <link rel="icon" href="{{asset('images/settings/' . getSettingValue('logo'))}}">
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('client/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">

  </head>
  <body>
	  <div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="{{route('welcome')}}">{{getSettingValue('name')}}</a>
    			</div>
	    		<div class="col-lg-8 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text">
					    		<span>{{ trans('cruds.email') }}</span>
						    	<span>{{getSettingValue('email')}}</span>
						    </div>
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text">
						    	<span>{{ trans('cruds.phone') }}</span>
						    	<span>{{getSettingValue('phone')}}</span>
						    </div>
					    </div>
					    <div class="col-md topper d-flex align-items-center justify-content-end">
					    	<p class="mb-0 d-block">
								@if(Auth::guard('client')->check())  
									<a href="{{ route('client.add_tender')}}" class="btn py-2 px-3 btn-primary"><span>{{trans('cruds.add_tender') }}</span></a>
								@else
									<a href="{{ route('login')}}" class="btn py-2 px-3 btn-primary"><span>{{trans('cruds.add_tender') }}</span></a>
								@endif
					    	</p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container d-flex align-items-center">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		  </button>
		  <div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active"><a href="{{route('welcome')}}" class="nav-link pl-0">{{ trans('cruds.home') }}</a></li>
			  <li class="nav-item"><a href="{{route('about')}}" class="nav-link">{{ trans('cruds.about') }}</a></li>
			  <li class="nav-item"><a href="{{route('welcome')}}" class="nav-link">{{ trans('cruds.tenders') }}</a></li>
			  <li class="nav-item"><a href="{{route('all_consultants')}}" class="nav-link">{{ trans('cruds.consultants') }}</a></li>
			  <li class="nav-item"><a href="{{route('welcome')}}" class="nav-link">{{ trans('cruds.blog') }}</a></li>
			  <li class="nav-item"><a href="{{route('welcome')}}" class="nav-link">{{ trans('cruds.contact') }}</a></li>
			</ul>
	  
			<!-- Right-aligned login/profile link -->
			<div class="navbar-nav ml-auto">
			  @if(Auth::guard('client')->check())  
				<li class="nav-item"><a href="{{route('client.profile')}}" class="nav-link">{{ trans('cruds.profile') }}</a></li>
			  @else
				<li class="nav-item"><a href="{{route('client.login')}}" class="nav-link">{{ trans('cruds.login') }}</a></li>
			  @endif
			</div>
		  </div>
		</div>
	  </nav>
	   {{-- <ul class="navbar-nav ">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if($localeCode!=app()->getLocale())
            <li class="nav-item">
                <a style="margin-left:6px;background: none; color: inherit; border: none; font: inherit; cursor: pointer; outline: inherit" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ app()->getLocale()=="ar"?"English":"Ø§Ù„Ù„ØºØ© Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©" }}</a></li>
            @endif
        @endforeach
    </ul>     --}}

