@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<script type="text/javascript" src="cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<section class="page-header">
    <div class="container-fluid">
      <div class="row mb-2">
    <div class="col-sm-6">
        </div>
      </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">About Us</h3>
                        </div>
                        <form method="post" action="{{ route('about-us.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">


                                    {!! input(['name'=>'facebook','type'=>'url','class'=>'','label'=>'Facebook','value'=>$about->facebook??'','class_input'=>''])!!}
                                        @error('facebook')<div class="text-danger">{{ $message }}</div> @enderror

                                    {!! input(['name'=>'instagram','type'=>'url','class'=>'','label'=>'instagram','value'=>$about->instagram??'','class_input'=>''])!!}
                                        @error('instagram')<div class="text-danger">{{ $message }}</div> @enderror

                                    {!! input(['name'=>'whatsapp','type'=>'text','class'=>'','label'=>'whatsapp','value'=>$about->whatsapp??'','class_input'=>''])!!}
                                        @error('whatsapp')<div class="text-danger">{{ $message }}</div> @enderror

                                    {!! input(['name'=>'gmail','type'=>'email','class'=>'','label'=>'gmail','value'=>$about->gmail??'','class_input'=>''])!!}
                                        @error('gmail')<div class="text-danger">{{ $message }}</div> @enderror

                                    {!! input(['name'=>'latitude','type'=>'text','class'=>'','label'=>'latitude','value'=>$about->latitude??'','class_input'=>''])!!}
                                        @error('latitude')<div class="text-danger">{{ $message }}</div> @enderror
                                        
                                        
                                    {!! input(['name'=>'longitude','type'=>'text','class'=>'','label'=>'longitude','value'=>$about->longitude??'','class_input'=>''])!!}
                                        @error('longitude')<div class="text-danger">{{ $message }}</div> @enderror

                                    {!! input(['name'=>'phone','type'=>'text','class'=>'','label'=>'phone','value'=>$about->phone??'','class_input'=>''])!!}
                                        @error('phone')<div class="text-danger">{{ $message }}</div> @enderror

                                    {!! textarea(['name'=>'address','class'=>'','label'=>'Address ','value'=>$about->address??'','class_input'=>''])!!}
                                        @error('address')<div class="text-danger">{{ $message }}</div> @enderror


                                    {!! textarea(['name'=>'about_us','class'=>'','label'=>'About Us ','value'=>$about->about_us??'','class_input'=>''])!!}
                                        @error('about_us')<div class="text-danger">{{ $message }}</div> @enderror


                                    {!! textarea(['name'=>'our_vision','class'=>'','label'=>'Our Vision ','value'=>$about->our_vision??'','class_input'=>''])!!}
                                        @error('our_vision')<div class="text-danger">{{ $message }}</div> @enderror



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



{{--  <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>  --}}
<script>
    {{--  $(document).ready(function() {
        $('#summernote').summernote();
      });
  --}}
</script>
 @endsection

