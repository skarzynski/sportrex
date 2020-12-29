
@extends('layouts.layout')
@section('title')
    Choose delivery way
@endsection
@section('content')
    <!--Section: Modal-->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="mb-2"> Najpierw wybierz sposób dostawy </h5>
            </div>
        </div>
    </div>
</div>


    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-8 mb-4">

                <div class="card wish-list pb-1">
                    <div class="card-body">

                        <h5 class="mb-2"> Choose delivery way </h5>

                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-sm">
                            <div class="md-form md-outline mb-0 mb-lg-4">
                                <a href="{{ url('/deliveryCourier/1' ) }}" type="button" class="btn btn-primary btn-lg waves-effect waves-light">Courier</a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="md-form md-outline mb-0 mb-lg-4">
                                <a href="{{ url('/deliveryPost/1' ) }}" type="button" class="btn btn-primary btn-lg waves-effect waves-light">Post office</a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="md-form md-outline mb-0 mb-lg-4">
                                <a href="{{ url('/deliveryBox/1' ) }}" type="button" class="btn btn-primary btn-lg waves-effect waves-light">Paczkomat</a>
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
                <div class="card mb-4">
                    <div class="card-body">

                        <h5 class="mb-3">The total amount of</h5>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Temporary amount
                                <span>$53.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Gratis</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>The total amount of</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong>$53.98</strong></span>
                            </li>
                        </ul>

                        <button type="button" class="btn btn-primary btn-block waves-effect waves-light" data-toggle="modal" data-target="#paymentModal">Choose Payment</button>
                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Block Content-->
@endsection
