@extends('layouts.master')

@section('content')

@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $consultant->title_en, 'page' => 'consultants'])

<div class="row">
  <div class="col-12">
    <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.consultant')}}</h3>
              </div>
              <form method="post" action="{{ route('consultants.update',$consultant->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body row">
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.name') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ $consultant->name }}" placeholder="{{ trans('cruds.name') }}" >
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ $consultant->title }}" placeholder="{{ trans('cruds.title') }}" >
                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.birth_date') }}</label>
                        <input type="date" class="form-control" name="birth_date" value="{{ $consultant->birth_date_input }}" >
                        @error('birth_date')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.small_description') }}</label>
                        <textarea class="form-control" name="small_description" placeholder="{{ trans('cruds.small_description') }}" >{{ $consultant->small_description }}</textarea>
                        @error('small_description')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.long_description') }}</label>
                        <textarea class="form-control" name="long_description" placeholder="{{ trans('cruds.long_description') }}" >{{ $consultant->long_description }}</textarea>
                        @error('long_description')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.services') }}</label>
                        <textarea class="form-control" name="services" placeholder="{{ trans('cruds.services') }}" >{{ $consultant->services }}</textarea>
                        @error('services')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.skills') }}</label>
                        <textarea class="form-control" name="skills" placeholder="{{ trans('cruds.skills') }}" >{{ $consultant->skills }}</textarea>
                        @error('skills')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.city') }}</label>
                        <select class="form-control" name="city_id" >
                            <option value="">{{ trans('cruds.select_city') }}</option>
                        @foreach(App\Entities\Admin\City::all() as $city)
                                <option value="{{ $city->id }}" {{ $consultant->city_id == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                            @endforeach
                        </select>
                        @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.country') }}</label>
                        <select class="form-control" name="country_id" >
                            <option value="">{{ trans('cruds.select_country') }}</option>
                        @foreach(App\Entities\Admin\Country::all() as $country)
                                <option value="{{ $country->id }}" {{ $consultant->country_id == $country->id ? 'selected' : '' }}>{{ $country->title }}</option>
                            @endforeach
                        </select>
                        @error('country_id')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.department') }}</label>
                        <select class="form-control" name="department_id" >
                            <option value="">{{ trans('cruds.select_department') }}</option>
                        @foreach(App\Entities\Admin\Department::all() as $department)
                                <option value="{{ $department->id }}" {{ $consultant->department_id == $department->id ? 'selected' : '' }}>{{ $department->title }}</option>
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
                        <input type="text" class="form-control" name="phone" value="{{ $consultant->phone }}" placeholder="{{ trans('cruds.phone') }}" >
                        @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.email') }}</label>
                        <input type="email" class="form-control" name="email" value="{{ $consultant->email }}" placeholder="{{ trans('cruds.email') }}" >
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.password') }}</label>
                        <input type="password" class="form-control" name="password" >
                        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.whatsapp') }}</label>
                        <input type="text" class="form-control" name="whatsapp" value="{{ $consultant->whatsapp }}" placeholder="{{ trans('cruds.whatsapp') }}">
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
@endsection

