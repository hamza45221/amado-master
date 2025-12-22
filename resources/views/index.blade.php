
@extends('layout.mainindex')
@section('content')



 <div class="content"></div>

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                @foreach($products as $product)
                    @php
                        $images = json_decode($product->images, true);
                        $firstImage = $images[0] ?? '';
                    @endphp

                    <div class="single-products-catagory clearfix">
                        <a href="#">
                            <img src="{{ asset($firstImage) }}" alt="">
                            <div class="hover-content">
                                <div class="line"></div>
                                <p>From {{ $product->price }}</p>
                                <h4>{{ $product->name }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach



                <!-- Single Catagory -->
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/2.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $180</p>--}}
{{--                            <h4>Minimalistic Plant Pot</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}


            </div>
        </div>
        <!-- Product Catagories Area End -->
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
