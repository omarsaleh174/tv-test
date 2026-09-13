@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $tender->title_en, 'page' => 'tenders'])

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" >
                  <thead>
                    @foreach (['id','tender_code', 'title', 'publication_date', 'closing_date', 'opening_date', 'publisher_name', 'bid_docs_price', 'docs_sale_place', 'docs_sale_phone', 'reference', 'website_link', 'submission_place', 'phone', 'internal_phone','created_at'] as $item)
                        @if($item!=null ||$item!='')
                            <tr>
                                <th>{{ trans("cruds.$item") }}</th>
                                <td>{{ $tender->$item }}</td>
                            </tr>
                        @endif
                    @endforeach

                    @if($tender->typeData)
                    <tr>
                        <th>{{ trans('cruds.type') }}</th>
                        <td><a href="{{ route('types.show',$tender->type) }}" target="_blank" >{{ $tender->typeData->title??"" }}</a></td>
                    </tr>
                    @endif
                    @if($tender->country)
                    <tr>
                        <th>{{ trans('cruds.country') }}</th>
                        <td><a href="{{ route('countries.show',$tender->country_id) }}" target="_blank" >{{ $tender->country->title??"" }}</a></td>
                    </tr>
                    @endif
                    @if($tender->city)
                    <tr>
                        <th>{{ trans('cruds.city') }}</th>
                        <td><a href="{{ route('cities.show',$tender->city_id) }}" target="_blank" >{{ $tender->city->title??"" }}</a></td>
                    </tr>
                    @endif
                    @if($tender->categories)
                    <tr>
                        <th>{{ trans('cruds.categories') }}</th>
                        <td>
                        
                            @foreach ($tender->categories as $category)
                            <a  class="btn btn-primary" href="{{ route('categories.show',$category->id) }}" target="_blank" >{{ $category->title??"" }}</a>
                              
                            @endforeach
                        
                        </td>
                    </tr>
                    @endif
                  </thead>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
  @endsection

