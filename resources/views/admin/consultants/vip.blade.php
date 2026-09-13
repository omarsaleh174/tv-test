@extends('layouts.master')

@section('content')
    @include('includes.header_without_input', ['item' => trans('cruds.vip_consultants'), 'page' => 'vip_consultant'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('vip-consultants.update') }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ trans('cruds.name') }}</th>
                                        <th>{{ trans('cruds.email') }}</th>
                                        <th>{{ trans('cruds.is_visible_on_home') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultants as $consultant)
                                        <tr>
                                            <td>{{ $consultant->name }}</td>
                                            <td>{{ $consultant->email }}</td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input 
                                                        type="checkbox" 
                                                        name="consultants[{{ $consultant->id }}]" 
                                                        class="custom-control-input" 
                                                        id="consultant-{{ $consultant->id }}" 
                                                        {{ $consultant->is_visible_on_home ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="consultant-{{ $consultant->id }}"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-success">{{ trans('crud.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

