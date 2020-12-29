
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
                <h5 class="modal-title" id="exampleModalLabel">Choose payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="md-form md-outline mb-0 mb-lg-4" style="margin: 0 auto">
                        <button type="button" class="btn btn-primary btn-lg waves-effect waves-light">Blik</button>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form md-outline mb-0 mb-lg-4" style="margin: 0 auto">
                        <button type="button" class="btn btn-primary btn-lg waves-effect waves-light">Transfer</button>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form md-outline mb-0 mb-lg-4" style="margin: 0 auto">
                        <button type="button" class="btn btn-primary btn-lg waves-effect waves-light">Card</button>
                    </div>
                </div>
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

                <div class="card wish-list pb-1">

                    <div class="card-body">

                        <h5 class="mb-2">Courier delivery details</h5>

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-lg-6">

                                <!-- First name -->
                                <div class="md-form md-outline mb-0 mb-lg-4">
                                    <input type="text" id="firstName" class="form-control mb-0 mb-lg-2">
                                    <label for="firstName">First name</label>
                                </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-6">

                                <!-- Last name -->
                                <div class="md-form md-outline">
                                    <input type="text" id="lastName" class="form-control">
                                    <label for="lastName">Last name</label>
                                </div>

                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                        <!-- Company name -->
                        <div class="md-form md-outline my-0">
                            <input type="text" id="companyName" class="form-control mb-0">
                            <label for="companyName">Company name (optional)</label>
                        </div>

                        <!-- Country -->
                        <div class="d-flex flex-wrap">
                            <div class="select-outline position-relative w-100">
                                <select class="mdb-select md-form md-outline">
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                                <label>Country</label>
                            </div>
                        </div>

                        <!-- Address Part 1 -->
                        <div class="md-form md-outline mt-0">
                            <input type="text" id="form14" placeholder="House number and street name" class="form-control">
                            <label for="form14">Address</label>
                        </div>

                        <!-- Address Part 2 -->
                        <div class="md-form md-outline">
                            <input type="text" id="form15" placeholder="Apartment, suite, unit etc. (optional)"
                                   class="form-control">
                            <label for="form15">Address</label>
                        </div>

                        <!-- Postcode / ZIP -->
                        <div class="md-form md-outline">
                            <input type="text" id="form16" class="form-control">
                            <label for="form16">Postcode / ZIP</label>
                        </div>

                        <!-- Town / City -->
                        <div class="md-form md-outline">
                            <input type="text" id="form17" class="form-control">
                            <label for="form17">Town / City</label>
                        </div>

                        <!-- Phone -->
                        <div class="md-form md-outline">
                            <input type="number" id="form18" class="form-control">
                            <label for="form18">Phone</label>
                        </div>

                        <!-- Email address -->
                        <div class="md-form md-outline">
                            <input type="email" id="form19" class="form-control">
                            <label for="form19">Email address</label>
                        </div>

                        <!-- Additional information -->
                        <div class="md-form md-outline">
                            <textarea id="form76" class="md-textarea form-control" rows="4"></textarea>
                            <label for="form76">Additional information</label>
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
