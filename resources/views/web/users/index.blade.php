@extends('layouts.master')

@section('content')
@include('includes.header_index',['item'=>'users'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              @include('web.users.table')
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('cruds.add') }} {{ trans('cruds.users') }}</h3>
                    </div>
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label>{{ trans('cruds.name') }}</label>
                                <input type="string" class="form-control" name="name"
                                    placeholder="{{ trans('cruds.name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>{{ trans('cruds.phone') }}</label>
                                <input type="text" class="form-control" name="phone"
                                    placeholder="{{ trans('cruds.phone') }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>{{ trans('cruds.email') }}</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="{{ trans('cruds.email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>{{ trans('cruds.password') }}</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="{{ trans('cruds.password') }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- 
                    <div class="col-6">
                        <label for="photo">{{trans('cruds.photo')}}</label>
                        <div class="input-group">
                            <div class="">
                                <input type="file" class="form-control" name="photo">
                                <label class="" for="photo">{{trans('cruds.choose')}} {{trans('cruds.photo')}} </label>
                            </div>
                        </div>
                        @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                    </div> --}}

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default"
                                data-bs-dismiss="modal">{{ trans('cruds.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ trans('cruds.add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

