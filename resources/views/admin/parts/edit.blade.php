@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $part->title_en, 'page' => 'parts'])
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card card-primary card-body">
              <div class="card-header">
                <h3 class="card-title">{{trans('cruds.edit')}} {{trans('cruds.part')}}</h3>
              </div>
              <form method="post"  class="row" action="{{ route('parts.update',$part->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body col-12">
                      <div class="form-group">
                          <label>{{trans('cruds.title')}}</label>
                          <input type="text" class="form-control" name="title" value="{{$part->title??''}}">
                          @error('title')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                  </div>
                
                  @if($part->type!='file')
                  <div class="card-body col-12">
                      <div class="form-group">
                          <label>{{trans('cruds.value_en')}}</label>
                          <textarea id="summernote" name="value_en">{{$part->value_en??''}}</textarea>
                          @error('value_en')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                  </div>
                  <div class="card-body col-12">
                    <div class="form-group">
                        <label>{{trans('cruds.value_ar')}}</label>
                        <textarea id="summernote2" name="value_ar">{{$part->value_ar??''}}</textarea>
                        @error('value_ar')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                @else
                <div class="card-body col-12">
                    <div class="form-group">
                        <label>{{trans('cruds.value_en')}}</label>
                        <input type="file" class="form-control" name="value_en" >
                        @error('value_en')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="card-body col-12">
                  <div class="form-group">
                      <label>{{trans('cruds.value_ar')}}</label>
                      <input type="file" class="form-control" name="value_ar">
                      @error('value_ar')<div class="text-danger">{{ $message }}</div> @enderror
                  </div>
              </div>
                @endif
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{trans('cruds.submit')}}</button>
                </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
@section('js')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
      $(document).ready(function() {
    $('#summernote').summernote();
  });

      $(document).ready(function() {
    $('#summernote2').summernote();
  });
</script>
@endsection

