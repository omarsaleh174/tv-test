@extends('layouts.master')

@section('content')

@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $subscription->title, 'page' => 'subscriptions'])

<div class="row">
  <div class="col-12">
    <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.subscription')}}</h3>
              </div>
              <form method="post" action="{{ route('subscriptions.update',$subscription->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">{{ trans('cruds.title') }}</label>
                      <input type="text" required class="form-control" name="title" id="title"  value="{{$subscription->title }}">
                      @error('title')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
      
                  <div class="form-group">
                      <label for="description">{{ trans('cruds.description') }}</label>
                      <textarea required class="form-control" name="description" id="description" >{{$subscription->description }}</textarea>
                      @error('description')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
      
                  <div class="form-group">
                      <label for="subscription_type">{{ trans('cruds.subscription_type') }}</label>
                      <input type="text" required class="form-control" name="subscription_type" id="subscription_type"  value="{{$subscription->subscription_type }}">
                      @error('subscription_type')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
      
                  <div class="form-group">
                      <label for="type_amount">{{ trans('cruds.type_amount') }}</label>
                      <input type="text" required class="form-control" name="type_amount" id="type_amount"  value="{{$subscription->type_amount }}">
                      @error('type_amount')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
      
                  <div class="form-group">
                      <label for="duration">{{ trans('cruds.duration') }}</label>
                      <input type="number" required class="form-control" name="duration" id="duration" min="1"  value="{{$subscription->duration }}">
                      @error('duration')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
      
                  <div class="form-group">
                      <label for="status">{{ trans('cruds.status') }}</label>
                      <select name="status" id="status" required class="form-control">
                          <option value="1" {{$subscription->status == 1 ? 'selected' : '' }}>{{ trans('cruds.active') }}</option>
                          <option value="0" {{$subscription->status == 0 ? 'selected' : '' }}>{{ trans('cruds.inactive') }}</option>
                      </select>
                      @error('status')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
      
                  <div class="form-group">
                      <label for="price">{{ trans('cruds.price') }}</label>
                      <input type="number" step="0.01" required class="form-control" name="price" id="price"  value="{{$subscription->price }}">
                      @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
      
                  <div class="form-group">
                      <label for="real_price">{{ trans('cruds.real_price') }}</label>
                      <input type="number" step="0.01" required class="form-control" name="real_price" id="real_price"  value="{{$subscription->real_price }}">
                      @error('real_price')<div class="text-danger">{{ $message }}</div> @enderror
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

