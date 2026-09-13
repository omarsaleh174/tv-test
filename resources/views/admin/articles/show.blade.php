@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $item->title_en, 'page' => 'tenders'])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" >
                  <thead>
                    {!! th_view( $item->id,'id') !!}
                    {!! th_view( $item->title_en,'title_en') !!}
                    {!! th_view( $item->title_ar,'title_ar') !!}
                    {!! th_view( $item->sub_desc_en,'sub_desc_en') !!}
                    {!! th_view( $item->sub_desc_ar,'sub_desc_ar') !!}
                    {!! th_view( $item->desc_en,'desc_en') !!}
                    {!! th_view( $item->desc_ar,'desc_ar') !!}

                     
                  <tr><th>{{ trans('cruds.created_at') }}</th><td>{{$item->created_at}}</td></tr>
                  <tr><th>{{ trans('cruds.photo') }}</th><td> <img src="{{$item->photo??''}}"  sizes="150" width="150" height="150"></td></tr>


                </thead>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
  @endsection

