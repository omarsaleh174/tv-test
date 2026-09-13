@extends('layouts.master')

@section('title')
Add Promo Code
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Promo Code</h1>
            </div>

            <div class="col-sm-6 text-right">
                <a href="{{ route('promo-codes.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Create New Promo Code</h3>
    </div>

    <form action="{{ route('promo-codes.store') }}" method="POST">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Promo Code</label>
                <input type="text" name="code" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Discount Percentage</label>
                <input type="number" name="discount_percentage" class="form-control" min="1" max="100" required>
            </div>

            <div class="form-group">
                <label>Max Usage</label>
                <input type="number" name="max_usage" class="form-control" min="1" required>
            </div>

            <div class="form-group">
                <label>Expiration Date</label>
                <input type="date" name="expires_at" class="form-control" required>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_active" checked>
                    Active
                </label>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-success">
                Save Promo Code
            </button>
        </div>

    </form>

</div>

</section>

@endsection
