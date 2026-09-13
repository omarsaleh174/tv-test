<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{ trans('cruds.add') }} {{trans('cruds.sub_category') }}</h3>
                </div>
                <form action="{{route('sub-categories.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                   
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12 form-group">
                              <label for="title_en">{{ trans('cruds.title_en') }}</label>
                              <input type="text" required class="form-control" name="title_en" value="{{ old('title_en') }}" placeholder="{{ trans('cruds.title_en') }}">
                              @error('title_en')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                          <div class="col-md-12 form-group">
                              <label for="title_ar">{{ trans('cruds.title_ar') }}</label>
                              <input type="text" required class="form-control" name="title_ar" value="{{ old('title_ar') }}" placeholder="{{ trans('cruds.title_ar') }}">
                              @error('title_ar')<div class="text-danger">{{ $message }}</div>@enderror
                          </div>
                      </div>
                       
                  <div class="col-md-12 col-xl-12">
                    {!!  select(['label'=>'category','name'=>'category_id','view_data'=>'title_en','value'=>$item->category_id??old('category_id'),'items'=>App\Entities\Admin\Category::all(),'errors'=>$errors->toArray()['category_id']??''] )  !!}
                 </div>

                      <div class="row">
                        <div class="col-md-12  form-group">
                            <label for="photo">{{ trans('cruds.photo') }}</label>
                            <input type="file" class="form-control" name="photo">
                            @error('photo')<div class="text-danger">{{ $message }}</div>@enderror
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
