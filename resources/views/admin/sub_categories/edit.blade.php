@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $sub_category->title_en, 'page' => 'sub_categories'])

<div class="row">
    <div class="col-12">
      <div class="">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.sub_category')}}</h3>
                </div>
                <form method="post" action="{{ route('sub-categories.update',$sub_category->id) }}" enctype="multipart/form-data">
                    <div class="tab-pane fade show active" id="store_details" role="tabpanel">
                        <div class="card mb-12">
                            <div class="card-body row">
                    @csrf
                    @method('put')


                        <div class="col-12 col-md-6">
                            <label class="form-label mb-1" for="title_en">{{ trans('cruds.title_en') }}</label>
                            <input type="text" required class="form-control" name="title_en" value="{{$sub_category->title_en??''}}" placeholder="{{ trans('cruds.title_en') }}">
                            @error('title_en')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                
                        <div class="col-12 col-md-6">
                            <label class="form-label mb-1" for="title_ar">{{ trans('cruds.title_ar') }}</label>
                            <input type="text" required class="form-control" name="title_ar" value="{{$sub_category->title_ar??''}}" placeholder="{{ trans('cruds.title_ar') }}">
                            @error('title_ar')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-6">
                            {!!  select(['label'=>'category','name'=>'category_id','view_data'=>'title_en','value'=>$sub_category->category_id??old('category_id'),'items'=>App\Entities\Admin\Category::all(),'errors'=>$errors->toArray()['category_id']??''] )  !!}
                        </div>
    
                        <div class="col-12 col-md-6">
                            <label class="form-label mb-1" for="photo">{{ trans('cruds.photo') }}</label>
                            <input type="file" class="form-control" name="photo">
                            @if($sub_category->photo)  <img src="{{$sub_category->photo}}" width="70" height="70">@endif
                            @error('photo')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{trans('cruds.submit')}}</button>
                        </div>
                    </div>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

