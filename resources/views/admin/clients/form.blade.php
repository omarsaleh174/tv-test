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
                        <h3 class="card-title">{{ trans('cruds.add') }} {{ trans('cruds.clients') }}</h3>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <!-- Name and Email Fields - stacked vertically -->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ trans('cruds.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email">{{ trans('cruds.email') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <!-- Phone and Phone_2 Fields - stacked vertically -->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">{{ trans('cruds.phone') }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="phone_2">{{ trans('cruds.phone_2') }}</label>
                                        <input type="text" class="form-control" id="phone_2" name="phone_2" value="{{ old('phone_2') }}">
                                        @error('phone_2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <!-- City and Country Fields - stacked vertically -->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="city_id">{{ trans('cruds.city') }}</label>
                                        <select name="city_id" id="city_id" class="form-control">
                                            <option value="">{{ trans('cruds.city') }}</option>
                                            @foreach (App\Entities\Admin\City::all() as $city)
                                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">{{ trans('cruds.country') }}</label>
                                        <select name="country_id" id="country_id" class="form-control" required>
                                            <option value="">{{ trans('cruds.select_country') }}</option>
                                            @foreach (App\Entities\Admin\Country::all() as $country)
                                                <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="active">{{ trans('cruds.active') }}</label>
                                        <select name="active" id="active" class="form-control" required>
                                            <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>{{ trans('cruds.yes') }}</option>
                                            <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>{{ trans('cruds.no') }}</option>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="gender">{{ trans('cruds.gender') }}</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">{{ trans('cruds.select_gender') }}</option>
                                            <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>{{ trans('cruds.male') }}</option>
                                            <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>{{ trans('cruds.female') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <!-- Company Name, WhatsApp, and Password Fields - stacked vertically -->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="company_name">{{ trans('cruds.company_name') }}</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}">
                                        @error('company_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="whatsapp">{{ trans('cruds.whatsapp') }}</label>
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}">
                                        @error('whatsapp')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">{{ trans('cruds.password') }}</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="photo">{{ trans('cruds.photo') }}</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                        @error('photo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
</div>

