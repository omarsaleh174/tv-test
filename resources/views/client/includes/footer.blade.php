</main>

<footer id="footer" class="footer dark-background">

  <div class="footer-top">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6 footer-about">

          <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">

            <span class="sitename">{{ trans('cruds.home') }}</span>

          </a>

          <div class="footer-contact pt-3">

            <p>{{ getSeoValue('footer_address') }}</p>

            <p>{{ getSeoValue('footer_city') }}</p>

            <p class="mt-3"><strong>{{ trans('cruds.phone') }} :</strong> <span>{{ getSeoValue('footer_phone') }}</span></p>

            <p><strong>{{ trans('cruds.email') }} :</strong> <span>{{ getSeoValue('footer_email') }}</span></p>

          </div>

          <div class="social-links d-flex mt-4">

            @if(getSeoValue('social_media_facebook'))
              <a href="{{ getSeoValue('social_media_facebook') }}"><i class="bi bi-facebook"></i></a>
            @endif

            @if(getSeoValue('social_media_twitter'))
              <a href="{{ getSeoValue('social_media_twitter') }}"><i class="bi bi-twitter-x"></i></a>
            @endif

            @if(getSeoValue('social_media_instagram'))
              <a href="{{ getSeoValue('social_media_instagram') }}"><i class="bi bi-instagram"></i></a>
            @endif

            @if(getSeoValue('social_media_linkedin'))
              <a href="{{ getSeoValue('social_media_linkedin') }}"><i class="bi bi-linkedin"></i></a>
            @endif

          </div>

        </div>

        <div class="col-lg-2 col-md-3 footer-links">

          <h4>{{ trans('cruds.links') }}</h4>

          <ul>

            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('welcome') }}">{{ trans('cruds.home') }}</a></li>

            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">{{ trans('cruds.about') }}</a></li>

            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('all_consultants') }}">{{ trans('cruds.consultants') }}</a></li>

            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('client.tenders') }}">{{ trans('cruds.tenders') }}</a></li>

            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('privacy.policy') }}">{{ trans('cruds.btn_privacy_policy') }}</a></li>

            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('client.all_articles') }}">{{ trans('cruds.articles') }}</a></li>

          </ul>

        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">

          <h4>{{ app()->getLocale() == 'ar' ? 'من نحن' : 'About Us' }}</h4>

          <p>
            {{ app()->getLocale() == 'ar'
                ? 'نحن نوفر لك أحدث بيانات المناقصات اليومية مع تفاصيل دقيقة في جميع المجالات، بالإضافة إلى استشارات من خبراء متخصصين في مختلف الصناعات.'
                : 'We provide you with the latest daily tender data with accurate details across different sectors, in addition to consultations from specialized experts in various industries.'
            }}
          </p>

          <a href="https://maroof.sa/277943" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('link.png') }}" alt="maroof" width="100" height="100">
          </a>

        </div>

      </div>

    </div>

  </div>

  <div class="copyright">

    <div class="container text-center">

      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ getSeoValue('footer_copyright') }}</strong> <span>All Rights Reserved</span></p>

      <div class="credits">
        Designed by <a href="#">{{ getSettingValue('name') }}</a>
      </div>

    </div>

  </div>

</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('home/assets/vendor/php-email-form/validate.js') }}"></script>
{{-- <script src="{{ asset('home/assets/vendor/aos/aos.js') }}"></script> --}}
<script src="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('home/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('home/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('home/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('home/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('home/assets/js/main.js') }}"></script>
<script src="{{ asset('client/js/jquery.min.js') }}"></script>
<script src="{{ asset('client/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('client/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.stellar.min.js') }}"></script>

<script>
  window.setTimeout(function() {
      $(".alert").fadeTo(5000, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 2000);
</script>

@yield('js')

</body>
</html>
