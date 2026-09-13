
@extends('layouts.master')
@section('content')
<section class="page-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ trans('cruds.user') }}</h1>
        </div>
    <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('cruds.user') }}</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
      <div class="col-8">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{trans('cruds.assign_role')}}</h3>
            </div>
            <form method="post" action="{{ route('post.user.assign.role',$user->id) }}" enctype="multipart/form-data">
              @csrf
              @method('post')
          
              <div class="card">
                  <div class="card-header text-center">
                      <h4>{{ trans('cruds.assign_role_to') }} {{ $user->name }}</h4>
                  </div>
                  <div class="card-body">
          
                      <!-- User Information -->
                      <div class="form-group">
                          <label for="role_id">{{ trans('cruds.role') }}</label>
                          <select class="form-control" name="role_id" id="role_id">
                              @foreach ($roles as $item)
                                  <option value="{{ $item->id }}" 
                                      {{ isset($user->role->id) && $user->role->id == $item->id ? 'selected' : '' }}>
                                      {{ $item->name }}
                                  </option>
                              @endforeach
                          </select>
                          @error('role_id')
                              <div class="text-danger mt-2">{{ $message }}</div>
                          @enderror
                      </div>
          
                  </div>
          
                  <div class="card-footer text-center">
                      <button type="submit" class="btn btn-primary">{{ trans('cruds.submit') }}</button>
                  </div>
              </div>
          </form>
            
        </div>
    </div>
</div>
</section>
@endsection


