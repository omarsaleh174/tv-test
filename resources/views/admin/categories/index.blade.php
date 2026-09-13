@extends('layouts.master')
@section('content')

@include('includes.header_index',['item'=>'categories'??[]])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.categories.table')

      </div>
    </div>
  </div>
</div>
@include('admin.categories.form')
@endsection
