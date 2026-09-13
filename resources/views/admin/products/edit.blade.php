@extends('layouts.master')
@section('content')
    @include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $product->title_en, 'page' => 'products'])
    <div class="row">
        <div class="col-12">
            <div class="card-info">
                <form method="post"class="form-horizontal" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="row">
                            <div class="col-md-12 col-xl-6">
                                <div class="card">
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label">{{ trans('cruds.title_en') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="{{ $product->title_en }}" name="title_en">
                                        </div>
                                        @error('title_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label">{{ trans('cruds.real_price') }}</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" value="{{ $product->real_price }}" name="real_price">
                                        </div>
                                        @error('real_price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label">{{ trans('cruds.amount') }}</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" value="{{ $product->amount }}" name="amount">
                                        </div>
                                        @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {!! select([ 'label' => 'unit', 'name' => 'unit_id', 'view_data' => 'title_en', 'value' => $product->unit_id ?? old('unit_id'), 'items' => App\Entities\Admin\Unit::all(), 'errors' => $errors->toArray()['unit_id'] ?? '', ]) !!}
                                    {!! select([ 'label' => 'country', 'name' => 'country_id', 'view_data' => 'title_en', 'value' => $product->country_id ?? old('country_id'), 'items' => App\Entities\Admin\Country::all(), 'errors' => $errors->toArray()['country_id'] ?? '', ]) !!}
                                    
                                    <div class="form-group">
                                      <label class="col-sm-12 col-form-label">{{ trans('cruds.is_packaging') }} <span class="text-red">*</span></label>
                                     <div class="col-sm-12">

                                       <select class="form-control form-select select2" name="is_packaging" data-bs-placeholder="Select">
                                         <option value="0" {{ $product->is_packaging == 0 ? 'selected' : '' }}> {{ trans('cruds.no') }}</option>
                                         <option value="1" {{ $product->is_packaging == 1 ? 'selected' : '' }}> {{ trans('cruds.yes') }}</option>
                                        </select>
                                      </div>
                                        
                                      @error('is_packaging')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label">{{ trans('cruds.description_en') }}</label>
                                        <div class="col-sm-12">
                                            <textarea name="description_en"class="form-control">{{ $product->description_en }} </textarea>
                                        </div>
                                        @error('description_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-6">
                                <div class="card">
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label">{{ trans('cruds.title_ar') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="{{ $product->title_ar }}" name="title_ar">
                                        </div>
                                        @error('title_ar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label">{{ trans('cruds.price') }}</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" value="{{ $product->price }}" name="price">
                                        </div>
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {!! select(['label' => 'sub_category','name' => 'sub_category_id','view_data' => 'title_en','value' => $product->sub_category_id ?? old('sub_category_id'),'items' => App\Entities\Admin\SubCategory::all(),'errors' => $errors->toArray()['sub_category_id'] ?? '', ]) !!}
                                    {!! select([ 'label' => 'type', 'name' => 'type_id', 'view_data' => 'title_en', 'value' => $product->type_id ?? old('type_id'), 'items' => App\Entities\Admin\Type::all(), 'errors' => $errors->toArray()['type_id'] ?? '', ]) !!}
                                    {!! select(['label' => 'brand','name' => 'brand_id','view_data' => 'title_en','value' => $product->brand_id ?? old('brand_id'),'items' => App\Entities\Admin\Brand::all(),'errors' => $errors->toArray()['brand_id'] ?? '', ]) !!}
                                    {!! select(['label' => 'manufacture','name' => 'manufacture_id','view_data' => 'title_en','value' => $product->manufacture_id ?? old('manufacture_id'),'items' => App\Entities\Admin\Manufacture::all(),'errors' => $errors->toArray()['manufacture_id'] ?? '', ]) !!}
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label">{{ trans('cruds.description_ar') }}</label>
                                        <div class="col-sm-12">
                                            <textarea name="description_ar"class="form-control">{{ $product->description_ar }} </textarea>
                                        </div>
                                        @error('description_ar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label">{{ trans('cruds.photo') }}</label>
                                        <div class="col-sm-12">
                                            <input type="file" name="photo" id="">
                                            @error('photo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if ($product->photo)
                                            <img src="{{ $product->photo ?? '' }}" sizes="150" width="150" height="150">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ trans('cruds.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('build/assets/select2-eb416f6c.js')}}"></script>


@endsection
