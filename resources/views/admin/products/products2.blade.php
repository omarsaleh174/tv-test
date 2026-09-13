@extends('layouts.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <style>
                            .category-card {
                                text-align: center;
                                padding: 20px;
                                border: 1px solid #e3e3e3;
                                border-radius: 10px;
                                transition: all 0.3s ease;
                                cursor: pointer;
                            }

                            .category-card:hover,
                            .category-card.active {
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                border-color: #007bff;
                            }

                            .category-icon {
                                font-size: 2rem;
                                margin-bottom: 10px;
                            }

                            .menu-item {
                                text-align: center;
                                padding: 20px;
                                border: 1px solid #e3e3e3;
                                border-radius: 10px;
                                transition: all 0.3s ease;
                            }

                            .menu-item:hover {
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            }

                            .price {
                                color: green;
                                font-weight: bold;
                            }
                        </style>
                        <div class="container my-5">
                            <div id="categoryCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($categories->chunk(6) as $chunk)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <div class="row mb-4">
                                                @foreach ($chunk as $category)
                                                    <div class="col-md-2">
                                                        <div class="category-card collapsed" data-toggle="collapse"
                                                            data-target="#{{ $category->id }}" aria-expanded="false">
                                                            <div class="category-icon">
                                                                <img src="{{ $category->photo }}" width="100"
                                                                    height="100">
                                                            </div>
                                                            <h5>{{ $category->title_en }}</h5>
                                                            <p>{{ $category->products_count }} {{ trans('cruds.product') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev custom-control-prev" href="#categoryCarousel" role="button"
                                    data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span> </a>
                                <a class="carousel-control-next custom-control-next" href="#categoryCarousel" role="button"
                                    data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span> </a>
                            </div>
                            <style>
                                .custom-control-prev,
                                .custom-control-next {
                                    top: 50%;
                                    transform: translateY(-50%);
                                    width: 5%;
                                }

                                .custom-control-prev {
                                    left: 0;
                                }

                                .custom-control-next {
                                    right: 0;
                                }

                                .carousel-control-prev-icon,
                                .carousel-control-next-icon {
                                    background-color: rgba(0, 0, 0, 0.5);
                                    border-radius: 50%;
                                }

                                .carousel-control-prev,
                                .carousel-control-next {
                                    z-index: 10;
                                    pointer-events: auto;
                                }

                                .category-card {
                                    position: relative;
                                    z-index: 1;
                                }
                            </style>
                            @foreach ($categories as $category)
                                <div class="collapse " id="{{ $category->id }}" style="">
                                    @foreach ($category->products->chunk(4) as $chunk)
                                        <div class="row">
                                            @foreach ($chunk as $product)
                                                <div class="col-md-3">
                                                    <div class="menu-item">
                                                        <img src="{{ $product->photo }}" alt="" width="130"
                                                            height="130" class="img-fluid mb-3">
                                                        <h5><a
                                                                href="{{ route('products.show', $product->id) }}">{{ $product->title_en }}</a>
                                                        </h5>
                                                        <p>{{ $product->amount }}</p>
                                                        <p class="price">$ {{ $product->real_price }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @section('js')
                        <script>
                            $(document).ready(function() {
                                $('.category-card').on('click', function() {
                                    $('.category-card').removeClass('active');
                                    $(this).addClass('active');

                                    const target = $(this).data('target');
                                    $('.collapse').collapse('hide');
                                    $(target).collapse('show');
                                });
                            });
                        </script>
                    @endsection
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

