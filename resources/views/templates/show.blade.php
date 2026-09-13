@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $item->title_en, 'page' => 'categories'])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" >
                  <thead>
                      <tr>
                          <th>{{ trans('cruds.id') }}</th>
                          <td>{{$item->id}}</td>
                      </tr>
                      <tr>
                          <th>{{ trans('cruds.title_en') }}</th>
                          <td>{{$item->title_en}}</td>
                      </tr>
                      <tr>
                          <th>{{ trans('cruds.title_ar') }}</th>
                          <td>{{$item->title_ar}}</td>
                      </tr>
                      <tr>
                          <th>{{ trans('cruds.created_at') }}</th>
                          <td>{{$item->created_at}}</td>
                      </tr>
                      <tr>
                        <th>{{ trans('cruds.photo') }}</th>
                        <td> <img src="{{$item->photo??''}}"  sizes="150" width="150" height="150"></td>
                    </tr>
  
                  </thead>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
  @endsection

