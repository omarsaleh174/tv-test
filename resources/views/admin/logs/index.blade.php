@extends('layouts.master')
@section('content')
@include('includes.header_without_input',['item'=>'logs','page'=>'logs'])
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        @include('admin.logs.table')


      </div>
    </div>
  </div>
</div>
@endsection
