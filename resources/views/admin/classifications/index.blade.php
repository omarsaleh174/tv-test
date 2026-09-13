@extends('layouts.master')
@section('content')

@include('includes.header_index',['item'=>'classifications'??[]])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.classifications.table')

      </div>
    </div>
  </div>
</div>
@include('admin.classifications.form')
@endsection
