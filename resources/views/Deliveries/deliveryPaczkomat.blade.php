
@extends('layouts.layout')
@section('title')
    Choose delivery way
@endsection
@section('content')



    <!--Section: Block Content-->
    <section>
<form method="POST">
@csrf
    <!--Section: Modal-->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Wybierz sposób płatności</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($payments as $payment)
                        <div class="row">
                            <div class="md-form md-outline mb-0 mb-lg-4" style="margin: 0 auto">
                                <button name={{$payment->name}}  type="submit" class="btn btn-primary btn-lg waves-effect waves-light">{{$payment->name}}</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-8 mb-4">

                <div class="card wish-list pb-1">
                    <div class="card-body">

                        <h5 class="mb-2"> Wybierz sposób dostawy </h5>

                    <div class="row">
                        <!-- Grid column -->
                        @foreach($deliveries as $delivery)
                            <div class="col-sm">
                                <div class="md-form md-outline mb-0 mb-lg-4">
                                    <a href="{{ url('/delivery'.$delivery->name.'/'.$order->id ) }}" type="button" class="btn btn-primary btn-lg waves-effect waves-light">{{$delivery->name}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>


            </div>

            <div class="card wish-list pb-1">

                <div class="card-body">

                    <h5 class="mb-2">Szczegóły dostawy</h5>

                    <!-- Grid row -->
                    <div class="row">
                        Error432: Inpost Api not responding

                    </div>
                    <!-- Grid row -->


                </div>
            </div>


            <!--Grid column-->

            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">Suma przedmiotów</h5>

                        <ul class="list-group list-group-flush">
                            @foreach($products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    {{$product->name." X ".$product->amount_in_order}}
                                    <span>{{$product->bruttoPriceWithDiscount() * $product->amount_in_order}} zł</span>
                                </li>
                            @endforeach
                                @foreach($deliveries as $delivery)
                                    @if ($delivery->name == 'Paczkomat')
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            {{$delivery->name}}<span>{{$delivery->price}}zł</span></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                            <div>
                                                <strong>Całkowita cena</strong>
                                            </div>
                                            <span><strong>{{$order->price + $delivery->price}} zł</strong></span>
                                        </li>
                                    @endif
                                @endforeach

                        </ul>
                        <button type="button" class="btn btn-primary btn-block waves-effect waves-light" data-toggle="modal" data-target="#paymentModal">Wybierz płatność</button>
                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">
                        <a href="{{ url('/' ) }}" class="btn btn-primary btn-block waves-effect waves-light">Kontynuuj zakupy</a>
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->
        </form>
    </section>
    <!--Section: Block Content-->
@endsection
