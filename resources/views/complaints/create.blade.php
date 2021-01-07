
@extends('layouts.layout')
@section('title')
    Complaint
@endsection
@section('content')
    <main>
        <div class="container">
            <div class=" mt-70">
                <div class="d-flex align-items-center h-100">
                    <div class="container text-center py-5">
                        <h3 class="mb-0">Make a complaint</h3>
                    </div>
                </div>
            </div>

            <!-- Grid row -->
            <div class="row d-flex justify-content-center">

                <!-- Grid column -->
                <div class="col-md-6">
                    <form method="POST" action="{{ route('complaint.store') }}">
                    @csrf
                    <!--Section: Block Content-->
                        <section class="my-4">



                            <div class="md-form md-outline">
                                <input type="text" id="order_id" name="order_id" class="form-control" value="{{ old('order_id') }}">
                                <label for="order_id">Enter order number</label>
                            </div>
                            @error('order_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="md-form md-outline">
                                <input type="text" id="delivery_address" name="delivery_address" class="form-control" value="{{ old('delivery_address') }}">
                                <label for="delivery_address">Enter delivery address</label>
                            </div>
                            @error('delivery_address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="md-form md-outline">
                                <input type="email" id="email_address" name="email_address" class="form-control" value="{{ old('email_address') }}">
                                <label for="email_address">Enter email address</label>
                            </div>
                            @error('email_address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="md-form md-outline">
                                <textarea name="complaint_details" id="complaint_details" cols="63" rows="10">
                                    {{ old('complaint_details') }}
                                </textarea>
                                <label for="complaint_details">Enter complaint details</label>
                            </div>
                            @error('complaint_details')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                            <div class="text-center pt-2 mb-4">

                                <button type="submit" class="btn btn-primary mb-4 waves-effect waves-light">Make a complaint</button>

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
