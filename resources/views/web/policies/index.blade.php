@extends('layouts.master')
@section('content')
@include('includes.header_index',['item'=>'policies'??[]])
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('web.policies.table')
      </div>
    </div>
  </div>
</div>
@include('web.policies.form')
@endsection
