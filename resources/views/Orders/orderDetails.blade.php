
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

                        <h5 class="mb-4"> Produkty: </h5>

                        @foreach($products as $product)
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100"
                                             src="{{asset('img/'.$product->picture)}}" alt="Sample">
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5>{{ $product->name }}</h5>
                                                <p class="mb-3 text-muted text-uppercase small">
                                                    {{ $product->description }}
                                                </p>
                                            </div>

                                            <div class="def-number-input number-input mb-0 w-50">
                                                <span>ilość: </span>
                                                <input disabled class="quantity w-50" min="0" name="quantity{{$product->id}}" value="{{$product->amount_in_order}}" type="number">
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0"><span><strong>{{$product->bruttoPriceWithDiscount()}} zł</strong></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                        @endforeach

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
                                    <strong>Cena zamówienia: </strong>
                                </div>
                                <span><strong>{{$order->price}} zł</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Data zamówienia: </strong>
                                </div>
                                <span><strong>{{$order->order_date}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Status zamówienia: </strong>
                                </div>
                                <span><strong>{{$orderStatus}}</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Data dostarczenia: </strong>
                                </div>
                                <span><strong>-------</strong></span>
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
