@extends('layouts.master')
@section('content')

@include('includes.header_index',['item'=>'products'??[]])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('admin.products.table')
            </div>
        </div>
    </div>
</div>
@include('admin.products.form')
@endsection

