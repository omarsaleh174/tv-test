@extends('client.layout.client')

@section('content')
<section style="background-color: #eee;" @if(app()->getLocale() == 'ar') dir="rtl" @endif>
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ trans('cruds.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.tenders') }}">{{ trans('cruds.tenders') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $tender->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{asset('images/settings/' . getSettingValue('logo'))}}" alt="{{ trans('cruds.tender_image') }}"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $tender->title }}</h5>
                        <p class="text-muted mb-1">{{ $tender->typeData->title??"" }}</p>
                        <p class="text-muted mb-4">{{ $tender->publisher_name }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        @foreach (['title','tender_code', 'closing_date', 'opening_date','publisher_name', 'bid_docs_price', 'docs_sale_place', 'docs_sale_phone', 'reference', 'website_link', 'submission_place', 'phone', 'internal_phone'] as $item)
						@if($item!=''||$item!=null)
						<div class="row">
							<div class="col-sm-3">
                                <p class="mb-0">{{ trans("cruds.$item") }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $tender->$item }}</p>
                            </div>
                        </div>
						@endif
                        <hr>
						@endforeach
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">{{ trans('cruds.country') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $tender->country->title??"" }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">{{ trans('cruds.type') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $tender->typeData->title??"" }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">{{ trans('cruds.category') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
									@foreach ($tender->categories as $category)
									<button  class="btn"  >{{ $category->title??"" }}</button> 
									@endforeach
								</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

