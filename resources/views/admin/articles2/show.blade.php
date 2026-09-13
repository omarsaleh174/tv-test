@extends('layouts.app')
@section('content')
<style>
  tr:nth-child(even) {
background-color: WhiteSmoke;
}
</style>
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>{{trans('cruds.view')}}  {{ trans('cruds.post') }}</h4>
          <br>
        </div>
    <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">{{ trans('cruds.posts') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('cruds.view') }}</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
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

                       

                    <tr>
                       <th>{{ trans('cruds.suspend') }}</th>
                        <td class="center">
                          <a class="btn btn-sm btn-link" href="{{route('posts.suspend',$item->id)}}" >{{ $item->active==1?trans('cruds.suspend'):trans('cruds.unsuspend') }}</a>
                        @if($item->active==1)
                        <svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16"><path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/></svg>
                          @else
                          <svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/></svg>
                        @endif
                    </tr>
                    <tr><th>{{ trans('cruds.created_at') }}</th><td>{{$item->created_at}}</td></tr>
                    <tr><th>{{ trans('cruds.photo') }}</th><td> <img src="{{$item->photo??''}}"  sizes="150" width="150" height="150"></td></tr>

                  </thead>
                    </table>

            </div>
        </div>
    </div>
        </div>
      </div>
    </div>
  </section>
  @endsection

