@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $user->name, 'page' => 'users'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.user')}}</h3>
                </div>
                <form method="post" class="form-horizontal"    action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" >{{trans('cruds.name')}}</label>
                            <div class="col-sm-8">
                                <input type="string"  class="form-control" name="name"value="{{$user->name??''}}" placeholder="{{trans('cruds.name')}}">
                            </div>
                            @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" >{{trans('cruds.phone')}}</label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control" name="phone"value="{{$user->phone??''}}" placeholder="{{trans('cruds.phone')}}">
                            </div>
                            @error('phone')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" >{{trans('cruds.email')}}</label>
                            <div class="col-sm-8">
                                <input type="email"  class="form-control" name="email"value="{{$user->email??''}}" placeholder="{{trans('cruds.email')}}">
                            </div>
                            @error('email')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" >{{trans('cruds.password')}}</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password">
                            </div>
                            @error('password')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        {{-- <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">{{ trans('cruds.photo') }}</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="photo">
                            </div>
                            @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                            <div class="col-6">
                                <img src="{{$user->photo??''}}"  sizes="150" width="150" height="150">
                            </div>
                        </div> --}}

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

