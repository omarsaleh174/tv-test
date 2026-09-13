@extends('layouts.master')

@section('content')

@include('includes.header_without_input', ['item' => trans('cruds.create') .'  '.trans('cruds.consultants'), 'page' => 'consultants'])

<div class="row">
  <div class="col-12">
    <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">{{trans('cruds.create')}} {{trans('cruds.consultant')}}</h3>
              </div>
              <form method="post" action="{{ route('consultants.store',) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body row">
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.name') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ trans('cruds.name') }}" >
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="{{ trans('cruds.title') }}" >
                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.birth_date') }}</label>
                        <input type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" >
                        @error('birth_date')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.small_description') }}</label>
                        <textarea class="form-control" name="small_description" placeholder="{{ trans('cruds.small_description') }}" >{{ old('small_description') }}</textarea>
                        @error('small_description')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.long_description') }}</label>
                        <textarea class="form-control" name="long_description" placeholder="{{ trans('cruds.long_description') }}" >{{ old('long_description') }}</textarea>
                        @error('long_description')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.services') }}</label>
                        <textarea class="form-control" name="services" placeholder="{{ trans('cruds.services') }}" >{{ old('services') }}</textarea>
                        @error('services')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.skills') }}</label>
                        <textarea class="form-control" name="skills" placeholder="{{ trans('cruds.skills') }}" >{{ old('skills') }}</textarea>
                        @error('skills')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="country_id">{{ trans('cruds.country') }}</label>
                        <select name="country_id" id="country_id" class="form-control" required>
                            <option value="" selected>{{ trans('cruds.select_country') }}</option>
                            @foreach(App\Entities\Admin\Country::all() as $country)
                                <option value="{{ $country->id }}">{{ $country->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="city_id">{{ trans('cruds.city') }}</label>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value="">{{ trans('cruds.select_city') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.department') }}</label>
                        <select class="form-control" name="department_id" >
                            <option value="">{{ trans('cruds.select_department') }}</option>
                        @foreach(App\Entities\Admin\Department::all() as $department)
                                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->title }}</option>
                            @endforeach
                        </select>
                        @error('department_id')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.photo') }}</label>
                        <input type="file" class="form-control" name="photo" accept="image/*" >
                        @error('photo')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.phone') }}</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="{{ trans('cruds.phone') }}" >
                        @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.email') }}</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('cruds.email') }}" >
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.password') }}</label>
                        <input type="password" class="form-control" name="password" >
                        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.whatsapp') }}</label>
                        <input type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="{{ trans('cruds.whatsapp') }}">
                        @error('whatsapp')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>



                  </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('cruds.submit')}}</button>
              </div>
              </form>
          </div>
      </div>
  </div>
</div>

@section('js')
    <script>
        $(document).ready(function() {
            $('#country_id').change(function() {
                let country_id = $(this).val();

                if(country_id) {
                    $.ajax({
                        url: "{{ route('get_all_cities') }}",
                        method: 'GET',
                        data: {
                            country_id: country_id,
                        },
                        success: function(response) {
                            $('#city_id').empty();
                            $('#city_id').append('<option value="">{{ trans("cruds.select_city") }}</option>');

                            // Populate the city dropdown with the response
                            if (response && response.data.length > 0) {
                                $.each(response.data, function(index, city) {
                                    $('#city_id').append('<option value="' + city.id + '">' + city.title_ar + '</option>');
                                });
                            } else {
                                $('#city_id').empty();
                            $('#city_id').append('<option value="">{{ trans("cruds.select_city") }}</option>');
                            }
                        },
                        error: function() {
                            alert("There was an error fetching citys. Please try again.");
                        }
                    });
                } else {
                    $('#city_id').empty();
                    $('#city_id').append('<option value="">{{ trans("cruds.select_city") }}</option>');
                }
            });
        });
    </script>
@endsection

@endsection

