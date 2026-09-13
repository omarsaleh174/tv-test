@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => 'roles' , 'page' => 'roles'])

<div class="row">
      <div class="col-12">
        <div class="card card-body">
          <div class="row">
            <div  class="FormExtended col-11">          
              <h4> {{ trans('cruds.roles') }}</h4>  
            </div>
            <div class="col-1">
              @canany(['admin','add_roles'])
                <a href="{{route('roles.create')}}"  style="margin-top: 20px;" class="btn btn-block btn-primary ">{{ trans('cruds.add') }} {{trans('cruds.new') }}</a>
              @endcanany
            </div>
          </div>
          <hr>
          <div class="card-body">
              {!!table($roles,['id','name'],'roles',['view','edit','delete'])!!} 
              <br>
          </div>
        </div>
      </div>
    </div>
    
  @endsection

