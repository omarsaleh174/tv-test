@extends('layouts.master')
@section('content')

@include('includes.header_index',['item'=>'departments'??[]])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.departments.table')

      </div>
    </div>
  </div>
</div>
@include('admin.departments.form')
@endsection
