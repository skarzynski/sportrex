
@extends('layouts.layout')
@section('title')
    Choose delivery way
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

                        <h5 class="mb-4"> Products: </h5>

                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100"
                                         src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>Blue denim shirt</h5>
                                            <p class="mb-3 text-muted text-uppercase small">Shirt - blue</p>
                                            <p class="mb-2 text-muted text-uppercase small">Color: blue</p>
                                            <p class="mb-3 text-muted text-uppercase small">Size: M</p>
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0"><span><strong>$17.99</strong></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100"
                                         src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                                    <a href="#!">
                                        <div class="mask waves-effect waves-light">
                                            <img class="img-fluid w-100"
                                                 src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg">
                                            <div class="mask rgba-black-slight waves-effect waves-light"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>Red hoodie</h5>
                                            <p class="mb-3 text-muted text-uppercase small">Shirt - red</p>
                                            <p class="mb-2 text-muted text-uppercase small">Color: red</p>
                                            <p class="mb-3 text-muted text-uppercase small">Size: M</p>
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                        class="minus"></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                        class="plus"></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                    class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                                                    class="fas fa-heart mr-1"></i> Move to wish list </a>
                                        </div>
                                        <p class="mb-0"><span><strong>$35.99</strong></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">Order Details</h5>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total price: </strong>
                                </div>
                                <span><strong>$53.98</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Order Date: </strong>
                                </div>
                                <span><strong>23.10.2002</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Order Status: </strong>
                                </div>
                                <span><strong>Zakończone</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Delivery Date: </strong>
                                </div>
                                <span><strong>23.10.2002</strong></span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Block Content-->


@endsection
