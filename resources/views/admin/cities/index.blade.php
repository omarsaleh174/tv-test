@extends('layouts.master')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary mb-4 " data-bs-toggle="modal"data-bs-target="#modal-lg">{{ trans('cruds.add') }} {{ trans('cruds.cities') }}</button>
            </div>
            @include('includes.errors')

        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('cruds.cities') }}</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.cities.table')
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
                            <h3 class="card-title">{{ trans('cruds.add') }} {{ trans('cruds.city') }}</h3>
                        </div>
                        <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body row">
                                <div class="form-group col-6">
                                    <label for="title_en">{{ trans('cruds.title_en') }}</label>
                                    <input type="text" required class="form-control" name="title_en"
                                        placeholder="{{ trans('cruds.title_en') }}">
                                    @error('title_en')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="title_ar">{{ trans('cruds.title_ar') }}</label>
                                    <input type="text" required class="form-control" name="title_ar"
                                        placeholder="{{ trans('cruds.title_ar') }}">
                                    @error('title_ar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                    <div class="col-md-12 col-xl-12">
                                        <label class="col-sm-12 col-form-label">{{trans('cruds.country')}}</label>
                                        <select class="form-control select2" name="country_id"style="width: 100%;">
                                            @foreach (App\Entities\Admin\Country::all() as $item)
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                            </select>
                                        @error('country_id')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
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

