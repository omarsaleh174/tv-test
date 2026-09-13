@extends('layouts.master')

@section('content')

@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $banner->title, 'page' => 'banners'])

<div class="row">
  <div class="col-12">
    <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.banner')}}</h3>
              </div>
              <form method="post" action="{{ route('banners.update',$banner->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                  <div class="form-group">
                      <label>{{trans('cruds.title')}}</label>
                      <input type="text" class="form-control" name="title" value="{{$banner->title??''}}">
                      @error('title')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label>{{trans('cruds.link')}}</label>
                    <input type="text" class="form-control" name="link" value="{{$banner->link??''}}">
                    @error('link')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">{{ trans('cruds.photo') }}</label>
                  <div class="col-sm-4">
                      <input type="file" class="form-control" name="photo">
                  </div>
                  @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                  <div class="col-6">
                      <img src="{{$banner->photo??''}}"  sizes="150" width="150" height="150">
                  </div>
              </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('cruds.submit')}}</button>
              </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection

