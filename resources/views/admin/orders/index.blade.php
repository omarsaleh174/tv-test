@extends('layouts.master')
@section('content')
<div class="page-header">
  <div class="row">
      <div class="col-sm-3">
        <h1>{{ trans('cruds.orders') }}</h1>
      </div>
      @include('includes.errors')
  </div>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ trans('cruds.orders') }}</li>
  </ol>
</div>
  <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
              @include('admin.orders.table',['seen'=>$seen])
          </div>
        </div>
    </div>
  </div>
  @endsection

