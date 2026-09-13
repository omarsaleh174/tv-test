@extends('client.layout.client')
@section('content')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image:url({{ asset('client/images/bg_1.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-7 ftco-animate">
                        <span class="subheading">نحن أفضل موقع استشارات</span>
                        <h1 class="mb-4">أهلاً بك خبرتنا تضمن لك النجاح</h1>
                        <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">{{ trans('cruds.our_services') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image:url({{ asset('client/images/bg_2.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-start"
                    data-scrollax-parent="true">
                    <div class="col-md-7 ftco-animate">
                        <span class="subheading">مناقصات اليوم، فرص الغد</span>
                        <h1 class="mb-4"> ! فرصك في المناقصات تبدأ هنا</h1>
                        <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">{{ trans('cruds.our_services') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">نقدم لك افضل المسشارين </h2>
                    <p>موقعنا يقدم لك أحدث المعلومات عن أبرز وأهم المستشارين في مختلف المجالات، ليكون دليلك الأمثل لاختيار
                        الأفضل..</p>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        @foreach ($consultants as $consultant)
                            <div class="item">
                                <div class="testimony-wrap d-flex">
                                    <div class="user-img" style="background-image: url({{ $consultant->photo }})">
                                    </div>
                                    <div class="text pl-4">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                        <p>{{ $consultant->small_description }}</p>
                                        <p class="name">{{ $consultant->name }}</p>
                                        <span class="position">{{ $consultant->title }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pricing" class="pricing section  ftco-section bg-light">
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <p>Plans</p>
            <h2>Pricing Table</h2>
        </div>
        <div class="container" style=" background-color: #e9e9e9; ">
            <div class="row gy-4">
				@foreach ($subscriptions as $subscription)
					<div class="col-lg-3 col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300" style=" background-color: white; margin: 20px; " col-lg-4="" col-md-5="" aos-init="">
						<div class="pricing-item">
							<h3>{{ $subscription->real_price }}</h3>
							<h3>{{ $subscription->title }}</h3>
							<h4><sup>$</sup>{{ $subscription->title }}<span> / {{ $subscription->type_amount }}</span></h4>
							<h1>
								{{ $subscription->duration }} <br>
								{{ $subscription->subscription_type }} <br>
								{{ $subscription->description }}
							</h1>
							<div class="btn-wrap">
								<a href="#" class="btn-buy">Buy Now</a>
							</div>
						</div>
					</div>
				@endforeach
            </div>

        </div>

    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-5 order-md-last wrap-about align-items-stretch">
                    <div class="wrap-about-border ftco-animate">
                        <div class="img" style="background-image: url({{ asset('client/images/about.jpg') }}); border">
                        </div>
                        <div class="text">
                            <h3>Read Our Success Story for Inspiration</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the
                                Semantics, a large language ocean.</p>
                            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                                would have been rewritten a thousand times and everything that was left from its origin
                                would be the word.</p>
                            <p><a href="#" class="btn btn-primary py-3 px-4">Contact us</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 wrap-about pr-md-4 ftco-animate">
                    <h2 class="mb-4">Our Main Features</h2>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would
                        have been rewritten a thousand times and everything that was left from its origin would be the word.
                    </p>
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="services active text-center">
                                <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-collaboration"></span></div>
                                <div class="text media-body">
                                    <h3>Organization</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                            <div class="services text-center">
                                <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-analysis"></span></div>
                                <div class="text media-body">
                                    <h3>Risk Analysis</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services text-center">
                                <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-search-engine"></span></div>
                                <div class="text media-body">
                                    <h3>Marketing Strategy</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                            <div class="services text-center">
                                <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-handshake"></span></div>
                                <div class="text media-body">
                                    <h3>Capital Market</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro ftco-no-pb img" style="background-image: url({{ asset('client/images/bg_3.jpg') }});">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-10 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-0">You Always Get the Best Guidance</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter" id="section-counter">
        <div class="container">
            <div class="row d-md-flex align-items-center justify-content-center">
                <div class="wrapper">
                    <div class="row d-md-flex align-items-center">
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="705">0</strong>
                                    <span>Projects Completed</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="809">0</strong>
                                    <span>Satisfied Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="335">0</strong>
                                    <span>Awwards Received</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="35">0</strong>
                                    <span>Years of Experienced</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Our Best Services</h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-4 d-flex">
                    <div class="services-2 noborder-left text-center ftco-animate">
                        <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                class="flaticon-analysis"></span></div>
                        <div class="text media-body">
                            <h3>Business Analysis</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="services-2 text-center ftco-animate">
                        <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                class="flaticon-business"></span></div>
                        <div class="text media-body">
                            <h3>Business Consulting</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="services-2 text-center ftco-animate">
                        <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                class="flaticon-insurance"></span></div>
                        <div class="text media-body">
                            <h3>Business Insurance</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="services-2 noborder-left noborder-bottom text-center ftco-animate">
                        <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                class="flaticon-money"></span></div>
                        <div class="text media-body">
                            <h3>Global Investigation</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="services-2 text-center noborder-bottom ftco-animate">
                        <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                class="flaticon-rating"></span></div>
                        <div class="text media-body">
                            <h3>Audit &amp; Evaluation</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="services-2 text-center noborder-bottom ftco-animate">
                        <div class="icon mt-2 d-flex justify-content-center align-items-center"><span
                                class="flaticon-search-engine"></span></div>
                        <div class="text media-body">
                            <h3>Marketing Strategy</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro ftco-no-pb img" style="background-image: url({{ asset('client/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div
                    class="col-lg-9 col-md-8 d-flex align-items-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-3 mb-md-0">You Always Get the Best Guidance</h2>
                </div>
                <div class="col-lg-3 col-md-4 ftco-animate">
                    <p class="mb-0"><a href="#" class="btn btn-white py-3 px-4">Request Quote</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Our Recent Projects</h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</p>
                    <p></p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-3">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image: url({{ asset('client/images/project-2.jpg') }});">
                        <div class="overlay"></div>
                        <a href="#" class="btn-site d-flex align-items-center justify-content-center"><span
                                class="icon-subdirectory_arrow_right"></span></a>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image: url({{ asset('client/images/project-1.jpg') }});">
                        <div class="overlay"></div>
                        <a href="#" class="btn-site d-flex align-items-center justify-content-center"><span
                                class="icon-subdirectory_arrow_right"></span></a>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image: url({{ asset('client/images/project-3.jpg') }});">
                        <div class="overlay"></div>
                        <a href="#" class="btn-site d-flex align-items-center justify-content-center"><span
                                class="icon-subdirectory_arrow_right"></span></a>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image: url({{ asset('client/images/project-4.jpg') }});">
                        <div class="overlay"></div>
                        <a href="#" class="btn-site d-flex align-items-center justify-content-center"><span
                                class="icon-subdirectory_arrow_right"></span></a>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image: url({{ asset('client/images/project-5.jpg') }});">
                        <div class="overlay"></div>
                        <a href="#" class="btn-site d-flex align-items-center justify-content-center"><span
                                class="icon-subdirectory_arrow_right"></span></a>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image: url({{ asset('client/images/project-6.jpg') }});">
                        <div class="overlay"></div>
                        <a href="#" class="btn-site d-flex align-items-center justify-content-center"><span
                                class="icon-subdirectory_arrow_right"></span></a>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image: url({{ asset('client/images/project-7.jpg') }});">
                        <div class="overlay"></div>
                        <a href="#" class="btn-site d-flex align-items-center justify-content-center"><span
                                class="icon-subdirectory_arrow_right"></span></a>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                        style="background-image: url({{ asset('client/images/project-8.jpg') }});">
                        <div class="overlay"></div>
                        <a href="#" class="btn-site d-flex align-items-center justify-content-center"><span
                                class="icon-subdirectory_arrow_right"></span></a>
                        <div class="text text-center p-4">
                            <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb"
        style="background-image: url({{ asset('client/images/bg_5.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 py-5 px-md-5">
                    <div class="py-md-5">
                        <div class="heading-section heading-section-white ftco-animate mb-5">
                            <h2 class="mb-4">Request A Quote</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                        <form action="#" class="appointment-form ftco-animate">
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select Guidance</option>
                                                <option value="">Finance</option>
                                                <option value="">Business</option>
                                                <option value="">Auto Loan</option>
                                                <option value="">Real Estate</option>
                                                <option value="">Other Services</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="submit" value="Request A Quote" class="btn btn-white py-3 px-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Recent</span> Blog</h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20 d-flex align-items-end"
                            style="background-image: url('{{ asset('client/images/image_1.jpg') }}');">
                            <div class="meta-date text-center p-2">
                                <span class="day">26</span>
                                <span class="mos">June</span>
                                <span class="yr">2019</span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a>
                            </h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                            <div class="d-flex align-items-center mt-4">
                                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                            class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20 d-flex align-items-end"
                            style="background-image: url('{{ asset('client/images/image_2.jpg') }}');">
                            <div class="meta-date text-center p-2">
                                <span class="day">26</span>
                                <span class="mos">June</span>
                                <span class="yr">2019</span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a>
                            </h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                            <div class="d-flex align-items-center mt-4">
                                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                            class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20 d-flex align-items-end"
                            style="background-image: url('{{ asset('client/images/image_3.jpg') }}');">
                            <div class="meta-date text-center p-2">
                                <span class="day">26</span>
                                <span class="mos">June</span>
                                <span class="yr">2019</span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="#">Finance And Legal Working Streams Occur Throughout</a>
                            </h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                            <div class="d-flex align-items-center mt-4">
                                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                            class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Our Clients Says</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url({{asset('client/images/person_1.jpg')}})">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Racky Henderson</p>
                    <span class="position">Father</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url({{asset('client/images/person_2.jpg')}})">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Henry Dee</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url({{asset('client/images/person_3.jpg')}})">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mark Huff</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url({{asset('client/images/person_4.jpg')}})">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Rodel Golez</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url({{asset('client/images/person_1.jpg')}})">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Ken Bosh</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    {{-- <style> .tender_card { background-color: #fff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); width: calc(33.333% - 20px); padding: 20px; transition: transform 0.2s, box-shadow 0.2s; } .tender_card:hover { transform: translateY(-10px); box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15); } .tender_card-header { font-size: 1.25rem; font-weight: bold; color: #0056b3; } .tender_card-body { margin-top: 10px; } .tender_card-body .tender_badge { margin-bottom: 10px; } .tender_card-footer { margin-top: 15px; text-align: center; } .tender_btn-custom { background-color: #007bff; color: white; border-radius: 5px; border: none; padding: 10px 20px; font-size: 1rem; } .tender_btn-custom:hover { background-color: #0056b3; } .tender_card-footer .tender_date-info { font-size: 0.9rem; color: #555; } @media (max-width: 768px) { .tender_card { width: calc(50% - 20px); } } @media (max-width: 576px) { .tender_card { width: 100%; } } </style>
	<div class="container" style=" align-items: center;">
		<h1 class="main-title">بيانات المناقصات</h1>
		<div class="tender_card-container  card-container row ">
		@foreach ($tenders as $tender)
			<div class="tender_card  card  col  col-4">
				<div class="tender_card-header  card-header">{{$tender->title}}</div>
				<div class="tender_card-body  card-body">
					<p><strong>النوع:</strong> عامة</p>
					<p><strong>القسم:</strong> البنية التحتية</p>
					<p><strong>البلد:</strong> {{$tender->country->title??""}}</p>
					<div class="date-info">
						<span class="tender_badge  badge  bg-warning">{{$tender->closing_date}}</span>
						<span class="tender_badge  badge  bg-danger ms-2">{{$tender->opening_date}}</span>
					</div>
				</div>
				<div class="tender_card-footer  card-footer">
					<button class="btn tender_btn-custom  btn-custom" >قراءة المزيد</button>
				</div>
			</div>
		@endforeach
		
		</div>
		</div>
    <style> .timeline { position: relative; padding: 2rem 0; } .timeline::before { content: ""; position: absolute; top: 0; bottom: 0; width: 2px; background: #ddd; right: 50%; transform: translateX(50%); } .timeline-item { position: relative; padding: 1rem; margin: 2rem 0; background: #fff; border: 1px solid #ddd; border-radius: 8px; width: 45%; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); } .timeline-item:nth-child(odd) { margin-right: auto; } .timeline-item:nth-child(even) { margin-left: auto; } .timeline-item .date { font-size: 1.2rem; font-weight: bold; color: #555; } .timeline-item .details { margin-top: 0.5rem; color: #777; } .timeline-item .btn { margin-top: 1rem; }</style>
    <div class="container" style=" align-items: center;">
        <h2 class="text-center my-4">جدول المناقصات</h2>
        <div class="timeline">
			@foreach ($tenders as $item)
				<div class="timeline-item">
					<div class="timeline-dot"></div>
					<div class="date">{{$tender->closing_date}}</div>
					<div class="details">{{$tender->title}}</div>
					<a href="#" class="btn btn-warning btn-sm">التفاصيل..</a>
				</div>
			@endforeach
		</div>
    </div> --}}
@endsection
