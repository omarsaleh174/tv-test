<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ trans('cruds.add') }} {{trans('cruds.products') }}</h3>
                </div>
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" >
                  @csrf
                  <div class="card-body">
                  <div class="row">
                      <div class="col-md-12 col-xl-6">
                          <label class="col-sm-12 col-form-label">{{trans('cruds.title_en')}}</label>
                          <input type="string"  class="form-control" name="title_en" value="{{old('title_en')}}"  placeholder="{{trans('cruds.title_en')}}">
                          @error('title_en')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                      <div class="col-md-12 col-xl-6">
                          <label class="col-sm-12 col-form-label">{{trans('cruds.title_ar')}}</label>
                          <input type="string"  class="form-control" name="title_ar" value="{{old('title_ar')}}" placeholder="{{trans('cruds.title_ar')}}">
                          @error('title_ar')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>

                      <div class="col-md-12 col-xl-6">
                          <label class="col-sm-12 col-form-label">{{trans('cruds.price')}}</label>
                          <input type="number"  class="form-control" name="price" value="{{old('price')}}"  placeholder="{{trans('cruds.price')}}">
                          @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>

                      <div class="col-md-12 col-xl-6">
                        <label class="col-sm-12 col-form-label">{{trans('cruds.real_price')}}</label>
                        <input type="number"  class="form-control" name="real_price" value="{{old('real_price')}}"  placeholder="{{trans('cruds.real_price')}}">
                        @error('real_price')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>

                      <div class="col-md-12 col-xl-6">
                        <label class="col-sm-12 col-form-label">{{trans('cruds.amount')}}</label>
                        <input type="number"  class="form-control" name="amount" value="{{old('amount')}}"  placeholder="{{trans('cruds.amount')}}">
                        @error('amount')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>

                      <div class="col-md-12 col-xl-6">
                        <label class="col-sm-12 col-form-label">{{trans('cruds.code')}}</label>
                        <input type="string"  class="form-control" name="code" value="{{old('code')}}"  placeholder="{{trans('cruds.code')}}">
                        @error('code')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>

                    
                      {{-- <div class="col-md-12 col-xl-6">
                          <label class="col-sm-12 col-form-label">{{trans('cruds.category')}}</label>
                          <select class="form-control select2" name="category_id"style="width: 100%;">
                              @foreach ($categories??[] as $item)
                                  <option value="{{$item->id}}">{{$item->title_en}}</option>
                              @endforeach
                            </select>
                          @error('category_id')<div class="text-danger">{{ $message }}</div> @enderror
                      </div> --}}

                     <div class="col-md-12 col-xl-6">
                         {!!  select(['label'=>'sub_category','name'=>'sub_category_id','view_data'=>'title_en','value'=>$item->sub_category_id??old('sub_category_id'),'items'=>App\Entities\Admin\SubCategory::all(),'errors'=>$errors->toArray()['sub_category_id']??''] )  !!}
                      </div>
                     <div class="col-md-12 col-xl-6">
                         {!!  select(['label'=>'unit','name'=>'unit_id','view_data'=>'title_en','value'=>$item->unit_id??old('unit_id'),'items'=>App\Entities\Admin\Unit::all(),'errors'=>$errors->toArray()['unit_id']??''] )  !!}
                      </div>
                     <div class="col-md-12 col-xl-6">
                         {!!  select(['label'=>'country','name'=>'country_id','view_data'=>'title_en','value'=>$item->country_id??old('country_id'),'items'=>App\Entities\Admin\Country::all(),'errors'=>$errors->toArray()['country_id']??''] )  !!}
                      </div>
                     <div class="col-md-12 col-xl-6">
                         {!!  select(['label'=>'type','name'=>'type_id','view_data'=>'title_en','value'=>$item->type_id??old('type_id'),'items'=>App\Entities\Admin\Type::all(),'errors'=>$errors->toArray()['type_id']??''] )  !!}
                      </div>
                     <div class="col-md-12 col-xl-6">
                         {!!  select(['label'=>'brand','name'=>'brand_id','view_data'=>'title_en','value'=>$item->brand_id??old('brand_id'),'items'=>App\Entities\Admin\Brand::all(),'errors'=>$errors->toArray()['brand_id']??''] )  !!}
                      </div>
                     <div class="col-md-12 col-xl-6">
                         {!!  select(['label'=>'manufacture','name'=>'manufacture_id','view_data'=>'title_en','value'=>$item->manufacture_id??old('manufacture_id'),'items'=>App\Entities\Admin\Manufacture::all(),'errors'=>$errors->toArray()['manufacture_id']??''] )  !!}
                      </div>
                      {{-- {!!  select(['label'=>'is_packaging','name'=>'is_packaging','view_data'=>'value','value'=>$item->is_packaging??old('is_packaging'),'items'=>[['id'=>0,'value'=>'no'],['id'=>1,'value'=>'yes']],'errors'=>$errors->toArray()['is_packaging']??''] )  !!} --}}
                      {{-- <div class="col-md-12 col-xl-6">
                        <label class="col-sm-12 col-form-label">{{trans('cruds.units')}}</label>
                        <select class="form-control select2" name="unit_id"style="width: 100%;">
                          @foreach ($units??[] as $item)
                              <option value="{{$item->id}}">{{$item->title_en}}</option>
                            @endforeach
                          </select>
                        @error('unit_id')<div class="text-danger">{{ $message }}</div> @enderror
                    </div> --}}

                      <div class="col-md-12 col-xl-6">
                          <label for="photo">{{trans('cruds.photo')}}</label>
                          <div class="input-group">
                              <div class="">
                                  <input type="file" class="form-control" name="photo">
                                  <label class="" for="photo">{{trans('cruds.choose')}} {{trans('cruds.photo')}} </label>
                              </div>
                          </div>
                          @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                      <div class="col-md-12 col-xl-6">
                        <div class="form-group">
                          <label class="col-sm-12 col-form-label">{{ trans('cruds.is_packaging') }} <span class="text-red">*</span></label>
                         <div class="col-sm-12">

                           <select class="form-control form-select select2" name="is_packaging" data-bs-placeholder="Select">
                             <option value="0" selected> {{ trans('cruds.no') }}</option>
                             <option value="1" > {{ trans('cruds.yes') }}</option>
                            </select>
                          </div>
                            
                          @error('is_packaging')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="col-12">
                        <label class="col-sm-12 col-form-label">{{trans('cruds.description_ar')}}</label>
                        <textarea  class="form-control" name="description_ar" placeholder="{{trans('cruds.description_ar')}}"> </textarea>
                        @error('description_ar')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                      <div class="col-12">
                        <label class="col-sm-12 col-form-label">{{trans('cruds.description_en')}}</label>
                        <textarea  class="form-control" name="description_en" placeholder="{{trans('cruds.description_en')}}"> </textarea>
                        @error('description_en')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                  </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ trans('cruds.close') }}</button>
                      <button type="submit" class="btn btn-primary">{{ trans('cruds.add') }}</button>
                  </div>
              </form>


            </div>
        </div>
      </div>
    </div>
</div>

