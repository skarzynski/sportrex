@extends('layouts.layout')
@section('title')
    Strona główna
@endsection
@section('content')
            <!-- Page Content -->
                    <div class="row">

                        <div class="col-lg-3">

                            <h1 class="my-4">Sportrex</h1>
                            <div class="list-group">
                                @forelse($categories as $category)
                                    <a href="{{ route('welcome', ['category' => $category->name]) }}" class="list-group-item">{{ $category->name }}</a>
                                @empty
                                    <p>Brak kategorii</p>
                                @endforelse
                            </div>

                        </div>
                        <!-- /.col-lg-3 -->

                        <div class="col-lg-9">

                            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="{{ asset('img/carousel1.jpg') }}" alt="First slide" width="800px" height="320px">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="{{ asset('img/carousel2.jpg') }}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="{{ asset('img/carousel3.jpg') }}" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <div class="row">

                                @forelse($products as $product)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card h-100">
                                                <a href="#"><img class="card-img-top" src="
                                                    @if($product->picture == null)
                                                        https://placehold.it/700x400
                                                    @else
                                                        {{ asset('img/'.$product->picture) }}
                                                    @endif
                                                " alt=""></a>
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <a href="#">{{ $product->name }}</a>
                                                </h4>
                                                <h5>{{ $product->bruttoPriceWithDiscount() }} zł</h5>
                                                <p class="card-text">{{ $product->description }}</p>
                                                <p class="card-text">Liczba dostępnych sztuk: {{ $product->amount }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <form method="POST" action="/product/{{ $product->id }}/addToCart">
                                                    @csrf

                                                    <button type="submit" class="btn btn-primary">
                                                        Dodaj do koszyka
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h1>Brak produktów</h1>
                                @endforelse

                            </div>
                            <!-- /.row -->
                            <div>{{ $products->render() }}</div>

                        </div>
                        <!-- /.col-lg-9 -->

                    </div>
                    <!-- /.row -->
@endsection

