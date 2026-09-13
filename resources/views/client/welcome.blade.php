@extends('client.layout.client')
@section('content')
<style>
  .icon-box {
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.1s ease, box-shadow 0.1s ease;
  }
  
  
  .icon-box:hover {
    transform: scale(1.1);
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
  }
  </style>
  
<style>
  @keyframes moveImage {
      0% {
      transform: translateX(0);}
      25% {transform: translateX(20px);}
      50% {transform: translateX(-20px);}
      75% {transform: translateX(10px);}
      100% {transform: translateX(0);}
  }
    .animated-image {animation: moveImage 4s ease-in-out infinite;  }
    .icon-box:hover { transform: scale(1.1); box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); }
    .animated-box:nth-child(1) {  animation-delay: 0.2s;}
    .animated-box:nth-child(2) {  animation-delay: 0.4s;}
    .animated-box:nth-child(3) {animation-delay: 0.6s;}
    .animated-box:nth-child(4) {  animation-delay: 0.8s;}
    .animated-box:nth-child(5) {  animation-delay: 1s;}
    @keyframes fadeInUp {  0% {  opacity: 0;  transform: translateY(50px);  }  100% {  opacity: 1;  transform: translateY(0);  }  }
</style>
<section id="hero" class="hero section dark-background">
  <img src="{{ getPhotoData('hero_home_page')}}" alt="{{ getSeoValue('site_title') }}" data-aos="fade-in">
  <div class="container">
      <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-xl-6 col-lg-8">
              <h2>{!! getPart('hero_title')!!}</h2>
              <p>{!! getPart('hero_subtitle')!!}</p>
          </div>
          <div class="col-xl-6 col-lg-8">
              <div class="image-container">
                @for ($i = 1; $i <= 6; $i++)
                  @if(getLinkData("banner_link_$i"))
                    <a href="{{getLinkData("banner_link_$i")}}">
                        <img class="animated-image" style="position: relative; width: 100%; height: 240px;" src="{{getPhotoData("banner_home_page_$i")}}" alt="Hero Image">
                    </a>
                  @endif
                @endfor
              </div>
          </div>
      </div>
      <div class="row gy-4 mt-5 justify-content-center">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box rotating-box">
            <i class="bi bi-binoculars"></i>
            <h3><a href="#">{!! getPart('tender_building') !!}</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box rotating-box">
            <i class="bi bi-bullseye"></i>
            <h3><a href="#">{!! getPart('tender_it') !!}</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box rotating-box">
            <i class="bi bi-fullscreen-exit"></i>
            <h3><a href="#">{!! getPart('tender_energy') !!}</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box rotating-box">
            <i class="bi bi-card-list"></i>
            <h3><a href="#">{!! getPart('consulting_financial') !!}</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box rotating-box">
            <i class="bi bi-gem"></i>
            <h3><a href="#">{!! getPart('consulting_legal') !!}</a></h3>
          </div>
        </div>
      </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".image-container .animated-image");
    let currentIndex = 0;

    setInterval(() => {
      // Hide all images
      images.forEach((img, index) => {
        img.style.display = "none";
      });

      // Show the current image
      images[currentIndex].style.display = "block";

      // Move to the next image
      currentIndex = (currentIndex + 1) % images.length;
    }, 2000); // Change image every 3 seconds
  });
</script>


<section id="about" class="about section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="{{ getPhotoData('about_home_page') }}" class="img-fluid" alt="{{ getPart('site_title') }}">
      </div>
      <div class="col-lg-6 order-2 order-lg-1 content">
        <h3>{!! getPart('about_title') !!}</h3>
        <p class="fst-italic">
          {!! getPart('about_subtitle') !!}
        </p>
        <ul>
          <li><i class="bi bi-check2-all"></i> <span>{!! getPart('about_service_1') !!}</span></li>
          <li><i class="bi bi-check2-all"></i> <span>{!! getPart('about_service_2') !!}</span></li>
          <li><i class="bi bi-check2-all"></i> <span>{!! getPart('about_service_3') !!}</span></li>
        </ul>
        <p>
          {!! getPart('about_description') !!}
        </p>
      </div>
    </div>
  </div>
</section>

      <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
          <h2>{{ trans('cruds.tenders') }}</h2>
          <p>{{ trans('cruds.see_latest_tenders') }}</p>
        </div>
        <div class="container">
          <div class="row gy-4">
          @foreach ($tenders as $tender)
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-item position-relative">
                  <div class="icon">
                    <img src="{{$tender->photo}}"  width="60" class="img-fluid rounded-start" alt="{{ $tender->title }}">
                  </div>
                  @if(Auth::guard('client')->check())  
                    <a href="{{route('client.tender.show',$tender->slug??$tender->id )}}" class="stretched-link"><h3>{{$tender->title}}</h3></a>
                  @else
                    <a href="{{route('client.login')}}" class="stretched-link"><h3>{{$tender->title}}</h3></a>
                  @endif
                  <p>
                    {{$tender->country->title??""}} <br>
                    {{$tender->publisher_name??""}} <br>
                    {{$tender->created_at??""}} <br>
                  </p>
                </div>
              </div>
          @endforeach
          </div>
        </div>
        <div class="text-center">
          <br><br>
          <a class="btn  btn-getstarted" href="{{route('client.tenders')}}">{{ trans('cruds.more_info') }}  </a>
        </div>
      </section>
      <section id="testimonials" class="testimonials section dark-background">
        <img src="{{getPhotoData('testimonials_home_page')}}" class="testimonials-bg" alt="{{ getSeoValue('site_title') }}">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                }
              }
            </script>
            <div class="swiper-wrapper">
              @foreach ($consultants->take(6) as $consultant)
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="{{$consultant->photo}}"  class="testimonial-img" alt="{{ getSeoValue('site_title') }}">

                    @if(Auth::guard('client')->check())
                    <h3>  <a  href="{{ route('client.consultants.show',$consultant->slug?? $consultant->id) }}">{!!$consultant->my_name!!}</a></h3>
                @else
                <h3>  <a  href="{{ route('client.login') }}">{!!$consultant->my_name!!}</a></h3>
                @endif

                    

                    <h4>{{$consultant->title}}</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>{{$consultant->small_description}}</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section> 
      @if(count($consultants)>6)
        <section id="team" class="team section">
    
          <div class="container section-title" data-aos="fade-up">
            <h2>{{ trans('cruds.consultants') }}</h2>
            <p>{{ trans('cruds.consultants') }}</p>
          </div>
    
          <div class="container">
            <div class="row gy-4">  
              @foreach ($consultants->skip(6) as $consultant)
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                  <div class="member-img">
                    <img src="{{$consultant->photo}}"  class="img-fluid" alt="{{ getSeoValue('site_title') }}">
                    <div class="social">
                      <p>{{$consultant->small_description}}</p>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4>{{$consultant->my_name}}</h4>
                    <span>{{$consultant->title}}</span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </section>
      @endif
        @if(false)
      <section id="clients" class="clients section">
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
  
          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 2,
                    "spaceBetween": 40
                  },
                  "480": {
                    "slidesPerView": 3,
                    "spaceBetween": 60
                  },
                  "640": {
                    "slidesPerView": 4,
                    "spaceBetween": 80
                  },
                  "992": {
                    "slidesPerView": 6,
                    "spaceBetween": 120
                  }
                }
              }
            </script>
            <div class="swiper-wrapper align-items-center">
              @foreach ($banners as $banner)
                  <div class="swiper-slide">
                    <a href="{{$banner->link?$banner->link:'#'}}">
                      <img src="{{$banner->photo}}" class="img-fluid"   alt="{{$banner->title }}"></div>
                    </a>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
  
        </div>
  
      </section>
      @endif

      <section id="features" class="features section">
        <div class="container">
            <div class="row gy-4">
                <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{getPhotoData('features')}}" alt="{{ getSeoValue('site_title') }}">
                </div>
                <div class="col-lg-6">
                    <!-- ميزة "مناقصات يومية محدثة" -->
                    <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-archive flex-shrink-0"></i>
                        <div>
                            <h4>{!! getPart('feature_daily_tenders_title') !!}</h4>
                            <p>{!! getPart('feature_daily_tenders_description') !!}</p>
                        </div>
                    </div>
    
                    <!-- ميزة "استشارات متخصصة" -->
                    <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-basket flex-shrink-0"></i>
                        <div>
                            <h4>{!! getPart('feature_specialized_consulting_title') !!}</h4>
                            <p>{!! getPart('feature_specialized_consulting_description') !!}</p>
                        </div>
                    </div>
    
                    <!-- ميزة "دعم مستمر" -->
                    <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-broadcast flex-shrink-0"></i>
                        <div>
                            <h4>{!! getPart('feature_continuous_support_title') !!}</h4>
                            <p>{!! getPart('feature_continuous_support_description') !!}</p>
                        </div>
                    </div>
    
                    <!-- ميزة "حلول مخصصة" -->
                    <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-camera-reels flex-shrink-0"></i>
                        <div>
                            <h4>{!! getPart('feature_custom_solutions_title') !!}</h4>
                            <p>{!! getPart('feature_custom_solutions_description') !!}</p>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    
  

  
    <section id="call-to-action" class="call-to-action section dark-background">
      <img src="{{ getPhotoData('cta') }}" alt="{{ getPart('site_title') }}">
      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>{!! getPart('cta_title') !!}</h3>
              <p>{!! getPart('cta_description') !!}</p>
              @if(Auth::guard('client')->check()) 
                <a class="cta-btn" href="{{ route('client.tenders') }}">{!! getPart('cta_button_text_logged_in') !!}</a>
              @else
                <a class="cta-btn" href="{{ route('client.login') }}">{!! getPart('cta_button_text_logged_out') !!}</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>

 
    <section id="articles" class="articles section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center justify-content-between">
          <div class="col-lg-12">
            <h3 class="fw-bold fs-2 mb-3">{{ trans('cruds.latest_articles') }}</h3>
            <div class="row gy-4">
              @foreach($latestArticles as $article)
                <div class="col-lg-4">
                  <div class="article-item">
                    <img src="{{ asset($article->photo) }}" alt="{{ $article->title_en }}" class="img-fluid">
                    <h4 class="mt-3">{{ $article->title_en }}</h4>
                    <p>{{ Str::limit($article->desc_en, 100) }}</p>
                    @if($article->slug)
                      <a href="{{ route('client.one_article', $article->slug) }}" class="btn btn-primary">{{ trans('cruds.read_more') }}</a>
                    @else
                      <a href="{{ route('client.one_article', $article->id) }}" class="btn btn-primary">{{ trans('cruds.read_more') }}</a>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
            <div class="text-center mt-4">
              <a href="{{ route('client.all_articles') }}" class="btn btn-outline-primary">{{ trans('cruds.view_all_articles') }}</a>
            </div>
          </div>
        </div>
      </div>
    </section>
          
      @if(count($subscriptions)>0)
          <style>
                .pricing { padding: 60px 0 120px 0; } .pricing .section-title { margin-bottom: 40px; } .pricing .pricing-item { background-color: var(--surface-color); box-shadow: 0 3px 20px -2px rgba(0, 0, 0, 0.1); padding: 60px 40px; height: 100%; position: relative; border-radius: 15px; } .pricing h3 { font-weight: 600; margin-bottom: 15px; font-size: 20px; text-align: center; } .pricing .icon { margin: 30px auto 20px auto; width: 70px; height: 70px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: 0.3s; transform-style: preserve-3d; } .pricing .icon i { color: var(--background-color); font-size: 28px; transition: ease-in-out 0.3s; line-height: 0; } .pricing .icon::before { position: absolute; content: ""; height: 86px; width: 86px; border-radius: 50%; background: color-mix(in srgb, var(--accent-color), transparent 80%); transition: all 0.3s ease-out 0s; transform: translateZ(-1px); } .pricing .icon::after { position: absolute; content: ""; height: 102px; width: 102px; border-radius: 50%; background: color-mix(in srgb, var(--accent-color), transparent 90%); transition: all 0.3s ease-out 0s; transform: translateZ(-2px); } .pricing h4 { font-size: 48px; color: var(--accent-color); font-weight: 700; font-family: var(--heading-font); margin-bottom: 25px; text-align: center; } .pricing h4 sup { font-size: 28px; } .pricing h4 span { color: color-mix(in srgb, var(--default-color), transparent 50%); font-size: 18px; font-weight: 400; } .pricing ul { padding: 20px 0; list-style: none; color: color-mix(in srgb, var(--default-color), transparent 20%); text-align: left; line-height: 20px; } .pricing ul li { padding: 10px 0; display: flex; align-items: center; } .pricing ul i { color: #059652; font-size: 24px; padding-right: 3px; } .pricing ul .na { color: color-mix(in srgb, var(--default-color), transparent 70%); } .pricing ul .na i { color: color-mix(in srgb, var(--default-color), transparent 70%); } .pricing ul .na span { text-decoration: line-through; } .pricing .buy-btn { color: color-mix(in srgb, var(--default-color), transparent 20%); display: inline-block; padding: 8px 40px 10px 40px; border-radius: 50px; border: 1px solid color-mix(in srgb, var(--default-color), transparent 80%); transition: none; font-size: 16px; font-weight: 600; font-family: var(--heading-font); transition: 0.3s; } .pricing .buy-btn:hover { background-color: var(--accent-color); color: var(--contrast-color); } .pricing .featured { z-index: 10; border: 3px solid var(--accent-color); } @media (min-width: 992px) { .pricing .featured { transform: scale(1.15); } } 
          </style>
          <section id="pricing" class="pricing section">
            <div class="container section-title" data-aos="fade-up">
              <h2>{{ trans('cruds.subscriptions') }}</h2>
              <p>{!! getPart('subscription_text') !!}</p>
            </div>
            <div class="container" data-aos="zoom-in" data-aos-delay="100">
              <div class="row g-4">
                  @foreach ($subscriptions as $subscription)
                  <div class="col-lg-4">
                  <div class="pricing-item">
                    <h3>{{ $subscription->title }}</h3>
                    <div class="icon">
                      <i class="bi bi-send"></i>
                    </div>
                    <h4><sup> ريال </sup>{{ $subscription->real_price }}<span> / {{ $subscription->type_amount }}</span></h4>
                    <ul>
                      @foreach(explode("\n", $subscription->description) as $line)
                      @if($line)
                      <li><i class="bi bi-check"></i> <span>{{ trim($line) }}</span></li>
                      @endif
                      @endforeach
                    </ul>
                    @if(Auth::guard('client')->check())  
                    <div class="text-center"><a href="{{ route('client.subscripe',$subscription->id) }}" class="buy-btn">{{ trans('cruds.buy_now') }}</a></div>              
                    @else
                    <div class="text-center"><a href="{{ route('client.login') }}" class="buy-btn">{{ trans('cruds.buy_now') }}</a></div>
                    @endif
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </section>
      @endif
      
      <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
          <h2>{{ trans('cruds.contact') }}</h2>
          <p>{{ trans('cruds.contact') }}</p>
        </div>
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
  
          <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
            @php
                $latitude = getSettingValue('latitude');
                $longitude =getSettingValue('longitude') ;
                $googleMapsUrl = "https://www.google.com/maps?q={$latitude},{$longitude}&hl=ar&z=15&output=embed";
            @endphp
        
            <iframe 
                style="border:0; width: 100%; height: 270px;" 
                src="{{ $googleMapsUrl }}" 
                frameborder="0" 
                allowfullscreen="" 
                 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        
          
          <div class="row gy-4">
  
            <div class="col-lg-4">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>{{ trans('cruds.address') }}</h3>
                  <p>{{getSeoValue("footer_address")}}</p>
                </div>
              </div>
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>{{ trans('cruds.call_us') }}</h3>
                  <p>{{getSeoValue("footer_phone")}}</p>
                </div>
              </div>
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>{{ trans('cruds.email_us') }}</h3>
                  <p>{{getSeoValue("footer_email")}}</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-8">
              <form action="{{ route('client.store-contact') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200" id="contactForm">
                @csrf
                <div class="row gy-4">
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Your Name" required="">
                        <div class="text-danger" id="error-name"></div>
                    </div>
            
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email" required="">
                        <div class="text-danger" id="error-email"></div>
                    </div>
            
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') }}" placeholder="Subject" required="">
                        <div class="text-danger" id="error-subject"></div>
                    </div>
            
                    <div class="col-md-12">
                        <textarea class="form-control" name="message" id="message" rows="6" placeholder="Message" required="">{{ old('message') }}</textarea>
                        <div class="text-danger" id="error-message"></div>
                    </div>
            
                    <div class="col-md-12 text-center">
                        <div class="loading" id="loading" style="display:none;">Loading</div>
                        <div class="error-message" id="error-message-general"></div>
                        <div class="sent-message" style="display:none;" id="success-message">Your message has been sent. Thank you!</div>
                        <button type="submit" class="btn btn-warning">Send Message</button>
                    </div>
                </div>
            </form>
            
            </div>
          </div>
        </div>
      </section>
@section('js')
<script>
    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Clear previous error messages
        clearErrors();

        // Show loading indicator
        document.getElementById('loading').style.display = 'block';
        document.getElementById('success-message').style.display = 'none';
        document.getElementById('error-message-general').style.display = 'none';

        // Get form data as JSON
        let formData = {
            name: document.querySelector('[name="name"]').value,
            email: document.querySelector('[name="email"]').value,
            subject: document.querySelector('[name="subject"]').value,
            message: document.querySelector('[name="message"]').value
        };

        // Send AJAX request using fetch
        fetch('{{ route('client.store-contact') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',  // Send the data as JSON
                'Accept': 'application/json',        // Expect JSON response
                'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Include CSRF token for Laravel security
            },
            body: JSON.stringify(formData)  // Convert form data to JSON string
        })
        .then(response => response.json())
        .then(data => {
            // Hide loading indicator
            document.getElementById('loading').style.display = 'none';

            if (data.errors) {
                // Display error messages under each input
                displayErrors(data.errors);
            } else {
                // Show success message
                document.getElementById('success-message').style.display = 'block';
            }
        })
        .catch(error => {
            // Hide loading indicator and show error message
            document.getElementById('loading').style.display = 'none';
            document.getElementById('error-message-general').style.display = 'block';
            document.getElementById('error-message-general').textContent = 'An error occurred. Please try again later.';
        });
    });

    function displayErrors(errors) {
        if (errors.name) {
            document.getElementById('error-name').textContent = errors.name[0];
        }
        if (errors.email) {
            document.getElementById('error-email').textContent = errors.email[0];
        }
        if (errors.subject) {
            document.getElementById('error-subject').textContent = errors.subject[0];
        }
        if (errors.message) {
            document.getElementById('error-message').textContent = errors.message[0];
        }
    }

    function clearErrors() {
        document.getElementById('error-name').textContent = '';
        document.getElementById('error-email').textContent = '';
        document.getElementById('error-subject').textContent = '';
        document.getElementById('error-message').textContent = '';
        document.getElementById('error-message-general').textContent = '';
    }
</script>
@endsection
@endsection
