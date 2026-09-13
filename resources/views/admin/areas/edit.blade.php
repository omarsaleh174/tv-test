@extends('layouts.master')

@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $area->title_en, 'page' => 'areas'])

<div class="row">
  <div class="col-12">
    <div class="card">
      @if ($errors->any())
          @foreach ($errors->all() as $error)
              <div class="text-danger ">{{$error}}</div>
          @endforeach
      @endif
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.area')}}</h3>
            </div>
            <form method="post" action="{{ route('areas.update',$area->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label>{{trans('cruds.name')}}</label>
                        <input type="text" class="form-control" name="name" value="{{$area->name??''}}">
                        @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                    <label > City</label>
                        <select class="form-control"  name="city_id" required>
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}"{{  $city->id==$area->city_id?'selected':''}} >{{$city->name}}</option>
                            @endforeach
                        </select>
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

