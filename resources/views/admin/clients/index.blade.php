@extends('layouts.master')

@section('content')

<div class="page-header">
  <div class="row">
    <div class="col-sm-3">
      <button type="button" class="btn btn-primary mb-4 " data-bs-toggle="modal" data-bs-target="#modal-lg">{{ trans('cruds.add') }} {{trans('cruds.clients') }}</button>
    </div>
    @include('includes.errors')
  </div>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ trans('cruds.clients') }}</li>
    </ol>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.clients.table')
      </div>
    </div>
  </div>
</div>
  @include('admin.clients.form')
@endsection

