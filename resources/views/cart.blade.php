



@extends('layout.mainindex')
@section('content')


        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>


                                @php
                                    $grandTotal = 0;
                                @endphp

                                @foreach($cart as $c)
                                    @php
                                        $images = json_decode($c['images'], true);
                                        $totalPrice = $c['price'] * $c['quantity'];
                                        $grandTotal += $totalPrice;
                                    @endphp
                                    <tr>
                                        <td>
                                            @if(!empty($images) && isset($images[0]))
                                                <img src="{{ asset($images[0]) }}" width="80" alt="Product">
                                            @endif
                                        </td>
                                        <td>{{ $c['name'] }}</td>
                                        <td class="unit-price" data-price="{{ $c['price'] }}">${{ $c['price'] }}</td>
                                        <td>
                                            <div class="quantity-btns">
                                                <button type="button" class="form-control decrement" data-id="{{ $c['id'] }}">-</button>
                                                <input type="text" class="form-control" value="{{ $c['quantity'] }}" readonly id="qty-{{ $c['id'] }}">
                                                <button type="button" class=" form-control increment" data-id="{{ $c['id'] }}">+</button>
                                            </div>
                                        </td>
                                        <td class="total-price" id="total-{{ $c['id'] }}">${{ $totalPrice }}</td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">

                                <h5>Cart Total</h5>
                                <ul class="summary-table">
                                    <li><span>subtotal:</span> <span id="grand-total">${{ $grandTotal }}</span></li>
                                    <li><span>delivery:</span> <span>Free</span></li>
                                    <li><span>total:</span> <span id="grand-total-total">${{ $grandTotal  }}</span></li>
                                </ul>
                                <div class="cart-btn mt-100">
                                    <a href="{{ route('checkout') }}" class="btn amado-btn w-100">Checkout</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                function updateTotals(id, qty) {
                    let row = document.getElementById('qty-' + id).closest('tr');
                    let unitPrice = parseFloat(row.querySelector('.unit-price').dataset.price);
                    let totalPriceElem = row.querySelector('.total-price');

                    // Update total for this product
                    let totalPrice = unitPrice * qty;
                    totalPriceElem.innerText = '$' + totalPrice.toFixed(2);

                    // Update grand total
                    let grandTotal = 0;
                    document.querySelectorAll('.total-price').forEach(function(el) {
                        grandTotal += parseFloat(el.innerText.replace('$',''));
                    });

                    document.getElementById('grand-total').innerText = '$' + grandTotal.toFixed(2);
                    document.getElementById('grand-total-total').innerText = '$' + grandTotal.toFixed(2);
                }

                function updateSession(id, qty) {
                    $.ajax({
                        url: "{{ route('cart.update') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            productId: id,
                            quantity: qty
                        },
                        success: function(response) {
                            console.log('Cart updated:', response.cart);
                        }
                    });
                }

                document.querySelectorAll('.increment').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        let id = this.dataset.id;
                        let qtyInput = document.getElementById('qty-' + id);
                        let qty = parseInt(qtyInput.value) + 1;
                        qtyInput.value = qty;
                        updateTotals(id, qty);
                        updateSession(id, qty);
                    });
                });

                document.querySelectorAll('.decrement').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        let id = this.dataset.id;
                        let qtyInput = document.getElementById('qty-' + id);
                        if(parseInt(qtyInput.value) > 1){
                            let qty = parseInt(qtyInput.value) - 1;
                            qtyInput.value = qty;
                            updateTotals(id, qty);
                            updateSession(id, qty);
                        }
                    });
                });

            });
        </script>




@endsection
