@extends('layouts.master')
@section('content')

@include('includes.header_index',['item'=>'countries'??[]])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.countries.table')

      </div>
    </div>
  </div>
</div>
@include('admin.countries.form')
@endsection
