


@extends('layout.mainindex')
@section('content')






        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $products->category->name }}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $products->name }}</a></li>
{{--                                <li class="breadcrumb-item active" aria-current="page">white modern chair</li>--}}
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            @php
                                $images = json_decode($products->images, true);
                            @endphp

                            @if(!empty($images) && count($images) > 0)
                                <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @foreach($images as $index => $image)
                                            <li
                                                data-target="#product_details_slider"
                                                data-slide-to="{{ $index }}"
                                                class="{{ $index == 0 ? 'active' : '' }}"
                                                style="background-image: url('{{ asset($image) }}');">
                                            </li>
                                        @endforeach
                                    </ol>

                                    <!-- Slides -->
                                    <div class="carousel-inner" style="height: 500px">
                                        @foreach($images as $index => $image)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <a class="gallery_img" href="{{ asset($image) }}">
                                                    <img class="d-block w-100" src="{{ asset($image) }}" alt="Product Image {{ $index + 1 }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">${{ $products->price }}</p>
{{--                                <a href="product-details.html">--}}
                                    <h6>{{ $products->name }}</h6>
{{--                                </a>--}}
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> {{ $products->availibility }}</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>{!! $products->description !!}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->


    @endsection
