@extends('layouts.master')
@section('content')
@include('includes.header_index',['item'=>'notifications'])
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ trans('cruds.id') }}</th>
                        <th>{{ trans('cruds.title') }}</th>
                        <th>{{ trans('cruds.photo') }}</th>
                        <th>{{ trans('cruds.body') }}</th>
                        <th>{{ trans('cruds.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td> {{ $item->id ?? '' }}</td>
                            <td> {{ $item->title ?? '' }}</td>
                            <td> <img src="{{$item->photo}}" width="50" height="50"/></td>
                            <td> {{ $item->body ?? '' }}</td>
                            <td>
                                @canany(['admin', "delete notifications"])
                                <form method="POST" action="{{ route("notifications.destroy", $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit"  onclick="return confirm(&quot;Confirm delete?&quot;)"  class="btn  btn-sm btn-danger">   <span class="fe fe-trash"> </span>  </button>
                                </form>
                            @endcanany
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>{{ trans('cruds.id') }}</th>
                        <th>{{ trans('cruds.tutle') }}</th>
                        <th>{{ trans('cruds.photo') }}</th>
                        <th>{{ trans('cruds.body') }}</th>
                        <th>{{ trans('cruds.action') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('cruds.add') }} Notification</h3>
                    </div>
                    <form action="{{ route('notifications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" required class="form-control" name="title" placeholder="Title">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ trans('cruds.body') }}</label>
                                <input type="text" required class="form-control" name="body" placeholder="Body">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label >{{trans('cruds.photo')}}</label>
                                <input type="file" class="form-control" name="photo">
                                <label class="" for="photo">{{trans('cruds.choose')}} {{trans('cruds.photo')}} </label>
                                @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ trans('cruds.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ trans('cruds.add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

