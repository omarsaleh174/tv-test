@extends('layouts.master')

@section('content')

<section class="page-header">
    <div class="container-fluid"  id="app">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ trans('cruds.area') }}</h1>
            <br>
            <div class="col-sm-4">
                    <button type="button" class="btn btn-block btn-primary " data-bs-toggle="modal" data-bs-target="#modal-lg">{{ trans('cruds.add') }} {{trans('cruds.area') }}</button>
            </div>
                <div class="col-sm-12">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-danger ">{{$error}}</div>
                    @endforeach
                @endif

            </div>

        </div>
    <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('cruds.area') }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                @include('admin.areas.table',['items'=>$items])
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


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
                  <h3 class="card-title">{{ trans('cruds.add') }} {{trans('cruds.area') }}</h3>
                </div>
                <form action="{{route('areas.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{trans('cruds.name')}}</label>
                            <input type="text" required class="form-control" name="name" placeholder="{{trans('cruds.name')}}">
                            @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                  </div>


                  <div class="card-body">
                    <div class="form-group">
                    <label > City</label>
                        <select class="form-control"  name="city_id" required>
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->title_en}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('cruds.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('cruds.add') }}</button>
                  </div>
                </form>
        </div>
      </div>
    </div>
   </div>
  </div>
  @endsection

