@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $consultation->title, 'page' => 'consultations'])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" >
                  <thead>
                      <tr>
                          <th>{{ trans('cruds.id') }}</th>
                          <td>{{$consultation->id}}</td>
                      </tr>
                      <tr>
                          <th>{{ trans('cruds.title') }}</th>
                          <td>{{$consultation->title}}</td>
                      </tr>
                      <tr>
                          <th>{{ trans('cruds.message') }}</th>
                          <td>{{$consultation->message}}</td>
                      </tr>
                      <tr>
                        <th>{{ trans('cruds.consultant') }}</th>
                        <td>{{$consultation->consultant->name??""}}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.department') }}</th>
                        <td>{{$consultation->consultant->department->title??""}}</td>
                    </tr>
                </tr>
                <tr>
                    <th>{{ trans('cruds.client') }}</th>
                    <td>{{$consultation->client->name??""}}</td>
                </tr>
                      <tr>
                          <th>{{ trans('cruds.created_at') }}</th>
                          <td>{{$consultation->created_at}}</td>
                      </tr>
                  </thead>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
  @endsection

