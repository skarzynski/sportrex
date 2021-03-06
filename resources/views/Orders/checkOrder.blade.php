
@extends('layouts.layout')
@section('title')
    Cart
@endsection
@section('content')
    <main>
        <div class="container">
            <div class=" mt-70">
                <div class="d-flex align-items-center h-100">
                    <div class="container text-center py-5">
                        <h3 class="mb-0">Sprawdź status zamówienia</h3>
                    </div>
                </div>
            </div>

            <!-- Grid row -->
            <div class="row d-flex justify-content-center">

                <!-- Grid column -->
                <div class="col-md-6">
                    <form method="POST">
                    @csrf
                    <!--Section: Block Content-->
                    <section class="my-4">



                            <div class="md-form md-outline">
                                <input type="text" id="orderID" name="id" class="form-control">
                                <label for="orderID">Wpisz numer zamówienia</label>
                            </div>

                            <div class="md-form md-outline">
                                <input type="email" id="billingEmail" name = 'email' class="form-control">
                                <label for="billingEmail">podaj swój email</label>
                            </div>


                        <div class="text-center pt-2 mb-4">

                            <button type="submit" class="btn btn-primary mb-4 waves-effect waves-light">Pokaż zamówienie</button>

                        </div>

                    </section>
                    </form>

                    <!--Section: Block Content-->

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
    </main>
@endsection
