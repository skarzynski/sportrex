
@extends('layouts.layout')
@section('title')
    Cart
@endsection
@section('content')
    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-8">


                <!-- Card -->
                <div class="card wish-list mb-3">
                    <div class="card-body">

                        <h5 class="mb-4">Cart (<span>2</span> items)</h5>
                        @foreach($products as $product)
                            {{ $product }}
{{--                        <div class="row mb-4">--}}
{{--                            <div class="col-md-5 col-lg-3 col-xl-3">--}}
{{--                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">--}}
{{--                                    <img class="img-fluid w-100"--}}
{{--                                         src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-7 col-lg-9 col-xl-9">--}}
{{--                                <div>--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <div>--}}
{{--                                            <h5>Blue denim shirt</h5>--}}
{{--                                            <p class="mb-3 text-muted text-uppercase small">Shirt - blue</p>--}}
{{--                                            <p class="mb-2 text-muted text-uppercase small">Color: blue</p>--}}
{{--                                            <p class="mb-3 text-muted text-uppercase small">Size: M</p>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <div class="def-number-input number-input safari_only mb-0 w-100">--}}
{{--                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"--}}
{{--                                                        class="minus"></button>--}}
{{--                                                <input class="quantity" min="0" name="quantity" value="1" type="number">--}}
{{--                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"--}}
{{--                                                        class="plus"></button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                        <div>--}}
{{--                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i--}}
{{--                                                    class="fas fa-trash-alt mr-1"></i> Remove item </a>--}}
{{--                                        </div>--}}
{{--                                        <p class="mb-0"><span><strong>$17.99</strong></span></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                            <hr class="mb-4">--}}
                        @endforeach

                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->
{{--                <div class="card mb-3">--}}
{{--                    <div class="card-body">--}}

{{--                        <h5 class="mb-4">Expected shipping delivery</h5>--}}

{{--                        <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Card -->

                <!-- Card -->
{{--                <div class="card mb-3">--}}
{{--                    <div class="card-body">--}}

{{--                        <h5 class="mb-4">We accept</h5>--}}

{{--                        <img class="mr-2" width="45px"--}}
{{--                             src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"--}}
{{--                             alt="Visa">--}}
{{--                        <img class="mr-2" width="45px"--}}
{{--                             src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"--}}
{{--                             alt="American Express">--}}
{{--                        <img class="mr-2" width="45px"--}}
{{--                             src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"--}}
{{--                             alt="Mastercard">--}}
{{--                        <img class="mr-2" width="45px"--}}
{{--                             src="https://z9t4u9f6.stackpathcdn.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"--}}
{{--                             alt="PayPal acceptance mark">--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">The total amount of</h5>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                all products
                                <span>$53.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>The total amount of</strong>
                                </div>
                                <span><strong>$53.98</strong></span>
                            </li>
                        </ul>
                        <a href="{{ url('/delivery/1' ) }}" class="btn btn-primary btn-block waves-effect waves-light">go to checkout</a>
                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">
                        <a href="{{ url('/' ) }}" class="btn btn-primary btn-block waves-effect waves-light">continue shoping</a>
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Block Content-->
@endsection
