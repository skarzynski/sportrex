
@extends('layouts.layout')
@section('title')
    Formularz Przelew
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

                    <div class="card wish-list pb-1">

                        <div class="card-body">

                            <h5 class="mb-2">Szczegóły płatności przelewem</h5>

                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="net-banking" class="tab-pane fade pt-3">
                                    <div class="form-group "> <label for="Select Your Bank">
                                            <h6>Select your Bank</h6>
                                        </label> <select class="form-control" id="ccmonth">
                                            <option value="" selected disabled>--Wybierz swój bank--</option>
                                            <option>Bank 1</option>
                                            @foreach($banks as $bank)
                                                <option>{{$bank->name}}</option>
                                            @endforeach
                                        </select> </div>
                                    <div class="form-group">
                                        <p> <button type="submit" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Wybierz bank</button> </p>
                                    </div>
                                    <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                </div> <!-- End -->
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
