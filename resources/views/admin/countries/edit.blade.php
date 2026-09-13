@extends('layouts.master')

@section('content')

@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $country->title_en, 'page' => 'countries'])

<div class="row">
  <div class="col-12">
    <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.country')}}</h3>
              </div>
              <form method="post" action="{{ route('countries.update',$country->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                  <div class="form-group">
                      <label>{{trans('cruds.title_en')}}</label>
                      <input type="text" class="form-control" name="title_en" value="{{$country->title_en??''}}">
                      @error('title_en')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label>{{trans('cruds.title_ar')}}</label>
                    <input type="text" class="form-control" name="title_ar" value="{{$country->title_ar??''}}">
                    @error('title_ar')<div class="text-danger">{{ $message }}</div> @enderror
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

