@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px;">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>All order item</h1>
<br>
</div>





<div class="row" style="margin-bottom: 200px">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">


                @if (session('message'))
                <h2 class="text-center text-success my-3">{{session('message')}}</h2>
                @endif


                <!-- Table with stripped rows -->
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">order_id</th>
                            <th scope="col">product_id</th>
                            <th scope="col">product_name</th>
                            <th scope="col">product_image</th>
                            <th scope="col">product_price</th>
                            <th scope="col">product_quantity</th>
                            <th scope="col">order_date</th>
                            <th scope="col">deleted</th>
                        </tr>
                    </thead>

                    <tbody>


                        @php
                            $i = 1;
                        @endphp

                        @foreach ($all_orders_items as $order)

                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td><img src="{{ asset('frontend/images/'.$order->product_image) }}" width="50" alt="" srcset=""></td>
                                <td>{{ $order->product_price }}</td>
                                <td>{{ $order->product_quantity }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td><a href="{{ route('dashboard.orders_items.destroy', ['id'=>$order->id]) }}" class="btn btn-danger rounded-pill">delete</a></td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

    </div>
</div>

@endsection