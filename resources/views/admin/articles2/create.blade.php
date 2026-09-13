
@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>{{ trans('cruds.post') }}</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">{{ trans('cruds.home') }}</a>
            </li>
            <li class="breadcrumb-item active">{{ trans('cruds.post') }}</li>
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
                    <style>
                        .tags_ar {  background: none repeat scroll 0 0 #fff;  border: 1px solid #ccc;
                        display: table;  padding: 0.5em;  width: 100%;}
                        .tags_ar li.tagAdd , .tags_ar li.addedTag {  float: left;  margin-left: 0.25em;  margin-right: 0.25em;}
                        .tags_ar li.addedTag {  background: none repeat scroll 0 0 #1ABC9C;
                        border-radius: 5px;  color: #fff;
                        padding: .5em;}
                        .tags_ar input,li.addedTag {  border: 1px solid transparent;  border-radius: 5px;  box-shadow: none;  display: block;  padding: 0.5em;}
                        .tags_ar input:hover { border: 1px solid #000; }
                    </style>
                     <style>
                        .tags_en {  background: none repeat scroll 0 0 #fff;  border: 1px solid #ccc;
                        display: table;  padding: 0.5em;  width: 100%;}
                        .tags_en li.tagAdd , .tags_en li.addedTag {  float: left;  margin-left: 0.25em;  margin-right: 0.25em;}
                        .tags_en li.addedTag {  background: none repeat scroll 0 0 #1ABC9C;
                        border-radius: 5px;  color: #fff;
                        padding: .5em;}
                        .tags_en input,li.addedTag {  border: 1px solid transparent;  border-radius: 5px;  box-shadow: none;  display: block;  padding: 0.5em;}
                        .tags_en input:hover { border: 1px solid #000; }
                        span.tagRemove {  cursor: pointer;  display: inline-block;  padding-left: 0.5em;}
                        span.tagRemove:hover { color: #222222; }

                    </style>
                    <div class="card card-info  ">
                        <div class="card-header">
                            <h3 class="card-title"> @isset($item->id){{ trans('cruds.edit')}} @else {{trans('cruds.add') }} @endisset {{trans('cruds.post')}}</h3>
                        </div>
                        @isset($item->id)
                        <form method="post"class="form-horizontal"  action="{{ route('posts.update',$item->id) }}" enctype="multipart/form-data">
                            @method('put')
                        @else
                            <form method="post"class="form-horizontal"  action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @endisset

                        @csrf
                            <div class="card-body row">
                                    <div class="col-6">
                                        {!! input(['name'=>'title_en','type'=>'text','class'=>'','label'=>'title_en','value'=>$item->title_en??old('title_en'),'class_input'=>''],$errors->toArray()['title_en']??'')!!}
                                        <div class="form-group m-1 ">
                                            <label   >{{ trans('cruds.tags_en') }}</label>
                                            <div class="col-sm-12">
                                                <ul class="tags_en">
                                                    @isset($item)
                                                        
                                                    @if(is_array($item->tags_en))
                                                    @foreach ($item->tags_en as $tag)
                                                    <li class="addedTag">{{ $tag }}<span class="tagRemove" onclick="$(this).parent().remove();">x</span><input type="hidden" value="{{ $tag }}" name="tags_en[]"></li>
                                                    @endforeach
                                                    @endif
                                                    @endisset
                                                     <li class="tagAdd2 taglist2">
                                                    <input type="text" id="tags_en-field">
                                                    </li>
                                                </ul>
                                            </div>
                                            @error('tags_en')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        {!! input(['name'=>'sub_desc_en','type'=>'text','class'=>'','label'=>'sub_desc_en','value'=>$item->sub_desc_en??old('sub_desc_en'),'class_input'=>''],$errors->toArray()['sub_desc_en']??'')!!}
                                        {!! text_editor(['name'=>'desc_en' ,'label'=>'desc_en', 'value'=>$item->desc_en??old('desc_en') ,'errors'=>$errors->toArray()['desc_en']??''  ])!!}                                               
                                        {{-- {!! input(['name'=>'meta_keywords','type'=>'text','class'=>'','label'=>'meta_keywords','value'=>$item->meta_keywords??old('meta_keywords'),'class_input'=>''],$errors->toArray()['meta_keywords']??'')!!} --}}
                                        {!! input(['name'=>'photo','type'=>'file','class'=>'','label'=>'photo','value'=>'','class_input'=>''],$errors->toArray()['photo']??'')!!}
                                        @isset($item->photo)<img src="{{$item->photo??''}}"  sizes="150" width="150" height="150">@endisset 
                                </div>
                                    <div class="col-6">
                                        {!! input(['name'=>'title_ar','type'=>'text','class'=>'','label'=>'title_ar','value'=>$item->title_ar??old('title_ar'),'class_input'=>''],$errors->toArray()['title_ar']??'')!!}
                                        <div class="form-group m-1 ">
                                            <label   >{{ trans('cruds.tags_ar') }}</label>
                                            <div class="col-sm-12">
                                                <ul class="tags_ar">
                                                    @isset($item)
                                                        
                                                    @if(is_array($item->tags_ar))
                                                    @foreach ($item->tags_ar as $tag)
                                                    <li class="addedTag">{{ $tag }}<span class="tagRemove" onclick="$(this).parent().remove();">x</span><input type="hidden" value="{{ $tag }}" name="tags_ar[]"></li>
                                                    @endforeach
                                                    @endif
                                                    @endisset

                                                    <li class="tagAdd2 taglist2">
                                                    <input type="text" id="tags_ar-field">
                                                    </li>
                                                </ul>
                                            </div>
                                            @error('tags_ar')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>                          
                                       {!! input(['name'=>'sub_desc_ar','type'=>'text','class'=>'','label'=>'sub_desc_ar','value'=>$item->sub_desc_ar??old('sub_desc_ar'),'class_input'=>''],$errors->toArray()['sub_desc_ar']??'')!!}
                                        {!! text_editor(['name'=>'desc_ar' ,'label'=>'desc_ar', 'value'=>$item->desc_ar??old('desc_ar') ,'errors'=>$errors->toArray()['desc_ar']??''  ])!!}      
                                        {{-- {!! input(['name'=>'meta_description','type'=>'text','class'=>'','label'=>'meta_description','value'=>$item->meta_description??old('meta_description'),'class_input'=>''],$errors->toArray()['meta_description']??'')!!} --}}
                                        {!!  select(['label'=>'type','name'=>'type','view_data'=>'type','value'=>$item->type??old('type'),'items'=>[ ['id'=>1,'type'=>'main'],['id'=>2,'type'=>'sub']],'errors'=>$errors->toArray()['type']??''] )  !!}
                                        {!!  select(['label'=>'writer','name'=>'writer_id','view_data'=>'name_en','value'=>$item->writer_id??old('writer'),'items'=>App\Entities\Admin\Writer::all(),'errors'=>$errors->toArray()['writer']??''] )  !!}

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
@section('js')
<script> $(document).ready(function() {$('#addTagBtn').click(function() {$('#tags_en option:selected').each(function() {$(this).appendTo($('#selectedtags_en'));});});    $('#removeTagBtn').click(function() {$('#selectedtags_en option:selected').each(function(el) {$(this).appendTo($('#tags_en'));});});    $('.tagRemove').click(function(event) {event.preventDefault();$(this).parent().remove();});    $('ul.tags_en').click(function() {$('#tags_en-field').focus();});    $('#tags_en-field').keypress(function(event) {if (event.which == '32') {    if ($(this).val() != '') {$('<li class="addedTag">' + $(this).val() + '<span class="tagRemove" onclick="$(this).parent().remove();">x</span><input type="hidden" value="' + $(this).val() + '" name="tags_en[]"></li>').insertBefore('.tags_en .tagAdd2');$(this).val('');}}});});</script>
<script> $(document).ready(function() {$('#addTagBtn').click(function() {$('#tags_ar option:selected').each(function() {$(this).appendTo($('#selectedtags_ar'));});});    $('#removeTagBtn').click(function() {$('#selectedtags_ar option:selected').each(function(el) {$(this).appendTo($('#tags_ar'));});});    $('.tagRemove').click(function(event) {event.preventDefault();$(this).parent().remove();});    $('ul.tags_ar').click(function() {$('#tags_ar-field').focus();});    $('#tags_ar-field').keypress(function(event) {if (event.which == '32') {    if ($(this).val() != '') {$('<li class="addedTag">' + $(this).val() + '<span class="tagRemove" onclick="$(this).parent().remove();">x</span><input type="hidden" value="' + $(this).val() + '" name="tags_ar[]"></li>').insertBefore('.tags_ar .tagAdd2');$(this).val('');}}});});</script>

<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}">
</script>
<script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}">
</script>
<script>
    $(function () {
    // Summernote
    $('.summernote').summernote()
     CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
    })
</script>

@endsection
@endsection

