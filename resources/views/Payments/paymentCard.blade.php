
@extends('layouts.layout')
@section('title')
    Formularz karta
@endsection
@section('content')
    <!--Section: Block Content-->
    <section>
        <form method="POST">
        @csrf
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-8 mb-4">
                    -->

                    <div class="card wish-list pb-1">

                        <div class="card-body">

                            <h5 class="mb-2">Szczegóły płatności Kartą</h5>

                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form role="form">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                                    <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Potwierdź płatność </button>
                                    </form>
                                </div>
                            </div> <!-- End -->


                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </form>
    </section>
    <!--Section: Block Content-->
@endsection
