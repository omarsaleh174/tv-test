@extends('layouts.master')

@section('content')


@include('includes.header_index',['item'=>'sub_categories'??[]])


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.sub_categories.table')
      </div>
    </div>
  </div>
</div>

@include('admin.sub_categories.form')
  @endsection

