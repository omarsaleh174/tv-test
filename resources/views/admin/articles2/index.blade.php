@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      {!! index_header('articles') !!}
      {!! filter(  [["name"=>"title_en","type"=>"text","label"=>"title_en","value"=>request("title_en")],["name"=>"name","type"=>"text","label"=>"name","value"=>request("name")]],'articles') !!}



    </div>
  </div>  
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-body">
          <div class="row">
            <div  class="FormExtended col-11">          
              <h4> {{ trans('cruds.articles') }}</h4>  
            </div>
            <div class="col-1">
              @canany(['admin','add_articles'])
                <a href="{{route('articles.create')}}" class="btn btn-block btn-primary ">{{ trans('cruds.add') }} {{trans('cruds.new') }}</a>
              @endcanany
            </div>
          </div>
          <hr>
          <div class="card-body">            
            {!!table($items,['id','title_en','title_ar'],'articles',['view','edit', 'active', 'display_order'])!!} 
              <br>
              {{ $items->appends(request()->except('page')) }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  @endsection

