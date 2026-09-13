@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $policy->title_en, 'page' => 'type'])
<div class="row">
  <div class="col-12">
    <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.$policy')}}</h3>
              </div>
              <form method="post" action="{{ route('$policies.update',$policy->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                  <div class="form-group">
                      <label>{{trans('cruds.title_en')}}</label>
                      <input type="text" class="form-control" name="title_en" value="{{$policy->title_en??''}}">
                      @error('title_en')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group">
                    <label>{{trans('cruds.title_ar')}}</label>
                    <input type="text" class="form-control" name="title_ar" value="{{$policy->title_ar??''}}">
                    @error('title_ar')<div class="text-danger">{{ $message }}</div> @enderror
                </div>


                <div class="form-group">
                  <label >{{trans('cruds.type')}}</label>
                  <select name="type" class="form-control">
                    <option value="" selected >{{trans('cruds.type')}}</option>
                    <option value="1"  {{$policy->type == 1 ?'selected':''}} >{{trans('cruds.frequently_asked_questions')}}</option>
                    <option value="2"  {{$policy->type == 2 ?'selected':''}} >{{trans('cruds.payment_method')}}</optio>
                </select>
                  @error('type')<div class="text-danger">{{ $message }}</div> @enderror
              </div>
              <div class="col-12">
                <label class="col-sm-12 col-form-label">{{trans('cruds.description_en')}}</label>
                <textarea  class="form-control" name="description_en" > {{$policy->description_en}} </textarea>
                @error('description_en')<div class="text-danger">{{ $message }}</div> @enderror
            </div>
              <div class="col-12">
                <label class="col-sm-12 col-form-label">{{trans('cruds.description_ar')}}</label>
                <textarea  class="form-control" name="description_ar" > {{$policy->description_ar}} </textarea>
                @error('description_ar')<div class="text-danger">{{ $message }}</div> @enderror
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

