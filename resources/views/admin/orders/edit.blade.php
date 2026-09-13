@extends('layouts.master')

@section('content')

<section class="page-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ trans('cruds.orders') }}</h1>
        </div>
    <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('cruds.orders') }}</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="card card-primary">
                    <div class="card-header">
                     <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.orders')}}</h3>
                    </div>
                    <form method="post" action="{{ route('orders.update',$order->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="price">{{trans('cruds.price')}}</label>
                                <input type="text" class="form-control" name="price" value="{{$order->price??''}}">
                                @error('price')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="type">{{trans('cruds.type')}}</label>
                                <select name="type" class="form-control">
                                    <option value="">{{trans('cruds.type')}}</option>

                                    @foreach ($order->allType as $key => $value)
                                        <option value="{{ $key }}" {{ $order->type==$key?"selected":''  }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('type')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="delivery_type">{{trans('cruds.delivery_type')}}</label>
                                <select name="delivery_type" class="form-control">
                                        <option value="">{{trans('cruds.delivery_type')}}</option>
                                    @foreach ($order->delivery_type as $key => $value)
                                        <option value="{{ $key }}" {{ $order->delivery_type==$key?"selected":''  }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('delivery_type')<div class="text-danger">{{ $message }}</div> @enderror
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
</div>
</section>
@endsection

