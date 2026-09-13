@extends('layouts.master')

@section('content')
@include('includes.header_without_input', ['item' => trans('cruds.view') .' '. $item->log_name, 'page' => 'units'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5>Activity Log - {{ $item->log_name }}</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ trans('cruds.activity') }}</th>
                                <td>{{ $item->log_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.event') }}</th>
                                <td>{{ $item->event }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.user') }}</th>
                                <td>{{ $item->causer ? $item->causer->name : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.description') }}</th>
                                <td>{{ $item->description }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.created_at') }}</th>
                                <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

