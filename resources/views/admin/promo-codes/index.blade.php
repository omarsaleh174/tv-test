@extends('layouts.master')

@section('title')
Promo Codes
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Promo Codes</h1>
            </div>

            <div class="col-sm-6 text-right">
                <a href="{{ route('promo-codes.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Promo Code
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">

<div class="card">

    <div class="card-header">
        <h3 class="card-title">All Promo Codes</h3>
    </div>

    <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Discount %</th>
                    <th>Max Usage</th>
                    <th>Used</th>
                    <th>Expires</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

            @foreach($promoCodes as $promo)

                <tr>

                    <td>{{ $promo->id }}</td>

                    <td>{{ $promo->code }}</td>

                    <td>{{ $promo->discount_percentage }} %</td>

                    <td>{{ $promo->max_usage }}</td>

                    <td>{{ $promo->used_count }}</td>

                    <td>{{ $promo->expires_at }}</td>

                    <td>

                        @if($promo->is_active)

                            <span class="badge badge-success">Active</span>

                        @else

                            <span class="badge badge-danger">Inactive</span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('promo-codes.edit',$promo->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('promo-codes.destroy',$promo->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this promo code?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</section>

@endsection
