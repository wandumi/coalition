@extends('layouts.app')

@section('content')
    <div class="col-xl-10 col-lg-10 col-md-6 mx-auto ">
        <div class="card m-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create</h6>
                <a class="m-0 float-right btn btn-primary btn-sm" href="{{ url('/') }}">Back <i
                        class="fas fa-chevron-right"></i></a>
            </div>
            <div class="col-md-6 offset-lg-3 px-3 py-5 md:m-5">
                @if ($message = session('message'))
                    <div class="alert alert-success" id="message">{{ $message }}</div>
                @endif
                <form id="json_form" action="{{ url('json_form') }}" method="post">
                    @csrf

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="product_name">Product name</label>
                            <input name="product_name" type="text"
                                class="form-control @error('product_name') is-invalid @enderror" id="product_name"
                                placeholder="Product name*" value="">
                            @error('product_name')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="quantity_stock">Quantity in stock</label>
                            <input name="quantity_stock" type="number"
                                class="form-control @error('quantity_stock') is-invalid @enderror" id="quantity_stock"
                                placeholder="Quantity price*" value="">
                            @error('quantity_stock')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="item_price">Price per item</label>
                            <input name="item_price" type="text"
                                class="form-control @error('item_price') is-invalid @enderror" id="item_price"
                                placeholder="Price per item*" value="">
                            @error('item_price')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <button type="submit" id="form-submit" class="btn btn-primary w-100">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <div class="col-xl-10 col-lg-10 mx-auto">
        <div class="card">

            <div class="table-responsive p-3">

                <table class="table align-items-center table-flush" id="announcementTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Product Name</th>
                            <th>Quntity in stock</th>
                            <th>Price per item </th>
                            <th>Datetime</th>
                            <th>Total Value</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($jsonData != null)
                            @foreach ($jsonData as $json)
                                <tr>
                                    <td>
                                        {{ $json['product_name'] }}
                                    </td>

                                    <td>
                                        {{ $json['quantity_stock'] }}
                                    </td>

                                    <td>
                                        {{ $json['item_price'] }}
                                    </td>
                                    <td>
                                        {{ $json['current_date'] }}
                                    </td>
                                    <td>
                                        {{ '$ ' . number_format($json['total_value'], 2) }}
                                    </td>
                                    <td>

                                        <a class="btn btn-sm btn-info" id="showEdit" href=""
                                            data-announcementEdit="">Edit</a>

                                    </td>
                                </tr>
                            @endforeach
                        @endif


                    </tbody>
                    <tfoot class="thead-light">

                    </tfoot>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const success = document.getElementById('message');
            if (success) {
                setTimeout(() => {
                    success.style.display = 'none';
                }, 1000);
            }
        });
    </script>
@endsection
