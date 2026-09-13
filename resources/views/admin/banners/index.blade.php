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
        <form action="{{route('photos.banner_store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
              @foreach (["banner_home_page_1","banner_link_1","banner_home_page_2","banner_link_2","banner_home_page_3","banner_link_3","banner_home_page_4","banner_link_4","banner_home_page_5","banner_link_5","banner_home_page_6","banner_link_6"] as $value)
            <div class="card-body col-6">
                <div class="form-group">
                  <label >{{$value}}</label>
                  @if(str_contains($value, 'banner_link_'))
                  <input type="text"  class="form-control" name="{{$value}}" value="{{$photos[$value]}}">
                  @else
                  <input type="file"  class="form-control" name="{{$value}}">
                  @endif
                  @error('logo')<div class="text-danger">{{ $message }}</div> @enderror
                  @if(!str_contains($value, 'banner_link_'))
                  <br><br>
                  <img src="{{getPhotoData($value)}}" width="100" height="100">
                  @endif
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
