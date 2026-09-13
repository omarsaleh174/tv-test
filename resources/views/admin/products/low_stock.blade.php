@extends('layouts.master')
@section('content')
@include('includes.header_without_input',['item'=>'lowStock','page'=>'products'])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
          @include('admin.products.tableLow')
        </div>
      </div>
  </div>
</div>
@endsection

