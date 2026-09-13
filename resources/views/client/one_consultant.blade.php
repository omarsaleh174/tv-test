@extends('client.layout.client')

@section('content')
<section style="background-color: #eee;" @if(app()->getLocale() == 'ar') dir="rtl" @endif>
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a style="color:black" href="{{ route('welcome') }}">{{ trans('cruds.home') }}</a></li> /
                        <li class="breadcrumb-item"><a style="color:black" href="{{ route('all_consultants') }}">{{ trans('cruds.consultants') }}</a></li>
                        <li class="breadcrumb-item active"  style="color:#ffc451" aria-current="page">{!! $consultant->name !!}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(session()->has('message') )
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('message')}}
                    </div>
                @endif
    
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
                @if(Auth::guard('client')->check())  
                <div class="collapse" id="collapseExample" style="background-color: #f0f0f0;">
                    <div class="card card-body shadow-sm rounded-lg p-4">
                    <form action="{{ route('client.request_consultation') }}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="form-group col-md-12">
                            <label for="title" class="font-weight-bold">{{ trans('cruds.title') }}</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="{{ trans('cruds.title') }}" required>
                            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <input type="hidden" name="department_id" value="{{$consultant->department->id??null}}">
                        <input type="hidden" name="consultant_id" value="{{$consultant->id}}">
                        <div class="form-group col-md-12">
                            <label for="message" class="font-weight-bold">{{ trans('cruds.message') }}</label>
                            <textarea class="form-control" name="message" rows="7"  id="message" placeholder="{{ trans('cruds.message') }}" required>{{ old('message') }}</textarea>
                            @error('message')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <br><br>
                        </div>
                        <br><br>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block py-3 font-weight-bold">{{ trans('cruds.submit') }}</button>
                        </div>
                    </form>
                    </div>
                </div>          
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>  
            @endif

            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{$consultant->photo??url('settings/' . getSettingValue('logo')) }}" alt="{{$consultant->name }}"
                            class="rounded-circle img-fluid" style="width: 250px;">
                        <h5 class="my-3">{!! $consultant->name !!}</h5>
                        <p class="text-muted mb-4">{{ $consultant->title }}</p>
                        @if(Auth::guard('client')->check())  
                        <a class="btn btn-warning btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            {{ trans('cruds.request_consultation') }} </a><br><br>
                            @else
                            <a class="btn btn-warning btn-sm" href="{{ route('client.login') }}">{{ trans('cruds.request_consultation') }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        @foreach (['name', 'title', 'small_description', 'long_description', 'services', 'skills', 'email'] as $item)
						@if($item!=''||$item!=null)
						<div class="row">
							<div class="col-sm-3">
                                <p class="mb-0">{{ trans("cruds.$item") }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $consultant->$item }}</p>
                            </div>
                        </div>
						@endif
                        <hr>
						@endforeach
 
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">{{ trans('cruds.department') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $consultant->department->title??"" }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">{{ trans('cruds.country') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $consultant->country->title??"" }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">{{ trans('cruds.city') }}</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $consultant->city->title??"" }}</p>
                            </div>
                        </div>
                        <hr>
                        
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

