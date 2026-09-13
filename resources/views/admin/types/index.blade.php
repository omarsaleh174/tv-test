@extends('layouts.master')
@section('content')
@include('includes.header_index',['item'=>'types'??[]])
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.types.table')
      </div>
    </div>
  </div>
</div>
@include('admin.types.form')
@endsection
