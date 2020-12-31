
@extends('layouts.layout')
@section('title')
    Koszyk
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script >
        $(document).ready(function(){
            $("form input").change(function() {
                $(this).closest('form').submit();
            });});</script>

    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-8">

                <form method="POST">
                @csrf

                <!-- Card -->

                <div class="card wish-list mb-3">
                    <div class="card-body">

                        <h5 class="mb-4">Koszyk (<span>{{$amount}}</span> przedmioty)</h5>
                        @foreach($products as $product)
                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100"
                                         src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
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
                                                <input class="quantity w-50" min="0" name="quantity{{$product->id}}" value="{{$product->amount_in_order}}" type="number">
                                            </div>

                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
{{--                                        <div>--}}
{{--                                            <a href="" type="button" class="card-link-secondary small text-uppercase mr-3"><i--}}
{{--                                                    class="fas fa-trash-alt mr-1"></i> Remove item </a>--}}
{{--                                        </div>--}}
                                        <p class="mb-0"><span><strong>{{$product->bruttoPriceWithDiscount()}} zł</strong></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <hr class="mb-4">
                        @endforeach

                    </div>
                </div>
                </form>

                <!-- Card -->

            </div>
            <!--Grid column-->

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
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Całkowita cena</strong>
                                </div>
                                <span><strong>{{$order->price}} zł</strong></span>
                            </li>
                        </ul>
                        <a href="{{ url('/delivery/'.$order->id ) }}" class="btn btn-primary btn-block waves-effect waves-light">Przejdź dalej</a>
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

    </section>
    <!--Section: Block Content-->
@endsection
