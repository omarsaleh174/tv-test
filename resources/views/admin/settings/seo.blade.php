@extends('layouts.master')
@section('content')
<div class="page-header">
  <h1 class="page-title">{{ trans('cruds.setting') }}</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ trans("cruds.seo") }}</li>
  </ol>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="col-sm-12">
          @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div class="text-danger ">{{$error}}</div>
              @endforeach
          @endif
      </div>
        <form action="{{ route('seo.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <!-- Site Information -->
            <div class="form-group">
              <label>{{ trans('cruds.site_title') }}</label>
              <input type="text" required class="form-control" name="site_title" value="{{ $seo['site_title'] ?? '' }}" placeholder="{{ trans('cruds.site_title') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.site_description') }}</label>
              <textarea required class="form-control" name="site_description" placeholder="{{ trans('cruds.site_description') }}">{{ $seo['site_description'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.site_keywords') }}</label>
              <input type="text" required class="form-control" name="site_keywords" value="{{ implode(',', $seo['site_keywords'] ?? []) }}" placeholder="{{ trans('cruds.site_keywords') }}">
            </div>

            <!-- Home Page SEO -->
            <div class="form-group">
              <label>{{ trans('cruds.home_page_title') }}</label>
              <input type="text" required class="form-control" name="home_page_title" value="{{ $seo['home_page_title'] ?? '' }}" placeholder="{{ trans('cruds.home_page_title') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.home_page_description') }}</label>
              <textarea required class="form-control" name="home_page_description" placeholder="{{ trans('cruds.home_page_description') }}">{{ $seo['home_page_description'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.home_page_keywords') }}</label>
              <input type="text" required class="form-control" name="home_page_keywords" value="{{ implode(',', $seo['home_page_keywords'] ?? []) }}" placeholder="{{ trans('cruds.home_page_keywords') }}">
            </div>

            <!-- Tender Page SEO -->
            <div class="form-group">
              <label>{{ trans('cruds.tender_page_title') }}</label>
              <input type="text" required class="form-control" name="tender_page_title" value="{{ $seo['tender_page_title'] ?? '' }}" placeholder="{{ trans('cruds.tender_page_title') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.tender_page_description') }}</label>
              <textarea required class="form-control" name="tender_page_description" placeholder="{{ trans('cruds.tender_page_description') }}">{{ $seo['tender_page_description'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.tender_page_keywords') }}</label>
              <input type="text" required class="form-control" name="tender_page_keywords" value="{{ implode(',', $seo['tender_page_keywords'] ?? []) }}" placeholder="{{ trans('cruds.tender_page_keywords') }}">
            </div>

            <!-- Consultant Page SEO -->
            <div class="form-group">
              <label>{{ trans('cruds.consultant_page_title') }}</label>
              <input type="text" required class="form-control" name="consultant_page_title" value="{{ $seo['consultant_page_title'] ?? '' }}" placeholder="{{ trans('cruds.consultant_page_title') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.consultant_page_description') }}</label>
              <textarea required class="form-control" name="consultant_page_description" placeholder="{{ trans('cruds.consultant_page_description') }}">{{ $seo['consultant_page_description'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.consultant_page_keywords') }}</label>
              <input type="text" required class="form-control" name="consultant_page_keywords" value="{{ implode(',', $seo['consultant_page_keywords'] ?? []) }}" placeholder="{{ trans('cruds.consultant_page_keywords') }}">
            </div>

            <!-- Contact Page SEO -->
            <div class="form-group">
              <label>{{ trans('cruds.contact_page_title') }}</label>
              <input type="text" required class="form-control" name="contact_page_title" value="{{ $seo['contact_page_title'] ?? '' }}" placeholder="{{ trans('cruds.contact_page_title') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.contact_page_description') }}</label>
              <textarea required class="form-control" name="contact_page_description" placeholder="{{ trans('cruds.contact_page_description') }}">{{ $seo['contact_page_description'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.contact_page_keywords') }}</label>
              <input type="text" required class="form-control" name="contact_page_keywords" value="{{ implode(',', $seo['contact_page_keywords'] ?? []) }}" placeholder="{{ trans('cruds.contact_page_keywords') }}">
            </div>

            <!-- Footer Information -->
            <div class="form-group">
              <label>{{ trans('cruds.footer_copyright') }}</label>
              <input type="text" required class="form-control" name="footer_copyright" value="{{ $seo['footer_copyright'] ?? '' }}" placeholder="{{ trans('cruds.footer_copyright') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.footer_privacy_policy') }}</label>
              <input type="text" required class="form-control" name="footer_privacy_policy" value="{{ $seo['footer_privacy_policy'] ?? '' }}" placeholder="{{ trans('cruds.footer_privacy_policy') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.footer_terms_of_service') }}</label>
              <input type="text" required class="form-control" name="footer_terms_of_service" value="{{ $seo['footer_terms_of_service'] ?? '' }}" placeholder="{{ trans('cruds.footer_terms_of_service') }}">
            </div>

            <!-- Social Media -->
            <div class="form-group">
              <label>{{ trans('cruds.facebook') }}</label>
              <input type="url" class="form-control" name="social_media_facebook" value="{{ $seo['social_media_facebook'] ?? '' }}" placeholder="{{ trans('cruds.facebook') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.twitter') }}</label>
              <input type="url" class="form-control" name="social_media_twitter" value="{{ $seo['social_media_twitter'] ?? '' }}" placeholder="{{ trans('cruds.twitter') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.linkedin') }}</label>
              <input type="url" class="form-control" name="social_media_linkedin" value="{{ $seo['social_media_linkedin'] ?? '' }}" placeholder="{{ trans('cruds.linkedin') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.instagram') }}</label>
              <input type="url" class="form-control" name="social_media_instagram" value="{{ $seo['social_media_instagram'] ?? '' }}" placeholder="{{ trans('cruds.instagram') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.address') }}</label>
              <input type="text" class="form-control" name="footer_address" value="{{ $seo['footer_address'] ?? '' }}" placeholder="{{ trans('cruds.address') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.city') }}</label>
              <input type="text" class="form-control" name="footer_city" value="{{ $seo['footer_city'] ?? '' }}" placeholder="{{ trans('cruds.city') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.phone') }}</label>
              <input type="text" class="form-control" name="footer_phone" value="{{ $seo['footer_phone'] ?? '' }}" placeholder="{{ trans('cruds.phone') }}">
            </div>
            <div class="form-group">
              <label>{{ trans('cruds.email') }}</label>
              <input type="text" class="form-control" name="footer_email" value="{{ $seo['footer_email'] ?? '' }}" placeholder="{{ trans('cruds.email') }}">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ trans('cruds.close') }}</button>
            <button type="submit" class="btn btn-primary">{{ trans('cruds.save') }}</button>                  
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

