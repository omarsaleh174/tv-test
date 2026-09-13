@extends('layouts.master')
@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.edit') .' '. $role->name, 'page' => 'roles'])
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{trans('cruds.add')}} {{trans('cruds.role')}}</h3>
            </div>
            <form method="post" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <!-- Ø§Ø³Ù… Ø§Ù„Ø¯ÙˆØ± -->
                    <div class="col-12 mb-4">
                        <label for="name">{{ trans('cruds.name') }}</label>
                        <input type="text" value="{{ $role->name }}" class="form-control" name="name" placeholder="{{ trans('cruds.name') }}" id="name">
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <!-- Ø§Ù„ØµÙ„Ø§Ø­ÙŠØ§Øª -->
                    <div class="form-group mb-4">
                        <label>{{ trans('cruds.permissions') }}</label>
                        <div class="col-12">
                            <div class="row">
                                @foreach ($permissions as $item)
                                    <div class="col-md-4 mb-2">
                                        <input 
                                            {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }}
                                            style="display: inline; margin-right: 5px;" 
                                            type="checkbox" 
                                            name="permissions[]" 
                                            value="{{ $item->id }}" 
                                            id="permission-{{ $item->id }}"
                                        >
                                        <label for="permission-{{ $item->id }}">{{ $item->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('permissions')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            
                <!-- Ø²Ø± Ø§Ù„Ø¥Ø±Ø³Ø§Ù„ -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('cruds.submit') }}</button>
                </div>
            </form>
                    </div>
    </div>
    </div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    $(".parent").click(function(){

        if($(this).val()=='admin')
        $( 'input[type=checkbox]' ).prop( "checked" ,$(this).prop( "checked"));

    else
        $( "."+$(this).val() ).click();

    });
        
</script>

@endsection
 
