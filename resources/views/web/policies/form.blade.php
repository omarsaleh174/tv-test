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
                  <h3 class="card-title">{{ trans('cruds.add') }} {{trans('cruds.type') }}</h3>
                </div>
                <form action="{{route('policies.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label >{{trans('cruds.title_en')}}</label>
                            <input type="text" required class="form-control" name="title_en" placeholder="{{trans('cruds.title_en')}}">
                            @error('title_en')<div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                          <label >{{trans('cruds.title_ar')}}</label>
                          <input type="text" required class="form-control" name="title_ar" placeholder="{{trans('cruds.title_ar')}}">
                          @error('title_ar')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                        <div class="form-group">
                          <label >{{trans('cruds.type')}}</label>
                          <select name="type" class="form-control">
                            <option value="">{{trans('cruds.type')}}</option>
                            <option value="1">{{trans('cruds.frequently_asked_questions')}}</option>
                            <option value="2">{{trans('cruds.payment_method')}}</optio>
                        </select>
                          @error('type')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                      <div class="col-12">
                        <label class="col-sm-12 col-form-label">{{trans('cruds.description_en')}}</label>
                        <textarea  class="form-control" name="description_en" placeholder="{{trans('cruds.description_en')}}"> </textarea>
                        @error('description_en')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                      <div class="col-12">
                        <label class="col-sm-12 col-form-label">{{trans('cruds.description_ar')}}</label>
                        <textarea  class="form-control" name="description_ar" placeholder="{{trans('cruds.description_ar')}}"> </textarea>
                        @error('description_ar')<div class="text-danger">{{ $message }}</div> @enderror
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
  
