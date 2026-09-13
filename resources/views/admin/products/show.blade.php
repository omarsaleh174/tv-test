@extends('layouts.master')
@section('content')
@include('includes.header_without_input',['item'=>$product->title_en,'page'=>'products'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-0 pb-5">
                <div class="user-top">
                    <div class="row align-items-center">
                        <div class="user-profile col-md-2">
                            @if($product->photo)
                            <div class="profile-img">
                                <img class="profile-pic" src="{{$product->photo??''}}" alt="image">    
                            </div>
                            @endif
                        </div>
                        <div class="user-title col-md-7">
                            <h4 class="card-title"> {{ trans('cruds.product') }}  {{ trans('cruds.details') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="user-detail" role="tabpanel">
                    <div class="panel-body tabs-menu-body p-5">
                        <div class="tab-content">
    
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        @foreach (['id','title_en','title_ar','price','real_price','code','amount','description_en','description_ar','created_at'] as $data) 
                                        <tr>
                                            <td class="fw-bold" style="color:blue">{{trans("cruds.$data")}}:</td>
                                            <td>{{$product->$data}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="fw-bold" style="color:blue">{{trans('status')}} :</td>
                                            @if($product->active==1)                                      
                                                <td>{{trans('cruds.suspend')}}</td>                                      
                                            @else
                                                <td>{{trans('cruds.unsuspend')}}</td>                                  
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="fw-bold" style="color:blue">{{trans('is_packaging')}} :</td>
                                            @if($product->is_packaging==1)
                                            <td class="btn btn-success">{{trans('cruds.yes')}}</td>
                                            @else
                                            <td class="btn btn-primary">{{trans('cruds.no')}}</td>
                                            @endif
                                        </tr>
                                            @foreach ([  ['country','countries'],  ['subCategory','sub-categories'],  ['unit','units'],  ['brand','brands'],  ['type','types'],  ['manufacture','manufactures']] as $item)
                                            @php($data=$item[0])
                                            @if($product->$data)
                                            <tr>
                                                <td class="fw-bold" style="color:blue">{{trans("cruds.$data")}}:</td>
                                                <td><a href="{{ route("$item[1].show",$product->$data->id) }}">
                                                    <span>{{$product->$data->title_en??''}}</span>
                                                </a>
                                            </td>
                                            @endif
                                            @endforeach                
                                        </tr>  
                                    </tbody>
                                </table>
                            </div>                                    
                            {{-- <div class="col-md-6">
                                <div class="col-group">
                                    <label for="" class="font-weight-bold">Rating :</label>
                                    <span><i class="fa fa-star" style="color:yellow"></i> 0.0</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                @if (count($product->reviews) > 0)
                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <h5>{{ trans('cruds.product') }} {{ trans('cruds.reviews') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ trans('cruds.client') }}</th>
                                <th>{{ trans('cruds.rate') }}</th>
                                <th>{{ trans('cruds.description') }}</th>
                                <th>{{ trans('cruds.date') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->reviews as $review)
                            <tr>
                                <td> <a href="{{ route('clients.show', $review->client->id ?? '0') }}">{{ $review->client->email ?? '' }}</a></td>
                                <td>{{ $review->rate }}  </td>
                                <td>{{ $review->description }}  </td>
                                <td>{{ $review->created_at }}  </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
  @endsection

