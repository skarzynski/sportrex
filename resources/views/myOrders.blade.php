
@extends('layouts.layout')
@section('title')
    Cart
@endsection
@section('content')
    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        <div class="row">
            <!-- Card -->
            <div class="card mb-3" style="width:100%" >
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-3">
                        <p><strong>Order id: </strong></p>
                        <p>#212523523</p>

                    </div>

                    <div class="col-md-3">
                        <p><strong>Cena: </strong></p>
                        <p class="mb-0"><span><strong>$17.99</strong></span></p>
                    </div>

                    <div class="col-md-3 ">
                        <p>
                            <a href="{{ url('/orderDetails/1' ) }}" type="button" class="btn btn-primary btn-block waves-effect waves-light">Pokaż Szczegóły</a>
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!--Section: Block Content-->
@endsection
