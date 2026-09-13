@extends('layouts.master')
@section('content')
@include('includes.header_without_input',['item'=>$sub_category->title_en,'page'=>'sub_categories'])
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" >
                <thead>
                    <tr>
                        <th>{{ trans('cruds.id') }}</th>
                        <td>{{$sub_category->id}}</td>
                    </tr>

                    <tr>
                        <th>{{ trans('cruds.title_en') }}</th>
                        <td>{{$sub_category->title_en}}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.title_ar') }}</th>
                        <td>{{$sub_category->title_ar}}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.category') }}</th>
                        <td>
                          @if($sub_category->category)
                          <a href="{{route('categories.show',$sub_category->category->id)}}" target="_blank" >
                            {{$sub_category->category->my_title}}
                          </a>
                          @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.created_at') }}</th>
                        <td>{{$sub_category->created_at}}</td>
                    </tr>
                    @if($sub_category->photo)
                      <tr>
                          <th>{{ trans('cruds.photo') }}</th>
                          <td><img src="{{$sub_category->photo}}" width="100" height="100" alt=""></td>
                       </tr>
                      @endif
                </thead>
            </table>
            @if($sub_category->products)
              @include('admin.products.one_category',['sub_category_id'=>$sub_category->id])
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection

