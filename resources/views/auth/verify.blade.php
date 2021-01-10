@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zweryfikuj adres email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link do weryfikacji został wysłany na twój adres email') }}
                        </div>
                    @endif

                    {{ __('Zanim przejdziesz dalej, sprawdź swojego maila') }}
                    {{ __('Jeśli nie otrzymałeś maila z linkiem aktywacyjnym') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kliknij tutaj aby poprosić o następny') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
