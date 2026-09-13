@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $client->title_en, 'page' => 'clients'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            
                <div class="row">

{{-- 
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-success img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">{{ $client->wallet}}</h2>
                                        <p class="text-white mb-0">{{ trans('cruds.wallet')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            @foreach (['id','company_name','name','phone','phone_2','email'
                            ,'whatsapp','my_gender','created_at','start_subscription','end_subscription'] as $item)
                                @if($item!=null ||$item!='')
                                    <tr>
                                        <th>{{ trans("cruds.$item") }}</th>
                                        <td>{{ $client->$item }}</td>
                                    </tr>
                                @endif
                            @endforeach
                             @if($client->subscription)
                             <tr>
                                <th>{{ trans('cruds.subscription') }}</th>
                                <td>{{ $client->subscription->title??"" }}</td>
                            </tr>
                            @endif
                            @if($client->country)
                            <tr>
                                <th>{{ trans('cruds.country') }}</th>
                                <td>{{ $client->country->title??"" }}</td>
                            </tr>
                            @endif
                            @if($client->city)
                            <tr>
                                <th>{{ trans('cruds.city') }}</th>
                                <td>{{ $client->city->title??"" }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>{{ trans('cruds.status') }}</th>
                                <td class="center">
                                    @if ($client->active == 1)
                                        <svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16"> <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z" />
                                        </svg>
                                    @else
                                        <svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"> <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                        </svg>
                                    @endif
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.photo') }}</th>
                                <td> <img src="{{$client->photo??''}}"  sizes="150" width="150" height="150"></td>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

