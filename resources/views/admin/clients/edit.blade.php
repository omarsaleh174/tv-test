@extends('layouts.master')
@section('content')

@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $client->title_en, 'page' => 'clients'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.client')}}</h3>
                </div>
                <form method="post"class="form-horizontal"  action="{{ route('clients.update',$client->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row">
                            <!-- Name and Email Fields - stacked vertically -->
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ trans('cruds.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ trans('cruds.email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}">
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
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $client->phone }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone_2">{{ trans('cruds.phone_2') }}</label>
                                    <input type="text" class="form-control" id="phone_2" name="phone_2" value="{{ $client->phone_2 }}">
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
                                            <option value="{{ $city->id }}" {{ $client->city_id == $city->id ? 'selected' : '' }}>
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
                                            <option value="{{ $country->id }}" {{ $client->country_id == $country->id ? 'selected' : '' }}>
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
                                        <option value="1" {{ $client->active == 1 ? 'selected' : '' }}>{{ trans('cruds.yes') }}</option>
                                        <option value="0" {{ $client->active == 0 ? 'selected' : '' }}>{{ trans('cruds.no') }}</option>
                                    </select>
                                </div>
                            </div>
                
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="gender">{{ trans('cruds.gender') }}</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">{{ trans('cruds.select_gender') }}</option>
                                        <option value="1" {{ $client->gender == 1 ? 'selected' : '' }}>{{ trans('cruds.male') }}</option>
                                        <option value="2" {{ $client->gender == 2 ? 'selected' : '' }}>{{ trans('cruds.female') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <!-- Company Name, WhatsApp, and Password Fields - stacked vertically -->
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="company_name">{{ trans('cruds.company_name') }}</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $client->company_name }}">
                                    @error('company_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="whatsapp">{{ trans('cruds.whatsapp') }}</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $client->whatsapp }}">
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
                
                            <div class="form-group col-12">
                                <label>{{ trans('cruds.category') }}</label>
                                <select name="category_id[]" class="form-control select2" multiple style="in-width: 100% ; height: 40px ;width:100%">
                                    <option value="">{{ trans('cruds.select_category') }}</option>
                                    @foreach(App\Entities\Admin\Category::all() as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ in_array($category->id,  $client->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="photo">{{ trans('cruds.photo') }}</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    @error('photo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="col-6">
                                        <img src="{{$client->photo??''}}"  sizes="150" width="150" height="150">
                                    </div>
                                </div>
                                </div>
                            </div>
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
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

@endsection
@endsection

