@extends('layouts.master')

@section('content')
<style>
    .btn-status {
        display: inline-block;
        padding: 4px 10px;
        border: 1px solid transparent;
        border-radius: 4px;
        color: #fff;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        font-size: 13px;
    }
    .btn-status-true {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-status-false {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>

@include('includes.header_without_input', ['item' => trans('cruds.orders'), 'page' => 'orders'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                {{-- Ø£Ø²Ø±Ø§Ø± Ø§Ù„ØªØ­ÙƒÙ… Ø¨Ø­Ø§Ù„Ø© Ø§Ù„Ø·Ù„Ø¨ --}}
                @if($order->type == 1 && $order->is_returned == 0)
                    <div class="mb-3 d-flex flex-wrap gap-1">
                        @if($order->status != 0)
                            <a href="{{ route('orders.status', $order->id) }}?status=0" class="btn btn-danger btn-sm">{{ trans('cruds.canceled') }}</a>
                        @endif
                        @if($order->status != 1)
                            <a href="{{ route('orders.status', $order->id) }}?status=1" class="btn btn-primary btn-sm">{{ trans('cruds.placed') }}</a>
                        @endif
                        @if($order->status != 2)
                            <a href="{{ route('orders.status', $order->id) }}?status=2" class="btn btn-primary btn-sm">{{ trans('cruds.confirmed') }}</a>
                        @endif
                        @if($order->status != 3)
                            <a href="{{ route('orders.status', $order->id) }}?status=3" class="btn btn-primary btn-sm">{{ trans('cruds.shipped') }}</a>
                        @endif
                        @if($order->status != 4)
                            <a href="{{ route('orders.status', $order->id) }}?status=4" class="btn btn-primary btn-sm">{{ trans('cruds.out_of_delivery') }}</a>
                        @endif
                        @if($order->status != 5)
                            <a href="{{ route('orders.status', $order->id) }}?status=5" class="btn btn-primary btn-sm">{{ trans('cruds.delivere') }}</a>
                        @endif
                    </div>
                @endif

                {{-- Ø²Ø± Ø§Ù„Ø¥Ø±Ø¬Ø§Ø¹ --}}
                @if($order->is_returned == 1)
                    <form method="POST" action="{{ route('orders.returned', $order->id) }}" style="display:inline">
                        @csrf
                        <button type="submit" onclick="return confirm('Ù‡Ù„ Ø£Ù†Øª ØªØ£ÙƒØ¯ Ù…Ù† ØªØ£ÙƒÙŠØ¯ Ø§Ù„Ø¥Ø±Ø¬Ø§Ø¹ØŸ')" class="btn btn-danger mb-3">
                            {{ trans('cruds.returned') }}
                        </button>
                    </form>
                @endif

                {{-- Ø¬Ø¯ÙˆÙ„ ØªÙØ§ØµÙŠÙ„ Ø§Ù„Ø·Ù„Ø¨ Ø§Ù„Ø±Ø¦ÙŠØ³ÙŠØ© --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">{{ trans('cruds.id') }}</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.customer') }}</th>
                                <td>
                                    <a href="{{ route('clients.show', $order->client->id ?? '0') }}">
                                        {{ $order->client->email ?? 'N/A' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.status') }}</th>
                                <td>
                                    @if ($order->is_returned == 1)
                                        <span class="btn btn-warning btn-sm">{{ trans('cruds.need_returned') }}</span>
                                    @elseif ($order->is_returned == 2)
                                        <span class="btn btn-danger btn-sm">{{ trans('cruds.returned') }}</span>
                                    @else
                                        <span class="{{ $order->status != 0 ? 'btn btn-primary btn-sm' : 'btn btn-danger btn-sm' }}">
                                            {{ trans('cruds.' . ($order->my_status ?? 'status')) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.is_paid') }}</th>
                                <td>
                                    <span class="btn-status {{ $order->is_paid ? 'btn-status-true' : 'btn-status-false' }}">
                                        {{ $order->is_paid ? 'Paid' : 'Unpaid' }} 
                                    </span>
                                    @if($order->is_paid == 0 && $order->type == 1)
                                        <a href="{{ route('orders.paid', $order->id) }}" class="btn btn-sm btn-link">{{ trans('cruds.make_it_paid') }}</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.paid_type') }}</th>
                                <td>
                                    <span class="btn btn-success btn-sm">
                                        {{ trans('cruds.' . ($order->myPaid ?? 'paid')) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.created_at') }}</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('cruds.address') }}</th>
                                <td>{{ $order->address->address ?? '-' }}</td>
                            </tr>

                            @if(!empty($order->coupon_id))
                            <tr>
                                <th>{{ trans('cruds.coupon') }}</th>
                                <td>
                                    <span class="badge bg-info text-white">{{ $order->coupon->code ?? '' }}</span> 
                                    (Ø®ØµÙ…: {{ $order->coupon->amount ?? 0 }})
                                </td>
                            </tr>
                            @endif

                            @if(!empty($order->points_add))
                            <tr>
                                <th>{{ trans('cruds.points') }}</th>
                                <td>{{ $order->points_add }}</td>
                            </tr>
                            @endif

                            @if(!empty($order->wallet_add))
                            <tr>
                                <th>{{ trans('cruds.wallet') }}</th>
                                <td>{{ $order->wallet_add }}</td>
                            </tr>
                            @endif

                            @if($order->donated == 1)
                            <tr>
                                <th>{{ trans('cruds.donated') }}</th>
                                <td>{{ trans('cruds.yes') }}</td>
                            </tr>
                            @endif

                            {{-- Ø±ÙØ¹ ÙˆØªØ­Ø¯ÙŠØ« Ø§Ù„ØµÙˆØ±Ø© --}}
                            <tr>
                                <th>{{ trans('cruds.photo') }}</th>
                                <td>
                                    @if ($order->photo)
                                        <img class="profile-pic rounded" src="{{ $order->photo }}" width="80" height="80" alt="Order Photo">
                                    @else
                                        <form action="{{ route('orders.photo', $order->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" name="photo" required>
                                                    @error('photo')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary btn-sm">{{ trans('cruds.add') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Ø¬Ø¯ÙˆÙ„ Ø§Ù„Ù…Ù†ØªØ¬Ø§Øª Ø§Ù„Ø­Ø³Ø§Ø¨Ø§Øª Ø§Ù„ØªÙØµÙŠÙ„ÙŠØ© --}}
                @if (isset($order->products) && count($order->products) > 0)
                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">{{ trans('cruds.products') }} {{ trans('cruds.details') }}</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ trans('cruds.id') }}</th>
                                        <th>{{ trans('cruds.name') }}</th>
                                        <th>{{ trans('cruds.price') }}</th>
                                        <th>{{ trans('cruds.amount') }}</th>
                                        <th>{{ trans('cruds.total') }}</th>
                                        <th>{{ trans('cruds.category') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->title_en ?? $product->title_ar ?? '-' }}</td>
                                        <td>{{ number_format($product->pivot->price ?? 0, 2) }}</td>
                                        <td>{{ $product->pivot->amount ?? 0 }}</td>
                                        <td>
                                            {{ number_format(($product->pivot->price ?? 0) * ($product->pivot->amount ?? 0), 2) }}
                                            @if(($product->pivot->packaging ?? 0) == 1)
                                                <span class="badge bg-success ml-2">{{ trans('cruds.packaging') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $product->subCategory->category->id ?? '' }} - {{ $product->subCategory->category->time_limit ?? '' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-end text-right">{{ trans('cruds.total') }} {{ trans('cruds.price') }}:</th>
                                        <th colspan="2">{{ number_format($order->price ?? 0, 2) }} Ø¬.Ù…</th>
                                    </tr>

                                    @if(($order->discount_amount ?? 0) > 0 || !empty($order->coupon_id))
                                    <tr class="text-danger">
                                        <th colspan="4" class="text-end text-right">Ø§Ù„Ø®ØµÙ… / Ø§Ù„ÙƒÙˆØ¨ÙˆÙ†:</th>
                                        <th colspan="2">
                                            -{{ number_format($order->discount_amount ?? 0, 2) }} Ø¬.Ù…
                                            @if(!empty($order->discount_percentage))
                                                ({{ $order->discount_percentage }}%)
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-end text-right">{{ trans('cruds.price_after_coupon') }}:</th>
                                        <th colspan="2">{{ number_format($order->price_after_offer ?? (($order->price ?? 0) - ($order->discount_amount ?? 0)), 2) }} Ø¬.Ù…</th>
                                    </tr>
                                    @endif

                                    <tr>
                                        <th colspan="4" class="text-end text-right">{{ trans('cruds.delivere') }}:</th>
                                        <th colspan="2">{{ number_format($order->delivery_price ?? 0, 2) }} Ø¬.Ù…</th>
                                    </tr>

                                    <tr class="bg-light text-primary" style="font-size: 16px;">
                                        <th colspan="4" class="text-end text-right"><strong>Ø§Ù„Ø¥Ø¬Ù…Ø§Ù„ÙŠ Ø§Ù„Ù†Ù‡Ø§Ø¦ÙŠ:</strong></th>
                                        <th colspan="2">
                                            <strong>
                                                {{ number_format($order->final_price ?? (($order->price_after_offer ?? $order->price) + ($order->delivery_price ?? 0)), 2) }} Ø¬.Ù…
                                            </strong>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
