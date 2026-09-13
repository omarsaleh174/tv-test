@extends('layouts.master')

@section('content')

@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $item->title_en, 'page' => '$model'])

<div class="row">
  <div class="col-12">
    <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.category')}}</h3>
              </div>
              <form method="post" action="{{ route('$model.update',$item->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                  <div class="form-group">
                      <label>{{trans('cruds.title_en')}}</label>
                      <input type="text" class="form-control" name="title_en" value="{{$item->title_en??''}}">
                      @error('title_en')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label>{{trans('cruds.title_ar')}}</label>
                    <input type="text" class="form-control" name="title_ar" value="{{$item->title_ar??''}}">
                    @error('title_ar')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">{{ trans('cruds.photo') }}</label>
                  <div class="col-sm-4">
                      <input type="file" class="form-control" name="photo">
                  </div>
                  @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                  <div class="col-6">
                      <img src="{{$item->photo??''}}"  sizes="150" width="150" height="150">
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

