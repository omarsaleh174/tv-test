<!DOCTYPE html>
  <html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale()=='en'?'ltr':'rtl' }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ getSeoValue('site_title') }}</title>
  <meta name="description" content="{{ getSeoValue('site_description') }}">
  <meta name="keywords" content="{{ implode(',', getSeoValue('site_keywords')) }}">
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "WebSite",
    "name": "{{ getSeoValue('site_title') }}",
    "description": "{{ getSeoValue('site_description') }}",
    "url": "{{ url('') }}",
    "keywords": "{{ implode(',', getSeoValue('site_keywords')) }}",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "{{ url('/') }}?q={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
  </script>
  
  
  <meta property="og:title" content="{{ getSeoValue('site_title') }}">
  <meta property="og:description" content="{{ getSeoValue('site_description') }}">
  <meta property="og:image" content="{{ url('images/settings/' . getSettingValue('logo')) }}">
  <meta property="og:url" content="https://www.tv-adviser.com">

  <link href="{{asset('images/settings/' . getSettingValue('logo'))}}" rel="icon">
  <link href="{{asset('home/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="{{asset('home/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  {{--
  <link href="{{asset('home/assets/vendor/aos/aos.css')}}" rel="stylesheet"> 
   --}} 
  <link href="{{asset('home/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('home/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('home/assets/css/main.css')}}" rel="stylesheet">
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-LLZPWPK2GJ"></script>
<style>
/* ØªÙ†Ø³ÙŠÙ‚ Ø§Ù„ØµÙˆØ±Ø© */
.logo-img {
  margin-right:0;
  max-height: 40px;          
  width: auto;               
  max-width: 100%;           
  border-radius: 50%;        
  object-fit: cover;         
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
  transition: transform 0.3s ease;
  margin-left: 20px;         
}

/* ØªØ£Ø«ÙŠØ± Ø§Ù„ØªÙ…Ø±ÙŠØ± Ø¹Ù„Ù‰ Ø§Ù„ØµÙˆØ±Ø© */
.logo-img:hover {
  transform: scale(1.05);     
}

 

</style>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-LLZPWPK2GJ');
  </script>
</head>
<body class="{{Route::currentRouteName()=='welcome'?'index-page':''}}">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1 class="sitename ms-2">{{ getSettingValue('name') }}</h1>
        <img src="{{ asset('images/settings/'.getSettingValue('logo')) }}" alt="{{ getSettingValue('name') }}" class="logo-img">
      </a>      
        <nav id="navmenu" class="navmenu">
            <ul>
              <li><a href="{{ route('welcome') }}" class="{{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}">{{ trans('cruds.home') }}</a></li>
              <li><a href="{{ route('client.tenders') }}" class="{{ Route::currentRouteName() == 'client.tenders' ? 'active' : '' }}">{{ trans('cruds.tenders') }}</a></li>
              <li><a href="{{ route('all_consultants') }}" class="{{ Route::currentRouteName() == 'all_consultants' ? 'active' : '' }}">{{ trans('cruds.consultants') }}</a></li>
              <li><a href="{{ route('about') }}" class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">{{ trans('cruds.about') }}</a></li>
              <li><a href="{{ route('welcome') }}#contact">{{ trans('cruds.contact') }}</a></li>
              @if(Auth::guard('client')->check()) 
                    <li class="dropdown"><a href="#"><span>{{ trans('cruds.welcome') }} {{auth()->guard('client')->user()->name}} </span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                        <li>
                              <a href="{{route('client.profile')}}" class="{{Route::currentRouteName() == 'client.profile' ? 'active' : ''}}">{{ trans('cruds.profile') }}</a>
                        </li>

                        <li>
                          <a href="{{ route('client.logout') }}" class="{{ Route::currentRouteName() == 'client.logout' ? 'active' : '' }}"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             {{ trans('cruds.logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </li>
                      </ul>
                    </li>
                    @else
                    <li>
                          <a href="{{ route('client.login') }}" class="{{ Route::currentRouteName() == 'client.login' ? 'active' : '' }}">{{ trans('cruds.login') }}</a>
                    </li>
                @endif
              @if(app()->getLocale()=="ar") <li><a href="{{ \LaravelLocalization::getLocalizedURL('en') }}">English</a></li> @else <li><a href="{{ \LaravelLocalization::getLocalizedURL('ar') }}">العربية</a></li> @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @if(Auth::guard('client')->check())   <a class="btn-getstarted" href="{{ route('client.add_tender') }}"  style="padding : 8px 13px">{{ trans('cruds.add_tender') }}</a> @else <a class="btn-getstarted" href="{{ route('client.login') }}"  style="padding : 8px 13px" class="{{ Route::currentRouteName() == 'client.login' ? 'active' : '' }}">{{ trans('cruds.add_tender') }}</a> @endif
        @if(Auth::guard('client')->check())   <a class="btn-getstarted" href="{{ route('all_consultants') }}"  style="padding : 8px 13px" class="{{ Route::currentRouteName() == 'all_consultants' ? 'active' : '' }}">{{ trans('cruds.ask_advice') }}</a> @else <a class="btn-getstarted" href="{{ route('client.login') }}"  style="padding : 8px 13px">{{ trans('cruds.ask_advice') }}</a> @endif
    </div>

</header>

<main class="main">

