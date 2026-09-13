@extends('layouts.master')

@section('title')
Edit Promo Code
@endsection

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">
                        Edit Promo Code
                    </h4>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        action="{{ route('promo-codes.update', $promoCode->id) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="code">Promo Code</label>

                            <input
                                type="text"
                                name="code"
                                id="code"
                                class="form-control"
                                value="{{ old('code', $promoCode->code) }}"
                                required
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="discount_percentage">
                                Discount Percentage %
                            </label>

                            <input
                                type="number"
                                name="discount_percentage"
                                id="discount_percentage"
                                class="form-control"
                                min="1"
                                max="100"
                                step="0.01"
                                value="{{ old('discount_percentage', $promoCode->discount_percentage) }}"
                                required
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="max_usage">
                                Max Usage
                            </label>

                            <input
                                type="number"
                                name="max_usage"
                                id="max_usage"
                                class="form-control"
                                min="1"
                                value="{{ old('max_usage', $promoCode->max_usage) }}"
                                required
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label>
                                Used Count
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                value="{{ $promoCode->used_count }}"
                                disabled
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="expires_at">
                                Expiration Date
                            </label>

                            <input
                                type="date"
                                name="expires_at"
                                id="expires_at"
                                class="form-control"
                                value="{{ old('expires_at', $promoCode->expires_at ? \Carbon\Carbon::parse($promoCode->expires_at)->format('Y-m-d') : '') }}"
                                required
                            >
                        </div>

                        <div class="form-group mb-4">
                            <div class="form-check">

                                <input
                                    type="checkbox"
                                    name="is_active"
                                    id="is_active"
                                    class="form-check-input"
                                    value="1"
                                    {{ old('is_active', $promoCode->is_active) ? 'checked' : '' }}
                                >

                                <label
                                    for="is_active"
                                    class="form-check-label"
                                >
                                    Active
                                </label>

                            </div>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Update Promo Code
                        </button>

                        <a
                            href="{{ route('promo-codes.index') }}"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
