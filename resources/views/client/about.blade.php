@extends('client.layout.client')
@section('content')
<br><br><br><br>
<section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="{{getPhotoData('about_home_page')}}" class="img-fluid" alt="{{ getSeoValue('site_title') }}">
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>{!! getPart('about_section_title') !!}</h3>
                <p class="fst-italic">
                    {!! getPart('about_section_description') !!}
                </p>
                <ul>
                    @foreach(['updated_tenders', 'specialized_consulting', 'customer_support'] as $service_key)
                        <li>
                            <i class="bi bi-check2-all"></i>
                            <span>{!! getPart("about_{$service_key}_title") !!}</span>
                        </li>
                    @endforeach
                </ul>
                <p>
                    {!! getPart('about_section_description') !!}
                </p>
            </div>
        </div>
    </div>
</section>

<section id="services" class="services section">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ trans('cruds.about') }}</h2>
        {!! getPart('about_section_description') !!}
    </div>
    <div class="container">
        <div class="row gy-4">
            @foreach(['general_tenders', 'legal_consulting', 'financial_consulting', 'administrative_consulting', 'project_management', 'customer_support'] as $service_key)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($loop->index + 1) }}">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-{{ $loop->index % 6 == 0 ? 'activity' : ($loop->index % 6 == 1 ? 'broadcast' : ($loop->index % 6 == 2 ? 'easel' : ($loop->index % 6 == 3 ? 'bounding-box-circles' : ($loop->index % 6 == 4 ? 'calendar4-week' : 'chat-square-text')))) }}"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>{!! getPart("service_{$service_key}_title") !!}</h3>
                        </a>
                        <p>{!! getPart("service_{$service_key}_description") !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
