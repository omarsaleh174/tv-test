@extends('layouts.master')
@section('content')
<section class="page-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ trans('cruds.roles') }}</h1>
        </div>
      </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card">
                    <form method="post" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                    
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>{{ trans('cruds.create_role') }}</h4>
                            </div>
                            <div class="card-body">
                    
                                <!-- Role Name Input -->
                                <div class="form-group">
                                    <label for="name">{{ trans('cruds.name') }}</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="{{ trans('cruds.name') }}" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <!-- Permissions Selection -->
                                <div class="form-group">
                                    <label>{{ trans('cruds.permissions') }}</label>
                                    <div class="row">
                                        @foreach ($permissions as $item)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $item->id }}" id="permission-{{ $item->id }}">
                                                    <label class="form-check-label" for="permission-{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('cruds.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
</section>
@endsection

