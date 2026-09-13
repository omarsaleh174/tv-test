@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $banner->title, 'page' => 'banners'])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" >
                  <thead>
                      <tr>
                          <th>{{ trans('cruds.id') }}</th>
                          <td>{{$banner->id}}</td>
                      </tr>
                      <tr>
                          <th>{{ trans('cruds.title') }}</th>
                          <td>{{$banner->title}}</td>
                      </tr>
                      <tr>
                          <th>{{ trans('cruds.link') }}</th>
                          <td>{{$banner->link}}</td>
                      </tr>
                      <tr>
                          <th>{{ trans('cruds.created_at') }}</th>
                          <td>{{$banner->created_at}}</td>
                      </tr>
                      <tr>
                        <th>{{ trans('cruds.photo') }}</th>
                        <td> <img src="{{$banner->photo??''}}"  sizes="150" width="150" height="150"></td>
                    </tr>
  
                  </thead>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
  @endsection

