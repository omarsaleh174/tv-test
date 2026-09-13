@extends('layouts.master')
@section('content')

@include('includes.header_index',['item'=>'subscriptions'??[]])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.subscriptions.table')

      </div>
    </div>
  </div>
</div>
@include('admin.subscriptions.form')
@endsection
