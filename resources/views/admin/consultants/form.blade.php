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
                  <h3 class="card-title">{{ trans('cruds.add') }} {{trans('cruds.consultants') }}</h3>
                </div>
                <form action="{{route('consultants.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                            <div class="form-group">
                                <label>{{ trans('cruds.name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ trans('cruds.name') }}" required>
                                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.title') }}</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="{{ trans('cruds.title') }}" required>
                                @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.birth_date') }}</label>
                                <input type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" required>
                                @error('birth_date')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.small_description') }}</label>
                                <textarea class="form-control" name="small_description" placeholder="{{ trans('cruds.small_description') }}" required>{{ old('small_description') }}</textarea>
                                @error('small_description')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.long_description') }}</label>
                                <textarea class="form-control" name="long_description" placeholder="{{ trans('cruds.long_description') }}" required>{{ old('long_description') }}</textarea>
                                @error('long_description')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.services') }}</label>
                                <textarea class="form-control" name="services" placeholder="{{ trans('cruds.services') }}" required>{{ old('services') }}</textarea>
                                @error('services')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.skills') }}</label>
                                <textarea class="form-control" name="skills" placeholder="{{ trans('cruds.skills') }}" required>{{ old('skills') }}</textarea>
                                @error('skills')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.city') }}</label>
                                <select class="form-control" name="city_id" required>
                                    <option value="">{{ trans('cruds.select_city') }}</option>
                                @foreach(App\Entities\Admin\City::all() as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.country') }}</label>
                                <select class="form-control" name="country_id" required>
                                    <option value="">{{ trans('cruds.select_country') }}</option>
                                @foreach(App\Entities\Admin\Country::all() as $country)
                                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->title }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.department') }}</label>
                                <select class="form-control" name="department_id" required>
                                    <option value="">{{ trans('cruds.select_department') }}</option>
                                @foreach(App\Entities\Admin\Department::all() as $department)
                                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->title }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.photo') }}</label>
                                <input type="file" class="form-control" name="photo" accept="image/*" required>
                                @error('photo')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.phone') }}</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('cruds.phone') }}" required>
                                @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('cruds.email') }}" required>
                                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.password') }}</label>
                                <input type="password" class="form-control" name="password" required>
                                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.whatsapp') }}</label>
                                <input type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="{{ trans('cruds.whatsapp') }}">
                                @error('whatsapp')<div class="text-danger">{{ $message }}</div>@enderror
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
  
