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



                {{-- جدول المنتجات والحسابات التفصيلية --}}

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

                                        <th colspan="2">{{ number_format($order->price ?? 0, 2) }} ج.م</th>

                                    </tr>



                                    @if(($order->discount_amount ?? 0) > 0 || !empty($order->coupon_id))

                                    <tr class="text-danger">

                                        <th colspan="4" class="text-end text-right">الخصم / الكوبون:</th>

                                        <th colspan="2">

                                            -{{ number_format($order->discount_amount ?? 0, 2) }} ج.م

                                            @if(!empty($order->discount_percentage))

                                                ({{ $order->discount_percentage }}%)

                                            @endif

                                        </th>

                                    </tr>

                                    <tr>

                                        <th colspan="4" class="text-end text-right">{{ trans('cruds.price_after_coupon') }}:</th>

                                        <th colspan="2">{{ number_format($order->price_after_offer ?? (($order->price ?? 0) - ($order->discount_amount ?? 0)), 2) }} ج.م</th>
