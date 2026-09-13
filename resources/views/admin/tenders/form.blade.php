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
                  <h3 class="card-title">{{ trans('cruds.add') }} {{trans('cruds.tenders') }}</h3>
                </div>
                <form action="{{route('tenders.store')}}" method="POST" enctype="multipart/form-data " >
                    @csrf
                    <div class="card-body row">

                      <div class="form-group col-6">
                          <label>{{ trans('cruds.tender_code') }}</label>
                          <input type="text" name="tender_code" class="form-control" value="{{ old('tender_code') }}" placeholder="{{ trans('cruds.tender_code') }}">
                          @error('tender_code')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.title') }}</label>
                          <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="{{ trans('cruds.title') }}">
                          @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.type') }}</label>
                          <select name="type_id" class="form-control">
                              <option value="">{{ trans('cruds.select_type') }}</option>
                              @foreach (App\Entities\Admin\Type::all() as $item)
                                  <option value="{{$item->id}}" {{ old('type_id') == $item->id ? 'selected' : '' }}>{{$item->title}}</option>
                              @endforeach
                          </select>
                          @error('type')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.publication_date') }}</label>
                          <input type="datetime" name="publication_date" class="form-control" value="{{ old('publication_date') }}" placeholder="{{ trans('cruds.publication_date') }}">
                          @error('publication_date')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.closing_date') }}</label>
                          <input type="text" name="closing_date" class="form-control" value="{{ old('closing_date') }}" placeholder="{{ trans('cruds.closing_date') }}">
                          @error('closing_date')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.opening_date') }}</label>
                          <input type="text" name="opening_date" class="form-control" value="{{ old('opening_date') }}" placeholder="{{ trans('cruds.opening_date') }}">
                          @error('opening_date')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.publisher_name') }}</label>
                          <input type="text" name="publisher_name" class="form-control" value="{{ old('publisher_name') }}" placeholder="{{ trans('cruds.publisher_name') }}">
                          @error('publisher_name')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.bid_docs_price') }}</label>
                          <input type="number" name="bid_docs_price" class="form-control" value="{{ old('bid_docs_price') }}" placeholder="{{ trans('cruds.bid_docs_price') }}">
                          @error('bid_docs_price')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.docs_sale_place') }}</label>
                          <input type="text" name="docs_sale_place" class="form-control" value="{{ old('docs_sale_place') }}" placeholder="{{ trans('cruds.docs_sale_place') }}">
                          @error('docs_sale_place')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.docs_sale_phone') }}</label>
                          <input type="text" name="docs_sale_phone" class="form-control" value="{{ old('docs_sale_phone') }}" placeholder="{{ trans('cruds.docs_sale_phone') }}">
                          @error('docs_sale_phone')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.reference') }}</label>
                          <input type="text" name="reference" class="form-control" value="{{ old('reference') }}" placeholder="{{ trans('cruds.reference') }}">
                          @error('reference')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.website_link') }}</label>
                          <input type="url" name="website_link" class="form-control" value="{{ old('website_link') }}" placeholder="{{ trans('cruds.website_link') }}">
                          @error('website_link')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.city') }}</label>
                          <select name="city_id" class="form-control">
                              <option value="">{{ trans('cruds.select_city') }}</option>
                              @foreach (App\Entities\Admin\City::all() as $city)
                              <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                              @endforeach
                          </select>
                          @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.category') }}</label>
                          <select name="category_id" class="form-control">
                              <option value="">{{ trans('cruds.select_category') }}</option>
                              @foreach(App\Entities\Admin\Category::all() as $category)
                                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                              @endforeach
                          </select>
                          @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.country') }}</label>
                          <select name="country_id" class="form-control">
                              <option value="">{{ trans('cruds.select_country') }}</option>
                              @foreach(App\Entities\Admin\Country::all() as $country)
                                  <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->title }}</option>
                              @endforeach
                          </select>
                          @error('country_id')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.submission_place') }}</label>
                          <input type="text" name="submission_place" class="form-control" value="{{ old('submission_place') }}" placeholder="{{ trans('cruds.submission_place') }}">
                          @error('submission_place')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.phone') }}</label>
                          <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="{{ trans('cruds.phone') }}">
                          @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                  
                      <div class="form-group col-6">
                          <label>{{ trans('cruds.internal_phone') }}</label>
                          <input type="text" name="internal_phone" class="form-control" value="{{ old('internal_phone') }}" placeholder="{{ trans('cruds.internal_phone') }}">
                          @error('internal_phone')<div class="text-danger">{{ $message }}</div>@enderror
                      </div>
                      <button type="submit" class="btn btn-primary">{{ trans('cruds.submit') }}</button>
                  
                    </div>
                  </form>
                </div>
        </div>
      </div>
    </div>
  </div>
  
