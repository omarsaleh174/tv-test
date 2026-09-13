@extends('layouts.master')
@section('content')

{{-- @include('includes.header_without_input',['item'=>'consultations','page'=>'consultations']) --}}
<br>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.consultations.table')

      </div>
    </div>
  </div>
</div>
@include('admin.consultations.form')
@endsection
