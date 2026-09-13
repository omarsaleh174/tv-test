@extends('layouts.master')
@section('content')
<div class="page-header">
  <h1 class="page-title">{{ trans('cruds.photos') }}</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ trans("cruds.photos" ) }}</li>
</ol>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="{{route('photos.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">

              @foreach (['about_home_page','hero_home_page','testimonials_home_page','features','stats','cta'] as $key)
          <div class="card-body   col-6">
                <div class="form-group">
                  <label >{{$key}}</label>
                  @if(str_contains($key, 'banner_link_'))
                  <input type="text"  class="form-control" name="{{$key}}" >
                  @else
                  <input type="file"  class="form-control" name="{{$key}}">
                  @endif
                  @error('logo')<div class="text-danger">{{ $message }}</div> @enderror
                  <br><br>
                  <img src="{{getPhotoData($key)}}" width="100" height="100">
                </div>
            </div>
            @endforeach
          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">{{ trans('cruds.add') }}</button>                  
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
