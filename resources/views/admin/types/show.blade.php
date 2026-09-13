@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $type->title_en, 'page' => 'type'])
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>{{ trans('cruds.id') }}</th>
                                <td>{{$type->id}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.title_en') }}</th>
                                <td>{{$type->title_en}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.title_ar') }}</th>
                                <td>{{$type->title_ar}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.created_at') }}</th>
                                <td>{{$type->created_at}}</td>
                            </tr>
                        </thead>
                    </table>
                  </div>
              </div>
          </div>
        </div>
      </div>
  @endsection

