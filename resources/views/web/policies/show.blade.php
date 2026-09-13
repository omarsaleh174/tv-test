@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $policy->title_en, 'page' => 'policy'])
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>{{ trans('cruds.id') }}</th>
                                <td>{{$policy->id}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.title_en') }}</th>
                                <td>{{$policy->title_en}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.title_ar') }}</th>
                                <td>{{$policy->title_ar}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.type') }}</th>
                                <td>{{trans('cruds.'.$policy->my_type)}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.description_en') }}</th>
                                <td>{{$policy->description_en}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.description_ar') }}</th>
                                <td>{{$policy->description_ar}}</td>
                            </tr>

                            <tr>
                                <th>{{ trans('cruds.created_at') }}</th>
                                <td>{{$policy->created_at}}</td>
                            </tr>
                        </thead>
                    </table>
                  </div>
              </div>
          </div>
        </div>
      </div>
  @endsection

