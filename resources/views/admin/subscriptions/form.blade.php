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
                  <h3 class="card-title">{{ trans('cruds.add') }} {{trans('cruds.subscriptions') }}</h3>
                </div>
                <form action="{{route('subscriptions.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="title">{{ trans('cruds.title') }}</label>
                        <input type="text" required class="form-control" name="title" id="title" placeholder="{{ trans('cruds.title') }}" value="{{ old('title') }}">
                        @error('title')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="description">{{ trans('cruds.description') }}</label>
                        <textarea required class="form-control" name="description" id="description" placeholder="{{ trans('cruds.description') }}">{{ old('description') }}</textarea>
                        @error('description')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="subscription_type">{{ trans('cruds.subscription_type') }}</label>
                        <input type="text" required class="form-control" name="subscription_type" id="subscription_type" placeholder="{{ trans('cruds.subscription_type') }}" value="{{ old('subscription_type') }}">
                        @error('subscription_type')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="type_amount">{{ trans('cruds.type_amount') }}</label>
                        <input type="text" required class="form-control" name="type_amount" id="type_amount" placeholder="{{ trans('cruds.type_amount') }}" value="{{ old('type_amount') }}">
                        @error('type_amount')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="duration">{{ trans('cruds.duration') }}</label>
                        <input type="number" required class="form-control" max="12" name="duration" id="duration" min="1" placeholder="{{ trans('cruds.duration') }}" value="{{ old('duration') }}">
                        @error('duration')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="status">{{ trans('cruds.status') }}</label>
                        <select name="status" id="status" required class="form-control">
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ trans('cruds.active') }}</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ trans('cruds.inactive') }}</option>
                        </select>
                        @error('status')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="price">{{ trans('cruds.price') }}</label>
                        <input type="number" step="0.01" required class="form-control" name="price" id="price" placeholder="{{ trans('cruds.price') }}" value="{{ old('price') }}">
                        @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="real_price">{{ trans('cruds.real_price') }}</label>
                        <input type="number" step="0.01" required class="form-control" name="real_price" id="real_price" placeholder="{{ trans('cruds.real_price') }}" value="{{ old('real_price') }}">
                        @error('real_price')<div class="text-danger">{{ $message }}</div> @enderror
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
  
