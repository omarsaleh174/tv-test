@extends('layouts.master')
@section('content')
<div class="page-header">
  <h1 class="page-title">{{ trans('cruds.setting') }}</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ trans("cruds.settings" ) }}</li>
</ol>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="card-body row">
                  <div class="form-group  col-6">
                      <label >{{trans('cruds.name')}}</label>
                      <input type="text" required class="form-control" name="name"value="{{$settings['name']??""}}" placeholder="{{trans('cruds.name')}}">
                      @error('name')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                  <div class="form-group  col-6">
                    <label >{{trans('cruds.phone')}}</label>
                    <input type="text" required class="form-control" name="phone"value="{{$settings['phone']??""}}" placeholder="{{trans('cruds.phone')}}">
                    @error('phone')<div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group  col-6">
                    <label >{{trans('cruds.email')}}</label>
                    <input type="email" required class="form-control" name="email"value="{{$settings['email']??""}}" placeholder="{{trans('cruds.email')}}">
                    @error('email')<div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="form-group  col-6">
                    <label for="day">   Ø§Ø±Ø³Ø§Ù„ Ø§Ù„Ø±Ø³Ø§Ù„Ø© Ù„ÙŠ:</label>
                    <select id="is_free" name="is_free" class="form-control" required>
                      <option value="0" {{$settings['is_free'] == 0? 'selected':""}}>Ø§Ù„Ù…Ø´ØªØ±ÙƒÙŠÙ† ÙÙ‚Ø·  </option>
                      <option value="1" {{$settings['is_free'] == 1? 'selected':""}}>ÙƒÙ„ Ø§Ù„Ø¹Ù…Ù„Ø§Ø¡ </option>
                    </select>               
                    @error('is_free')<div class="text-danger">{{ $message }}</div> @enderror
                </div>              

                <div class="form-group  col-6">
                  <label >{{trans('cruds.latitude')}}</label>
                  <input type="latitude" required class="form-control" name="latitude" value="{{$settings['latitude']??""}}" placeholder="{{trans('cruds.latitude')}}">
                  @error('latitude')<div class="text-danger">{{ $message }}</div> @enderror
              </div>

              <div class="form-group  col-6">
                  <label >{{trans('cruds.longitude')}}</label>
                  <input type="longitude" required class="form-control" name="longitude"value="{{$settings['longitude']??""}}" placeholder="{{trans('cruds.longitude')}}">
                  @error('longitude')<div class="text-danger">{{ $message }}</div> @enderror
              </div>

                <div class="form-group  col-6">
                  <label >{{trans('cruds.logo')}}</label>
                  <input type="file"  class="form-control" name="logo"placeholder="{{trans('cruds.logo')}}">
                  @error('logo')<div class="text-danger">{{ $message }}</div> @enderror
                  @if(getSettingValue('logo'))
                  <br><br>
                  <img src="{{asset('images/settings/' . getSettingValue('logo'))}}" width="100" height="100">
                  @endif
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">{{ trans('cruds.add') }}</button>                  
          </div>
        </form>

        <form action="{{route('settings.date.store')}}" method="POST" enctype="multipart/form-data" >
          @csrf
          <div class="card-body row">
              <div class="form-group  col-6">
                <label for="day">Ø¹Ø¯Ø¯ Ø§Ù„Ø£ÙŠØ§Ù… Ø­ØªÙ‰ Ø§Ù„Ø¥Ø±Ø³Ø§Ù„:</label>
                <select id="day_send_tender" name="day_send_tender" class="form-control" required>
                  <option value="0" {{getSendDate('day_send_tender')== 0? 'selected':""}}>Ø§Ù„ÙŠÙˆÙ… </option>
                  <option value="1" {{getSendDate('day_send_tender')== 1 ? 'selected':""}}>Ø§Ù„ÙŠÙˆÙ… Ø§Ù„ØªØ§Ù„ÙŠ</option>
                  <option value="2" {{getSendDate('day_send_tender')== 2 ? 'selected':""}}>Ø¨Ø¹Ø¯ ÙŠÙˆÙ…ÙŠÙ†</option>
                  <option value="3" {{getSendDate('day_send_tender')== 3 ? 'selected':""}}>Ø¨Ø¹Ø¯ 3 Ø£ÙŠØ§Ù…</option>
                  <option value="4" {{getSendDate('day_send_tender')== 4 ? 'selected':""}}>Ø¨Ø¹Ø¯ 4 Ø£ÙŠØ§Ù…</option>
                  <option value="5" {{getSendDate('day_send_tender')== 5 ? 'selected':""}}>Ø¨Ø¹Ø¯ 5 Ø£ÙŠØ§Ù…</option>
                  <option value="6" {{getSendDate('day_send_tender')== 6 ? 'selected':""}}>Ø¨Ø¹Ø¯ 6 Ø£ÙŠØ§Ù…</option>
                  <option value="7" {{getSendDate('day_send_tender')== 7 ? 'selected':""}}>Ø¨Ø¹Ø¯ Ø£Ø³Ø¨ÙˆØ¹</option>
                </select>               
                @error('day_send_tender')<div class="text-danger">{{ $message }}</div> @enderror
            </div>
              <div class="form-group  col-6">
                <label for="time">Ø§Ù„ÙˆÙ‚Øª Ø§Ù„Ù…Ø­Ø¯Ø¯ Ù„Ù„Ø¥Ø±Ø³Ø§Ù„ (Ø§Ù„Ø³Ø§Ø¹Ø©:Ø§Ù„Ø¯Ù‚ÙŠÙ‚Ø©):</label>
                <input type="time" id="time_send_tender" name="time_send_tender" value="{{getSendDate('time_send_tender') ??0}}"   required class="form-control">
                  @error('time_send_tender')<div class="text-danger">{{ $message }}</div> @enderror
              </div>
            

        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary">{{ trans('cruds.add') }}</button>                  
        </div>
      </form>

      </div>
    </div>
  </div>
</div>
@endsection
