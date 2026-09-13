@extends('layouts.master')
@section('content')
<br>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.tenders.client_tenders_table')

      </div>
    </div>
  </div>
</div>
@endsection
