@extends('layouts.master')
@section('content')

@include('includes.header_index',['item'=>'$model'??[]])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.$model.table')

      </div>
    </div>
  </div>
</div>
@include('admin.$model.form')
@endsection
