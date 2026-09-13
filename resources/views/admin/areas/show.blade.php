@extends('layouts.master')
@section('content')
<section class="page-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ trans('cruds.area') }}</h1>
            <br>
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
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>{{ trans('cruds.id') }}</th>
                                <td>{{$area->id}}</td>
                            </tr>

                            <tr>
                                <th>{{ trans('cruds.name') }}</th>
                                <td>{{$area->name}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.city') }}</th>
                                <td>
                                    @if($area->city)
                                        <a href="{{ route('cities.show',$area->city->id) }}">{{$area->city->name??''}}</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.created_at') }}</th>
                                <td>{{$area->created_at}}</td>
                            </tr>
                        </thead>
                    </table>


            </div>
        </div>
    </div>
        </div>
      </div>
    </div>
  </section>
  @endsection

