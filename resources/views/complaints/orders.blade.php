
@extends('layouts.layout')
@section('title')
    Zamówienia
@endsection
@section('content')
    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        @foreach($orders as $order)
            <div class="row">
                <!-- Card -->
                <div class="card mb-3" style="width:100%" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <p><strong>Numer zamówienia: </strong></p>
                                <p>{{$order->id}}</p>

                            </div>

                            <div class="col-md-3">
                                <p><strong>Cena: </strong></p>
                                <p class="mb-0"><span><strong>{{$order->price}} zł</strong></span></p>
                            </div>

                            <div class="col-md-3 ">
                                <p>
                                    <a href="{{ url('/orderDetails/'.$order->id ) }}" type="button" class="btn btn-primary btn-block waves-effect waves-light">Pokaż Szczegóły</a>
                                </p>
                                <p>
                                    <a href="{{ url('/order/'.$order->id.'/complaint' ) }}" type="button" class="btn btn-warning btn-block waves-effect waves-light">Złóż reklamację</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </section>
    <!--Section: Block Content-->
@endsection
