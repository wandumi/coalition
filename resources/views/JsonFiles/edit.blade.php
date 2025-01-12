@extends('layouts.app')

@section('content')
    <div class="col-xl-10 col-lg-10 mx-auto">
        <div class="card">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
                <a class="m-0 float-right btn btn-primary btn-sm" href="{{ url('/json_form') }}">Back <i
                        class="fas fa-chevron-right"></i></a>
            </div>

            <div class="table-responsive p-3">

                <ul class="list-group">
                    <li class="list-group-item"><strong>ID: </strong> {{ $json['unique_id'] }}</li>
                    <li class="list-group-item"><strong>Product Name:</strong> {{ $json['product_name'] }}</li>
                    <li class="list-group-item"><strong>Quntity in stock:</strong> {{ $json['quantity_stock'] }}</li>
                    <li class="list-group-item"><strong>Price per item:</strong> {{ $json['item_price'] }}</li>
                    <li class="list-group-item"><strong>Datetime:</strong> {{ $json['current_date'] }}</li>
                    <li class="list-group-item"><strong>Total Value:</strong> {{ $json['total_value'] }}</li>
                </ul>


            </div>

        </div>
    </div>
@endsection
