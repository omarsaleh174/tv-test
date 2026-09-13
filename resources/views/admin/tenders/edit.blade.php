@extends('layouts.master')

@section('content')

@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $tender->title_en, 'page' => 'tenders'])

<div class="row">
  <div class="col-12">
    <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.tender')}}</h3>
              </div>
              <form method="post" action="{{ route('tenders.update',$tender->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body row">
                    <div class="form-group col-6">
                      <label>{{ trans('cruds.tender_code') }}</label>
                      <input type="text" name="tender_code" class="form-control" value="{{ $tender->tender_code }}" placeholder="{{ trans('cruds.tender_code') }}">
                      @error('tender_code')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.title') }}</label>
                      <input type="text" name="title" class="form-control" value="{{ $tender->title }}" placeholder="{{ trans('cruds.title') }}">
                      @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.type') }}</label>
                      <select name="type" class="form-control">
                          <option value="">{{ trans('cruds.select_type') }}</option>
                          @foreach (App\Entities\Admin\Type::all() as $item)
                              <option value="{{$item->id}}" {{ $tender->type == $item->id ? 'selected' : '' }}>{{$item->title}}</option>
                          @endforeach
                      </select>
                      @error('type')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.publication_date') }}</label>
                      <input type="datetime-local"  name="publication_date" class="form-control" value="{{ $tender->customDate($tender->publication_date)??"" }}" placeholder="{{ trans('cruds.publication_date') }}">
                      @error('publication_date')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.closing_date') }}</label>
                      <input type="date" name="closing_date" class="form-control" value="{{ $tender->closing_date }}" placeholder="{{ trans('cruds.closing_date') }}">
                      @error('closing_date')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.opening_date') }}</label>
                      <input type="date" name="opening_date" class="form-control" value="{{ $tender->customDate($tender->opening_date)??"" }}" placeholder="{{ trans('cruds.opening_date') }}">
                      @error('opening_date')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.publisher_name') }}</label>
                      <input type="text" name="publisher_name" class="form-control" value="{{ $tender->publisher_name }}" placeholder="{{ trans('cruds.publisher_name') }}">
                      @error('publisher_name')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.bid_docs_price') }}</label>
                      <input type="number" name="bid_docs_price" class="form-control" value="{{ $tender->bid_docs_price }}" placeholder="{{ trans('cruds.bid_docs_price') }}">
                      @error('bid_docs_price')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.docs_sale_place') }}</label>
                      <input type="text" name="docs_sale_place" class="form-control" value="{{ $tender->docs_sale_place }}" placeholder="{{ trans('cruds.docs_sale_place') }}">
                      @error('docs_sale_place')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.docs_sale_phone') }}</label>
                      <input type="text" name="docs_sale_phone" class="form-control" value="{{ $tender->docs_sale_phone }}" placeholder="{{ trans('cruds.docs_sale_phone') }}">
                      @error('docs_sale_phone')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
              
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.reference') }}</label>
                      <input type="text" name="reference" class="form-control" value="{{ $tender->reference }}" placeholder="{{ trans('cruds.reference') }}">
                      @error('reference')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
              
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.website_link') }}</label>
                      <input type="url" name="website_link" class="form-control" value="{{ $tender->website_link }}" placeholder="{{ trans('cruds.website_link') }}">
                      @error('website_link')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
              
             
                  <div class="form-group col-6">
                    <label>{{ trans('cruds.category') }}</label>
                    <select name="category_id[]" class="form-control select2" multiple>
                        <option value="">{{ trans('cruds.select_category') }}</option>
                        @foreach(App\Entities\Admin\Category::all() as $category)
                            <option value="{{ $category->id }}" 
                                    {{ in_array($category->id,  $tender->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                
                <div class="form-group col-6">
                    <label for="country_id">{{ trans('cruds.country') }}</label>
                    <select name="country_id" id="country_id" class="form-control" required>
                        <option value="" selected>{{ trans('cruds.select_country') }}</option>
                        @foreach(App\Entities\Admin\Country::all() as $country)
                            <option value="{{ $country->id }}
                                {{ $tender->country_id == $country->id ? 'selected' : '' }}">{{ $country->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-6">
                    <label>{{ trans('cruds.city') }}</label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="">{{ trans('cruds.select_city') }}</option>
                        @foreach ($tender->country->cities??[] as $city)
                        <option value="{{ $city->id }}" {{ $tender->city_id == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                        @endforeach
                    </select>
                    @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                  <div class="form-group col-6">
                      <label>{{ trans('cruds.submission_place') }}</label>
                      <input type="text" name="submission_place" class="form-control" value="{{ $tender->submission_place }}" placeholder="{{ trans('cruds.submission_place') }}">
                      @error('submission_place')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
              
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.phone') }}</label>
                      <input type="text" name="phone" class="form-control" value="{{ $tender->phone }}" placeholder="{{ trans('cruds.phone') }}">
                      @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                  </div>
              
                  <div class="form-group col-6">
                      <label>{{ trans('cruds.internal_phone') }}</label>
                      <input type="text" name="internal_phone" class="form-control" value="{{ $tender->internal_phone }}" placeholder="{{ trans('cruds.internal_phone') }}">
                      @error('internal_phone')<div class="text-danger">{{ $message }}</div>@enderror
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
@include('includes.select2')
@section('scripts')
    
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

