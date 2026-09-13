@extends('layouts.master')
@section('content')
@include('includes.header_without_input',['item'=>$role->name,'page'=>'roles'])
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" >
              <thead>
              <tr>
                  <th>{{ trans('cruds.id') }}</th>
                  <td>{{$role->id}}</td>
              </tr>

              <tr>
                  <th>{{ trans('cruds.name') }}</th>
                  <td>{{$role->name}}</td>
              </tr>
              <tr>
                  <th>{{ trans('cruds.created_at') }}</th>
                  <td>{{$role->created_at}}</td>
              </tr>
              <tr>
                  <th>{{ trans('cruds.permissions') }}</th>
                  <td class="row">

                          @foreach ($role->permissions as $item)
                          <div class="col-3">

                            <button type="button"  class="btn btn-s">{{$item->name}}<button>
                            </div>

                          @endforeach


                  </td>







              </tr>
          </thead>
              </table>

      </div>
  </div>
  </div>
  </div>
</div>
@endsection

