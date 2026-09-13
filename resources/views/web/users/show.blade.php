@extends('layouts.master')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary mb-4 "
                    data-bs-toggle="modal"data-bs-target="#modal-lg">{{ trans('cruds.assign_role') }}</button>
            </div>
            @include('includes.errors')
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans("cruds.roles") }}</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('cruds.id') }}</th>
                                    <td>{{ $user->id }}</td>
                                </tr>

                                <tr>
                                    <th>{{ trans('cruds.name') }}</th>
                                    <td>{{ $user->name }}</td>
                                </tr>


                                <tr>
                                    <th>{{ trans('cruds.email') }}</th>
                                    <td>{{ $user->email }}</td>
                                </tr>


                                <tr>
                                    <th>{{ trans('cruds.phone') }}</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>

                                <tr>
                                    <th>{{ trans('cruds.role') }}</th>
                                    <td>{{ $user->roles->first()->name ?? ' ' }}</td>
                                </tr>

                                <tr>
                                    <th>{{ trans('cruds.suspend') }}</th>
                                    <td class="center">
                                        @if ($user->active == 1)
                                            <svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z" />
                                            </svg>
                                        @else
                                            <svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                            </svg>
                                        @endif
                                </tr>
                                <tr>
                                    <th>{{ trans('cruds.created_at') }}</th>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>{{ trans('cruds.photo') }}</th>
                                    <td> <img src="{{$user->photo??''}}"  sizes="150" width="150" height="150"></td>
                                </tr> --}}

                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
                  <h3 class="card-title">{{ trans('cruds.add') }} {{trans('cruds.type') }}</h3>
                </div>
                <form action="{{route('post.user.assign.role',$user->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    {!! select([ 'label' => 'role', 'name' => 'role_id', 'view_data' => 'name', 'value' => $user->roles->first()->id ?? old('role_id'), 'items' =>  Spatie\Permission\Models\Role::all(), 'errors' => $errors->toArray()['role_id'] ?? '', ]) !!}


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
  
